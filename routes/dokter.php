<?php

use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\MemeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dokter.dashboard');

    Route::prefix('profile')->group(function (){
        Route::get('/', [ProfileController::class, 'edit'])->name('dokter.profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('dokter.profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('dokter.profile.destroy');
    });

    Route::prefix('jadwal-periksa')->group(function(){
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal-periksa.index');
        Route::get('/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal-periksa.create');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal-periksa.store');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal-periksa.update');
    });
    Route::prefix('memeriksa')->middleware('auth')->group(function () {
        Route::get('/', [MemeriksaController::class, 'index'])->name('dokter.memeriksa.index');
        Route::get('/periksa/{id}', [MemeriksaController::class, 'periksa'])->name('dokter.memeriksa.periksa');
        Route::get('/edit/{id}', [MemeriksaController::class, 'edit'])->name('dokter.memeriksa.edit');
        Route::post('/store/{id}', [MemeriksaController::class, 'store'])->name('dokter.memeriksa.store');
        Route::patch('/update/{id}', [MemeriksaController::class, 'update'])->name('dokter.memeriksa.update');
    });

    Route::prefix('obat')->group(function(){
        Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
        Route::get('/create', [ObatController::class, 'create'])->name('dokter.obat.create');
        Route::post('/', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
    });
    Route::prefix('dokter/obat')->name('dokter.obat.')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('index');
        Route::get('/trash', [ObatController::class, 'trash'])->name('trash');
        Route::post('/restore/{id}', [ObatController::class, 'restore'])->name('restore');
    });
});
