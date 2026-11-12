<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Restok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestokController extends Controller
{
    public function store(Request $request, $barangId)
    {
        $data = $request->validate([
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($data, $barangId) {
            $barang = Barang::where('id', $barangId)
                ->where('user_id', Auth::id())
                ->where('aktif', true)
                ->lockForUpdate()
                ->firstOrFail();

            $barang->increment('stok', $data['jumlah']);

            Restok::create([
                'user_id' => Auth::id(),
                'barang_id' => $barang->id,
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
                'keterangan' => $data['keterangan'] ?? null,
            ]);
        });

        return redirect('/barang')
            ->with('success', 'Stok berhasil ditambahkan dan riwayat restok tersimpan.');
    }
}
