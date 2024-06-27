<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DashboardController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/pelaporan', LaporanController::class);
    Route::resource('/pengguna', UserController::class);
    Route::get('/upload_bukti_laporan/{id_dokumen}', [LaporanController::class, 'upload_bukti']);
    Route::post('/upload_bukti_laporan', [LaporanController::class, 'upload']);
    Route::post('/send-whatsapp', [WhatsappController::class, 'sendWhatsApp']);
    // Route untuk menampilkan halaman cetak laporan
    Route::get('/cetak-laporan', [LaporanController::class, 'showCetakLaporanForm']);
    // Route untuk mengolah permintaan cetak laporan
    Route::post('/cetak-laporan', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetak.post');
    // Route untuk menampilkan halaman cetak laporan
    Route::get('/cetak-laporan-pengguna', [UserController::class, 'showCetakPenggunaForm']);
    // Route untuk mengolah permintaan cetak laporan
    Route::post('/cetak-laporan-pengguna', [UserController::class, 'cetakPengguna']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);



