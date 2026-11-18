<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    private const NAMA_BULAN = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    private const NAMA_BULAN_SINGKAT = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'Mei',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agu',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nov',
        12 => 'Des',
    ];

    public function index(Request $request)
    {
        $userId = Auth::id();

        $pemasukan = Transaksi::where('user_id', $userId)
            ->where('status', 'aktif')
            ->where('jenis', 'pemasukan')
            ->sum('jumlah');

        $pengeluaran = Transaksi::where('user_id', $userId)
            ->where('status', 'aktif')
            ->where('jenis', 'pengeluaran')
            ->sum('jumlah');

        $omzet = $pemasukan - $pengeluaran;

        $barang = Barang::where('user_id', $userId)
            ->where('aktif', true)
            ->orderBy('nama_barang', 'asc')
            ->get();

        $periode = $request->query('periode', 'semua');

        if (! in_array($periode, ['semua', 'mingguan', 'bulanan'], true)) {
            $periode = 'semua';
        }

        $mingguParam = $request->query('minggu');
        $minggu = is_string($mingguParam) && $this->weekStart($mingguParam)
            ? $mingguParam
            : $this->weekKey(now());

        $bulanParam = $request->query('bulan');
        $bulan = is_string($bulanParam) && $this->monthStart($bulanParam)
            ? $bulanParam
            : now()->format('Y-m');

        $mingguOptions = $this->weekOptions($userId);

        if (! $mingguOptions->contains(fn ($option) => $option['value'] === $minggu)) {
            $mingguOptions->push($this->weekOption($minggu));
        }

        $mingguOptions = $mingguOptions->sortByDesc('value')->values();

        $bulanOptions = $this->monthOptions($userId);

        if (! $bulanOptions->contains(fn ($option) => $option['value'] === $bulan)) {
            $bulanOptions->push($this->monthOption($bulan));
        }

        $bulanOptions = $bulanOptions->sortByDesc('value')->values();

        $riwayatQuery = Transaksi::where('user_id', $userId)
            ->with(['barang', 'detailTransaksis']);

        $labelPeriode = null;

        if ($periode === 'mingguan') {
            $start = $this->weekStart($minggu);
            $end = $start->copy()->endOfWeek(Carbon::SUNDAY);

            $riwayatQuery->whereBetween('tanggal', [
                $start->toDateString(),
                $end->toDateString(),
            ]);

            $labelPeriode = 'Minggu, '.$this->formatWeekRange($start, $end);
        } elseif ($periode === 'bulanan') {
            $start = $this->monthStart($bulan);
            $end = $start->copy()->endOfMonth();

            $riwayatQuery->whereBetween('tanggal', [
                $start->toDateString(),
                $end->toDateString(),
            ]);

            $labelPeriode = $this->monthLabel($bulan);
        }

        $transaksi = $riwayatQuery
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $transaksiAktifPeriode = $transaksi->where('status', 'aktif');

        $pemasukanPeriode = $transaksiAktifPeriode
            ->where('jenis', 'pemasukan')
            ->sum('jumlah');

        $pengeluaranPeriode = $transaksiAktifPeriode
            ->where('jenis', 'pengeluaran')
            ->sum('jumlah');

        $omzetPeriode = $pemasukanPeriode - $pengeluaranPeriode;

        return view('transaksi', compact(
            'transaksi',
            'barang',
            'pemasukan',
            'pengeluaran',
            'omzet',
            'periode',
            'minggu',
            'bulan',
            'mingguOptions',
            'bulanOptions',
            'labelPeriode',
            'pemasukanPeriode',
            'pengeluaranPeriode',
            'omzetPeriode'
        ));
    }

    private function weekOptions(int $userId): Collection
    {
        $keys = Transaksi::where('user_id', $userId)
            ->select('tanggal')
            ->distinct()
            ->orderBy('tanggal', 'desc')
            ->pluck('tanggal')
            ->map(fn ($tanggal) => $this->weekKey(Carbon::parse($tanggal)))
            ->push($this->weekKey(now()))
            ->unique()
            ->sortDesc()
            ->values();

        return $keys
            ->map(fn (string $key) => $this->weekOption($key))
            ->values();
    }

    private function monthOptions(int $userId): Collection
    {
        $keys = Transaksi::where('user_id', $userId)
            ->select('tanggal')
            ->distinct()
            ->orderBy('tanggal', 'desc')
            ->pluck('tanggal')
            ->map(fn ($tanggal) => Carbon::parse($tanggal)->format('Y-m'))
            ->push(now()->format('Y-m'))
            ->unique()
            ->sortDesc()
            ->values();

        return $keys
            ->map(fn (string $key) => $this->monthOption($key))
            ->values();
    }

    private function weekOption(string $value): array
    {
        $start = $this->weekStart($value);

        if (! $start) {
            return [
                'value' => $value,
                'label' => $value,
            ];
        }

        $end = $start->copy()->endOfWeek(Carbon::SUNDAY);

        return [
            'value' => $value,
            'label' => $this->formatWeekRange($start, $end),
        ];
    }

    private function monthOption(string $value): array
    {
        $start = $this->monthStart($value);

        if (! $start) {
            return [
                'value' => $value,
                'label' => $value,
            ];
        }

        return [
            'value' => $value,
            'label' => self::NAMA_BULAN[$start->month].' '.$start->format('Y'),
        ];
    }

    private function formatWeekRange(Carbon $start, Carbon $end): string
    {
        $startMonth = self::NAMA_BULAN_SINGKAT[$start->month];
        $endMonth = self::NAMA_BULAN_SINGKAT[$end->month];

        if ($start->year !== $end->year) {
            return $start->format('j').' '.$startMonth.' '.$start->format('Y')
                .' – '.$end->format('j').' '.$endMonth.' '.$end->format('Y');
        }

        if ($start->month !== $end->month) {
            return $start->format('j').' '.$startMonth
                .' – '.$end->format('j').' '.$endMonth.' '.$end->format('Y');
        }

        return $start->format('j').' – '.$end->format('j')
            .' '.$endMonth.' '.$end->format('Y');
    }

    private function monthLabel(string $value): string
    {
        $start = $this->monthStart($value);

        if (! $start) {
            return $value;
        }

        return self::NAMA_BULAN[$start->month].' '.$start->format('Y');
    }

    private function weekStart(string $value): ?Carbon
    {
        if (! preg_match('/^(\d{4})-W(\d{2})$/', $value, $matches)) {
            return null;
        }

        $year = (int) $matches[1];
        $week = (int) $matches[2];

        if ($week < 1 || $week > 53) {
            return null;
        }

        $start = Carbon::now()
            ->setISODate($year, $week)
            ->startOfWeek(Carbon::MONDAY);

        return $this->weekKey($start) === $value ? $start : null;
    }

    private function weekKey(Carbon $date): string
    {
        $year = str_pad($date->format('o'), 4, '0', STR_PAD_LEFT);
        $week = str_pad($date->format('W'), 2, '0', STR_PAD_LEFT);

        return $year.'-W'.$week;
    }

    private function monthStart(string $value): ?Carbon
    {
        if (! preg_match('/^(\d{4})-(\d{2})$/', $value, $matches)) {
            return null;
        }

        $year = (int) $matches[1];
        $month = (int) $matches[2];

        if ($month < 1 || $month > 12) {
            return null;
        }

        return Carbon::create($year, $month, 1)->startOfDay();
    }

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

        if (empty($items) && ! empty($data['barang_id'])) {
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

        if ($data['jenis'] === 'pemasukan' && $mode === null) {
            $mode = ! empty($items) ? 'barang' : 'manual';
        }

        if ($mode === 'manual' && ! empty($items)) {
            throw ValidationException::withMessages([
                'items' => 'Pemasukan manual tidak boleh berisi barang.',
            ]);
        }

        if ($data['jenis'] === 'pengeluaran' && ! empty($items)) {
            throw ValidationException::withMessages([
                'items' => 'Pengeluaran tidak boleh memakai daftar barang penjualan.',
            ]);
        }

        if (
            $data['jenis'] === 'pemasukan'
            && $mode === 'barang'
            && empty($items)
        ) {
            throw ValidationException::withMessages([
                'items' => 'Tambahkan minimal satu barang untuk penjualan.',
            ]);
        }

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

            foreach ($items as $item) {
                $barangId = (int) $item['barang_id'];
                $qty = (int) $item['jumlah_barang'];

                $totalPerBarang[$barangId] =
                    ($totalPerBarang[$barangId] ?? 0) + $qty;
            }

            foreach ($totalPerBarang as $barangId => $totalQty) {
                $barang = Barang::where('id', $barangId)
                    ->where('user_id', $userId)
                    ->where('aktif', true)
                    ->lockForUpdate()
                    ->first();

                if (! $barang) {
                    throw ValidationException::withMessages([
                        'items' => 'Barang tidak ditemukan atau sudah diarsipkan.',
                    ]);
                }

                if ($barang->stok < $totalQty) {
                    throw ValidationException::withMessages([
                        'items' => "Stok {$barang->nama_barang} tidak mencukupi. "
                            ."Stok tersedia: {$barang->stok}, "
                            ."jumlah yang diminta: {$totalQty}.",
                    ]);
                }

                $barangTerkunci[$barangId] = $barang;
            }

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

            $transaksi = Transaksi::create([
                'user_id' => $userId,
                'barang_id' => $detailBarang[0]['barang']->id ?? null,
                'jumlah_barang' => $detailBarang[0]['jumlah_barang'] ?? null,
                'jenis' => $data['jenis'],
                'jumlah' => ! empty($detailBarang)
                    ? $total
                    : $data['jumlah'],
                'keterangan' => $data['keterangan'],
                'tanggal' => $data['tanggal'],
                'status' => 'aktif',
            ]);

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

            foreach ($totalPerBarang as $barangId => $totalQty) {
                $barangTerkunci[$barangId]->decrement('stok', $totalQty);
            }
        });

        return redirect('/transaksi')
            ->with('success', 'Transaksi berhasil disimpan.');
    }

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
                $data['minggu'] = 'Minggu '.($index + 1);

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

    public function destroy(Request $request, $id)
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
                if (! $detail->barang_id) {
                    continue;
                }

                $barang = Barang::where('id', $detail->barang_id)
                    ->where('user_id', Auth::id())
                    ->lockForUpdate()
                    ->first();

                if (! $barang) {
                    continue;
                }

                $barang->increment('stok', $detail->jumlah_barang);

                if (! $barang->aktif) {
                    $barang->aktif = true;
                    $barang->save();
                }
            }

            $transaksi->status = 'batal';
            $transaksi->save();
        });

        $redirect = redirect()->route('transaksi.index');
        $periode = $request->input('periode');

        if ($periode === 'mingguan') {
            $minggu = $request->input('minggu');

            if (is_string($minggu) && $this->weekStart($minggu)) {
                $redirect = redirect()->route('transaksi.index', [
                    'periode' => 'mingguan',
                    'minggu' => $minggu,
                ]);
            }
        } elseif ($periode === 'bulanan') {
            $bulan = $request->input('bulan');

            if (is_string($bulan) && $this->monthStart($bulan)) {
                $redirect = redirect()->route('transaksi.index', [
                    'periode' => 'bulanan',
                    'bulan' => $bulan,
                ]);
            }
        }

        return $redirect->with('success', 'Transaksi berhasil dibatalkan.');
    }
}
