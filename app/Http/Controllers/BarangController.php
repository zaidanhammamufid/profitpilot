<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Restok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $barang = Barang::where('user_id', $userId)
            ->where('aktif', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $riwayatRestok = Restok::where('user_id', $userId)
            ->with('barang')
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('barang', compact(
            'barang',
            'riwayatRestok'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
        ]);

        Barang::create([
            'user_id' => Auth::id(),
            'nama_barang' => $data['nama_barang'],
            'harga' => $data['harga'],
            'stok' => $data['stok'],
            'aktif' => true,
        ]);

        return redirect('/barang')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('aktif', true)
            ->firstOrFail();

        return view('edit-barang', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('aktif', true)
            ->firstOrFail();

        $data = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|integer|min:0',
        ]);

        $barang->nama_barang = $data['nama_barang'];
        $barang->harga = $data['harga'];
        $barang->stok = $data['stok'];
        $barang->save();

        return redirect('/barang')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $barang->aktif = false;
        $barang->save();

        return redirect('/barang')
            ->with('success', 'Barang berhasil diarsipkan.');
    }
}
