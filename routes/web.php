<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('pasien.dashboard');
});

use App\Http\Controllers\Dokter\ObatController;

Route::prefix('dokter')->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('dokter.obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('dokter.obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
});    

Route::prefix('dokter')->group(function () {
    Route::get('/jadwal-periksa', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
    Route::get('/jadwal-periksa/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
    Route::post('/jadwal-periksa', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
    Route::get('/jadwal-periksa/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal-periksa.edit');
    Route::put('/jadwal-periksa/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
    Route::delete('/jadwal-periksa/{id}', [JadwalPeriksaController::class, 'destroy'])->name('dokter.jadwal-periksa.destroy');
    Route::post('/{id}/status', [JadwalPeriksaController::class, 'toggleStatus'])->name('dokter.jadwal-periksa.status');
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
		// ....
		// route pasien yang lain
    Route::prefix('janji-periksa')->group(function(){
        Route::get('/', [JanjiPeriksaController::class, 'index'])->name('pasien.janji-periksa.index');
        Route::post('/', [JanjiPeriksaController::class, 'store'])->name('pasien.janji-periksa.store');
    });
});

Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->group(function () {
		// ...
		// Route pasien yang lain
		
    Route::prefix('riwayat-periksa')->group(function(){
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('pasien.riwayat-periksa.index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('pasien.riwayat-periksa.detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('pasien.riwayat-periksa.riwayat');
    });
});
require __DIR__.'/auth.php';
