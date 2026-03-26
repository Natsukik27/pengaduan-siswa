<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InputAspirasiController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController; // TAMBAHKAN INI

// Halaman utama
Route::get('/', function () {
    $kategoris = \App\Models\Kategori::all();
    return view('welcome', compact('kategoris'));
});

// Route untuk input aspirasi dari welcome page (bisa diakses tanpa login)
Route::post('/inputaspirasi', [InputAspirasiController::class, 'store'])->name('inputaspirasi.store');

// Route frontend (bisa diakses tanpa login)
Route::get('/profil', [InputAspirasiController::class, 'profil']);
Route::get('/search', [InputAspirasiController::class, 'search']);

// Auth routes
Auth::routes();

// Dashboard utama setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Semua route di bawah ini butuh login
Route::middleware(['auth'])->group(function () {

    // CRUD Admin
    Route::resource('admin', AdminController::class);

    // CRUD Siswa
    Route::resource('siswa', SiswaController::class);

    // CRUD Kategori
    Route::resource('kategori', KategoriController::class);

    // CRUD Aspirasi - GUNAKAN ROUTE CUSTOM UNTUK CREATE
    Route::resource('aspirasi', AspirasiController::class)->except(['create']);
    Route::get('aspirasi/create/{input_aspirasi}', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/{id}/update-status', [AspirasiController::class, 'updateStatus'])->name('aspirasi.update-status');

    // Input Aspirasi management
    Route::resource('inputaspirasi', InputAspirasiController::class)->except(['store', 'create']);

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan.index');
    Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])->name('laporan.pdf');
    Route::get('/laporan/pdf/{id}', [LaporanController::class, 'pdfSingle'])->name('laporan.pdf-single');

    // Profile Routes - PINDAHKAN KE DALAM AUTH MIDDLEWARE
    Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::delete('/avatar', [ProfileController::class, 'removeAvatar'])->name('profile.remove-avatar');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});
});