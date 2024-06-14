<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/detail/{id}', [PasienController::class, 'show']);
Route::get('/pasien/delete/{id}', [PasienController::class, 'destroy']);
Route::post('/pasien/update/{id}', [PasienController::class, 'update']);
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);

Route::get('/periksa', [PeriksaController::class, 'index']);
Route::post('/periksa/update/{id}', [PeriksaController::class, 'update']);
Route::get('/periksa/edit/{id}', [PeriksaController::class, 'edit']);
Route::get('/periksa/delete/{id}', [PeriksaController::class, 'destroy']);
Route::get('/periksa/detail/{id}', [PeriksaController::class, 'show']);
Route::post('/periksa/store', [PeriksaController::class, 'store'])->name('periksa.store');

Route::get('/kelurahan', [KelurahanController::class, 'index']);
Route::post('/kelurahan/update/{id}', [KelurahanController::class, 'update']);
Route::get('/kelurahan/edit/{id}', [KelurahanController::class, 'edit']);
Route::get('/kelurahan/delete/{id}', [KelurahanController::class, 'destroy']);
Route::post('/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');

Route::get('/dokter', [DokterController::class, 'index']);
Route::post('/dokter/update/{id}', [DokterController::class, 'update']);
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);
Route::get('/dokter/detail/{id}', [DokterController::class, 'show']);
Route::get('/dokter/delete/{id}', [DokterController::class, 'destroy']);
Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');

Route::get('/unit_kerja', [UnitKerjaController::class, 'index']);
Route::post('/unit_kerja/update/{id}', [UnitKerjaController::class, 'update']);
Route::get('/unit_kerja/edit/{id}', [UnitKerjaController::class, 'edit']);
Route::get('/unit_kerja/delete/{id}', [UnitKerjaController::class, 'destroy']);
Route::post('/unit_kerja/store', [UnitKerjaController::class, 'store'])->name('unit_kerja.store');
