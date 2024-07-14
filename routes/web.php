<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;

// Login n Register Form
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/login', function () {
    return view('auth/login');
});

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/dashboard', function () {
    return view('admin/dashboard'); // Adjust this to your actual admin dashboard view
})->name('dashboard'); // Optionally, you can add middleware here

// Dashboard Menu
Route::post('/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('/addproduct', function () {
    return view('admin/addproduct');
});
Route::get('/store', function () {
    return view('admin/store');
});
Route::get('/chat', function () {
    return view('admin/chat');
});
Route::get('/profile', function () {
    return view('admin/profile');
});

// logout
Route::get('/logout', function () {
    return view('auth/login');
});

// dashboard
Route::get('/dashboard', [TransaksiController::class, 'index'])->name('admin.dashboard.transaksi');

// Total barang
Route::get('/stokbarang', [TransaksiController::class, 'getTotalStock'])->name('admin.dashboard.total');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// total order
Route::get('/totaltransaksi', [TransaksiController::class, 'getTotalTransaksi'])->name('admin.dashboard.total');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// total income
Route::get('/penghasilan', [TransaksiController::class, 'getTotalIncome'])->name('admin.dashboard.income');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// pengiriman

// addproduct
Route::post('/addproduct', [BarangController::class, 'store'])->name('barang.store');
Route::get('/addproduct', [BarangController::class, 'index'])->name('admin.addproduct');
Route::delete('/addproduct/delete/{kd_barang}', [BarangController::class, 'destroy'])->name('admin.deleteproduct');
Route::get('admin/editproduct/{kd_barang}', [BarangController::class, 'edit'])->name('admin.editproduct');
Route::put('admin/updateproduct/{nama_b}', [BarangController::class, 'update'])->name('admin.updateproduct');

// store
Route::get('/store', [ProductController::class, 'index']);

// chat
Route::get('/chat', [ChatController::class, 'index'])->name('admin.chat');

