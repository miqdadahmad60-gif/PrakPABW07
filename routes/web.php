<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaporBanjirController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('lapor.form'));

// Halaman pelaporan warga dapat diakses tanpa login.
Route::get('/lapor-banjir/tambah', [LaporBanjirController::class, 'form'])->name('lapor.form');
Route::post('/lapor-banjir/kirim', [LaporBanjirController::class, 'kirim'])->name('lapor.kirim');

// Autentikasi manual yang sudah tersedia di project.
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Seluruh pengelolaan laporan hanya untuk petugas yang sudah login.
Route::middleware('auth')->prefix('petugas')->name('petugas.')->group(function () {
    Route::resource('laporan', LaporBanjirController::class)->names('laporan');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profil', fn () => view('auth.profile'))->name('profil');
});
