<?php

use App\Models\Role;
use Modules\Magang\Http\Controllers\MagangController;
use Modules\Magang\Http\Controllers\SetujuiMagangController;
use Modules\Magang\Http\Controllers\PembimbingMagangController;
use Modules\Magang\Http\Controllers\VerifikasiMagangController;

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
// role admin
Route::prefix('magang')->middleware(['auth:sanctum', 'verified', 'role:0', 'jabatan:0'])->group(function () {
    // Route::resource('/', MagangController::class);
    Route::resource('/pembimbing', PembimbingMagangController::class);
    Route::resource('/pengajuan', VerifikasiMagangController::class);
});
// role kaprodi
Route::prefix('magang')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:1'])->group(function () {
    // Route::resource('/', MagangController::class);
    // Route::resource('/pembimbing', PembimbingMagangController::class);
    Route::resource('/pengajuan-magang', SetujuiMagangController::class);
});

// role mahasiswa
Route::prefix('magang')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:3'])->group(function () {
    // Route::get('/', 'MagangController@index');
    Route::resource('/', MagangController::class);
});

Route::prefix('magang')->middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route::get('/', 'MagangController@index');
    Route::resource('/printsuratrekomendasi', PrintSuratRekomendasiController::class);
});
