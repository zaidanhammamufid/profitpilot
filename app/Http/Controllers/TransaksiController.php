<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    // MENAMPILKAN TRANSAKSI
    public function index()
    {
        $userId = Auth::id();

        $transaksi = Transaksi::where('user_id', $userId)
            ->with(['barang', 'detailTransaksis'])
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $barang = Barang::where('user_id', $userId)
            ->where('aktif', true)
            ->orderBy('nama_barang', 'asc')
            ->get();

        $transaksiAktif = $transaksi->where('status', 'aktif');

        $pemasukan = $transaksiAktif
            ->where('jenis', 'pemasukan')
            ->sum('jumlah');

        $pengeluaran = $transaksiAktif
            ->where('jenis', 'pengeluaran')
            ->sum('jumlah');

        $omzet = $pemasukan - $pengeluaran;

        return view('transaksi', compact(
            'transaksi',
            'barang',
            'pemasukan',
            'pengeluaran',
            'omzet'
        ));
    }

    // MENYIMPAN TRANSAKSI
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'mode_pemasukan' => 'nullable|in:barang,manual',

            'barang_id' => 'nullable|integer',
            'jumlah_barang' => 'nullable|integer|min:1',

            'items' => 'nullable|array|min:1',
            'items.*.barang_id' => 'required|integer',
            'items.*.jumlah_barang' => 'required|integer|min:1',

            'jumlah' => 'nullable|numeric|min:1',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $items = $data['items'] ?? [];
        $mode = $data['mode_pemasukan'] ?? null;

        // Mendukung form lama yang memakai satu barang.
        if (empty($items) && !empty($data['barang_id'])) {
            if (empty($data['jumlah_barang'])) {
                throw ValidationException::withMessages([
                    'jumlah_barang' => 'Jumlah barang wajib diisi.',
                ]);
            }

            $items[] = [
                'barang_id' => $data['barang_id'],
                'jumlah_barang' => $data['jumlah_barang'],
            ];
        }

        // Tentukan mode otomatis untuk form lama.
        if ($data['jenis'] === 'pemasukan' && $mode === null) {
            $mode = !empty($items) ? 'barang' : 'manual';
        }

        // Pemasukan manual tidak boleh mengurangi stok.
        if ($mode === 'manual' && !empty($items)) {
            throw ValidationException::withMessages([
                'items' => 'Pemasukan manual tidak boleh berisi barang.',
            ]);
        }

        // Pengeluaran tidak boleh memakai daftar barang penjualan.
        if ($data['jenis'] === 'pengeluaran' && !empty($items)) {
            throw ValidationException::withMessages([
                'items' => 'Pengeluaran tidak boleh memakai daftar barang penjualan.',
            ]);
        }

        // Mode penjualan wajib mempunyai barang.
        if (
            $data['jenis'] === 'pemasukan'
            && $mode === 'barang'
            && empty($items)
        ) {
            throw ValidationException::withMessages([
                'items' => 'Tambahkan minimal satu barang untuk penjualan.',
            ]);
        }

        // Transaksi manual wajib mempunyai nominal.
        if (empty($items) && empty($data['jumlah'])) {
            throw ValidationException::withMessages([
                'jumlah' => 'Nominal transaksi wajib diisi.',
            ]);
        }

        $userId = Auth::id();

        DB::transaction(function () use ($data, $items, $userId) {
            $total = 0;
            $detailBarang = [];
            $barangTerkunci = [];
            $totalPerBarang = [];

            // Jumlahkan kuantitas apabila barang yang sama
            // dipilih pada beberapa baris.
            foreach ($items as $item) {
                $barangId = (int) $item['barang_id'];
                $qty = (int) $item['jumlah_barang'];

                $totalPerBarang[$barangId] =
                    ($totalPerBarang[$barangId] ?? 0) + $qty;
            }

            // Kunci dan periksa setiap barang satu kali.
            foreach ($totalPerBarang as $barangId => $totalQty) {
                $barang = Barang::where('id', $barangId)
                    ->where('user_id', $userId)
                    ->where('aktif', true)
                    ->lockForUpdate()
                    ->first();

                if (!$barang) {
                    throw ValidationException::withMessages([
                        'items' => 'Barang tidak ditemukan atau sudah diarsipkan.',
                    ]);
                }

                if ($barang->stok < $totalQty) {
                    throw ValidationException::withMessages([
                        'items' =>
                            "Stok {$barang->nama_barang} tidak mencukupi. "
                            . "Stok tersedia: {$barang->stok}, "
                            . "jumlah yang diminta: {$totalQty}.",
                    ]);
                }

                $barangTerkunci[$barangId] = $barang;
            }

            // Hitung subtotal setiap baris berdasarkan harga barang.
            foreach ($items as $item) {
                $barangId = (int) $item['barang_id'];
                $qty = (int) $item['jumlah_barang'];
                $barang = $barangTerkunci[$barangId];

                $harga = (float) $barang->harga;
                $subtotal = $harga * $qty;

                $total += $subtotal;

                $detailBarang[] = [
                    'barang' => $barang,
                    'jumlah_barang' => $qty,
                    'harga_satuan' => $harga,
                    'subtotal' => $subtotal,
                ];
            }

            // Simpan transaksi utama.
            $transaksi = Transaksi::create([
                'user_id' => $userId,
                'barang_id' => $detailBarang[0]['barang']->id ?? null,
                'jumlah_barang' =>
                    $detailBarang[0]['jumlah_barang'] ?? null,
                'jenis' => $data['jenis'],
                'jumlah' => !empty($detailBarang)
                    ? $total
                    : $data['jumlah'],
                'keterangan' => $data['keterangan'],
                'tanggal' => $data['tanggal'],
                'status' => 'aktif',
            ]);

            // Simpan detail penjualan.
            foreach ($detailBarang as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $detail['barang']->id,
                    'nama_barang' => $detail['barang']->nama_barang,
                    'jumlah_barang' => $detail['jumlah_barang'],
                    'harga_satuan' => $detail['harga_satuan'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            // Kurangi stok berdasarkan total tiap barang
            // setelah seluruh validasi berhasil.
            foreach ($totalPerBarang as $barangId => $totalQty) {
                $barangTerkunci[$barangId]->decrement('stok', $totalQty);
            }
        });

        return redirect('/transaksi')
            ->with('success', 'Transaksi berhasil disimpan.');
    }

    // MENAMPILKAN RINGKASAN OMZET
    public function omzet()
    {
        $transaksi = Transaksi::where('user_id', Auth::id())
            ->where('status', 'aktif')
            ->orderBy('tanggal', 'asc')
            ->get();

        $pemasukan = $transaksi
            ->where('jenis', 'pemasukan')
            ->sum('jumlah');

        $pengeluaran = $transaksi
            ->where('jenis', 'pengeluaran')
            ->sum('jumlah');

        $omzet = $pemasukan - $pengeluaran;

        $mingguan = $transaksi
            ->groupBy(function ($data) {
                return $data->tanggal->format('Y-W');
            })
            ->map(function ($data) {
                $pemasukanMinggu = $data
                    ->where('jenis', 'pemasukan')
                    ->sum('jumlah');

                $pengeluaranMinggu = $data
                    ->where('jenis', 'pengeluaran')
                    ->sum('jumlah');

                return [
                    'pemasukan' => $pemasukanMinggu,
                    'pengeluaran' => $pengeluaranMinggu,
                    'omzet' => $pemasukanMinggu - $pengeluaranMinggu,
                ];
            })
            ->values()
            ->map(function ($data, $index) {
                $data['minggu'] = 'Minggu ' . ($index + 1);

                return $data;
            });

        return view('omzet', compact(
            'transaksi',
            'pemasukan',
            'pengeluaran',
            'omzet',
            'mingguan'
        ));
    }

    // MEMBATALKAN TRANSAKSI DAN MENGEMBALIKAN STOK
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $transaksi = Transaksi::where('id', $id)
                ->where('user_id', Auth::id())
                ->lockForUpdate()
                ->firstOrFail();

            if ($transaksi->status === 'batal') {
                throw ValidationException::withMessages([
                    'transaksi' => 'Transaksi ini sudah dibatalkan.',
                ]);
            }

            $detailTransaksi = DetailTransaksi::where(
                'transaksi_id',
                $transaksi->id
            )->get();

            foreach ($detailTransaksi as $detail) {
                if (!$detail->barang_id) {
                    continue;
                }

                $barang = Barang::where('id', $detail->barang_id)
                    ->where('user_id', Auth::id())
                    ->lockForUpdate()
                    ->first();

                if (!$barang) {
                    continue;
                }

                $barang->increment('stok', $detail->jumlah_barang);

                // Barang yang diarsipkan diaktifkan kembali
                // jika stok dikembalikan melalui pembatalan.
                if (!$barang->aktif) {
                    $barang->aktif = true;
                    $barang->save();
                }
            }

            $transaksi->status = 'batal';
            $transaksi->save();
        });

        return redirect('/transaksi')
            ->with('success', 'Transaksi berhasil dibatalkan.');
    }
}
