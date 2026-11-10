<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    // DASHBOARD ADMIN
    public function dashboard()
    {
        $totalUser = User::where('role', 'user')->count();

        return view('admin.dashboard', compact(
            'totalUser'
        ));
    }


    // DATA USERS
    public function users()
    {
        $users = User::where('role', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($users as $user) {

            if ($user->password_asli) {

                $user->password_tampil =
                    Crypt::decryptString(
                        $user->password_asli
                    );

            } else {

                $user->password_tampil =
                    'Belum tersedia';

            }
        }

        return view('admin.users', compact(
            'users'
        ));
    }


    // PROFIL ADMIN
    public function profil()
    {
        $admin = User::where('id', auth()->id())
            ->where('role', 'admin')
            ->firstOrFail();

        return view('admin.profil', compact(
            'admin'
        ));
    }


    // DETAIL USER
    public function show($id)
    {
        $user = User::where('id', $id)
            ->where('role', 'user')
            ->firstOrFail();

        if ($user->password_asli) {

            $user->password_tampil =
                Crypt::decryptString(
                    $user->password_asli
                );

        } else {

            $user->password_tampil =
                'Belum tersedia';

        }

        return view('admin.detail-user', compact(
            'user'
        ));
    }


    // EDIT USER
    public function edit($id)
    {
        $user = User::where('id', $id)
            ->where('role', 'user')
            ->firstOrFail();

        return view('admin.edit-user', compact(
            'user'
        ));
    }


    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)
            ->where('role', 'user')
            ->firstOrFail();

        $data = $request->validate([
            'nama_toko' => 'required|string|max:100',
            'password' => 'nullable|min:6',
        ]);

        $user->nama_toko = $data['nama_toko'];

        if (!empty($data['password'])) {

            $user->password =
                $data['password'];

            $user->password_asli =
                Crypt::encryptString(
                    $data['password']
                );
        }

        $user->save();

        return redirect('/admin/users');
    }


    // HAPUS USER
    public function destroy($id)
    {
        $user = User::where('id', $id)
            ->where('role', 'user')
            ->firstOrFail();

        $user->delete();

        return redirect('/admin/users');
    }
}