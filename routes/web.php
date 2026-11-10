
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RestokController;


// =====================================
// WELCOME
// =====================================

Route::get('/', function () {
    return view('welcome');
});


// =====================================
// LOGIN
// =====================================

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'nama_toko' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'nama_toko' => 'Nama toko atau password salah.',
    ])->withInput();
});


// =====================================
// LOGOUT
// =====================================

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');


// =====================================
// DASHBOARD USER
// =====================================

Route::get('/dashboard', function () {
    $transaksi = \App\Models\Transaksi::where('user_id', Auth::id())
        ->orderBy('tanggal', 'desc')
        ->get();

    $pemasukan = $transaksi
        ->where('jenis', 'pemasukan')
        ->sum('jumlah');

    $pengeluaran = $transaksi
        ->where('jenis', 'pengeluaran')
        ->sum('jumlah');

    $omzet = $pemasukan - $pengeluaran;

    return view('auth.dashboard', compact(
        'transaksi',
        'pemasukan',
        'pengeluaran',
        'omzet'
    ));
})->middleware('auth');


// =====================================
// PROFIL USER
// =====================================

Route::get('/profil', function () {
    $user = Auth::user();

    return view('auth.profil', compact('user'));
})->middleware('auth')->name('profil');


// =====================================
// EDIT PROFIL USER
// =====================================

Route::get('/profil/edit', function () {
    $user = Auth::user();

    return view('auth.edit-profil', compact('user'));
})->middleware('auth')->name('profil.edit');

Route::put('/profil/edit', function (Request $request) {
    $user = Auth::user();

    $data = $request->validate([
        'nama_toko' => 'required|string|max:100',
        'password' => 'nullable|min:6|confirmed',
    ]);

    $user->nama_toko = $data['nama_toko'];

    if (!empty($data['password'])) {
        $user->password = $data['password'];
        $user->password_asli = Crypt::encryptString($data['password']);
    }

    $user->save();

    return redirect('/profil');
})->middleware('auth')->name('profil.update');


// =====================================
// SIGNUP
// =====================================

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::post('/signup', function (Request $request) {
    $data = $request->validate([
        'nama_toko' => 'required|string|max:100',
        'password' => 'required|min:6|confirmed',
    ]);

    \App\Models\User::create([
        'nama_toko' => $data['nama_toko'],
        'password' => $data['password'],
        'password_asli' => Crypt::encryptString($data['password']),
        'role' => 'user',
    ]);

    return redirect('/login');
});


// =====================================
// TRANSAKSI
// =====================================

Route::get('/transaksi', [TransaksiController::class, 'index'])
    ->middleware('auth');

Route::post('/transaksi', [TransaksiController::class, 'store'])
    ->middleware('auth')
    ->name('transaksi.store');

Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])
    ->middleware('auth')
    ->name('transaksi.destroy');


// =====================================
// BARANG
// =====================================

Route::get('/barang', [BarangController::class, 'index'])
    ->middleware('auth')
    ->name('barang.index');

Route::post('/barang', [BarangController::class, 'store'])
    ->middleware('auth')
    ->name('barang.store');

Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])
    ->middleware('auth')
    ->name('barang.edit');

Route::put('/barang/{id}', [BarangController::class, 'update'])
    ->middleware('auth')
    ->name('barang.update');

Route::delete('/barang/{id}', [BarangController::class, 'destroy'])
    ->middleware('auth')
    ->name('barang.destroy');


// =====================================
// RESTOK BARANG
// =====================================

Route::post('/barang/{barangId}/restok', [RestokController::class, 'store'])
    ->middleware('auth')
    ->name('barang.restok.store');


// =====================================
// OMZET
// =====================================

Route::get('/omzet', [TransaksiController::class, 'omzet'])
    ->middleware('auth');


// =====================================
// ADMIN
// =====================================

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('admin');

Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware('admin')
    ->name('admin.users');

Route::get('/admin/profil', [AdminController::class, 'profil'])
    ->middleware('admin')
    ->name('admin.profil');

Route::get('/admin/user/{id}', [AdminController::class, 'show'])
    ->middleware('admin')
    ->name('admin.user.show');

Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])
    ->middleware('admin')
    ->name('admin.user.edit');

Route::put('/admin/user/{id}', [AdminController::class, 'update'])
    ->middleware('admin')
    ->name('admin.user.update');

Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])
    ->middleware('admin')
    ->name('admin.user.destroy');
