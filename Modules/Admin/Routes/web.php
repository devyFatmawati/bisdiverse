<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\DosenController;
use Modules\Admin\Http\Controllers\KelasController;
use Modules\Admin\Http\Controllers\MatkulController;
use Modules\Admin\Http\Controllers\RuanganController;
use Modules\Admin\Http\Controllers\MahasiswaController;
use Modules\Admin\Http\Controllers\UserDosenController;
use Modules\Admin\Http\Controllers\UserKaprodiController;
use Modules\Admin\Http\Controllers\LihatPresensiController;
use Modules\Admin\Http\Controllers\PrintPresensiController;
use Modules\Admin\Http\Controllers\RekapPresensiController;
use Modules\Admin\Http\Controllers\RfidMahasiswaController;
use Modules\Admin\Http\Controllers\UserMahasiswaController;

Route::prefix('admin')->middleware(['auth:sanctum','verified', 'role:0', 'divisi:0', 'jabatan:0'])->group(function() {
    Route::resource('/', AdminController::class);
    Route::resource('/jadwal', AdminController::class);
    Route::view('/lihat', 'admin::lihat');
    Route::resource('/dosen', DosenController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/ruangan', RuanganController::class);
    Route::resource('/matkul', MatkulController::class);
    Route::resource('/rfid', RfidMahasiswaController::class);
    Route::resource('/rekap-presensi', RekapPresensiController::class);
    Route::resource('/lihat-presensi', LihatPresensiController::class);
    Route::resource('/print-presensi', PrintPresensiController::class);
    Route::resource('/user-mahasiswa', UserMahasiswaController::class);
    Route::resource('/user-dosen', UserDosenController::class);
    Route::resource('/user-kaprodi', UserKaprodiController::class);
});
