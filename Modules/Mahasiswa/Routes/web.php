<?php

use Modules\Mahasiswa\Http\Controllers\MahasiswaController;
use Modules\Mahasiswa\Http\Controllers\ProfileMahasiswaController;

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

Route::prefix('mahasiswa')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:3'])->group(function() {
    // Route::get('/', 'MahasiswaController@index');
    Route::resource('/', MahasiswaController::class);
    Route::resource('/profile', ProfileMahasiswaController::class);
});
