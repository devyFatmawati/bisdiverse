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

use Modules\Judulskripsi\Http\Controllers\DosenBimbinganMahasiswaSkripsiController;
use Modules\Judulskripsi\Http\Controllers\JudulskripsiController;
use Modules\Judulskripsi\Http\Controllers\PembimbingSkripsiController;
use Modules\Judulskripsi\Http\Controllers\SetujuiPengajuanJudulController;
use Modules\Judulskripsi\Http\Controllers\VerifikasiPengajuanJudulController;

//admin
Route::prefix('judulskripsi')->middleware(['auth:sanctum', 'verified', 'role:0', 'jabatan:0'])->group(function () {
    Route::resource('/pengajuan', VerifikasiPengajuanJudulController::class);
    Route::resource('/pembimbing', PembimbingSkripsiController::class);
});

// role kaprodi
Route::prefix('judulskripsi')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:1'])->group(function () {
    Route::resource('/pengajuan-judul', SetujuiPengajuanJudulController::class);
});

// role dosen
Route::prefix('judulskripsi')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:2'])->group(function () {
    Route::resource('/bimbingan', DosenBimbinganMahasiswaSkripsiController::class);
});

// role mahasiswa
Route::prefix('judulskripsi')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:3'])->group(function () {
    // Route::get('/', 'seminarController@index');
    Route::resource('/', JudulskripsiController::class);
});

// Route::prefix('seminar')->middleware(['auth:sanctum', 'verified'])->group(function () {
//     // Route::get('/', 'seminarController@index');
//     Route::resource('/printsuratrekomendasi', PrintSuratRekomendasiController::class);
// });