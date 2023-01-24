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

// Route::prefix('seminar')->middleware(['auth:sanctum', 'verified', 'role:0', 'jabatan:0'])->group(function () {
//     // Route::resource('/', seminarController::class);
//     Route::resource('/pembimbing', PembimbingSeminarController::class);
//     Route::resource('/pengajuan', VerifikasieminarController::class);
// });
// // role kaprodi
// Route::prefix('seminar')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:1'])->group(function () {
//     // Route::resource('/', seminarController::class);
//     // Route::resource('/pembimbing', PembimbingseminarController::class);
//     Route::resource('/pengajuan-seminar', SetujuiseminarController::class);
// });

// role mahasiswa
Route::prefix('seminar')->middleware(['auth:sanctum', 'verified', 'role:1', 'jabatan:3'])->group(function () {
    // Route::get('/', 'seminarController@index');
    Route::resource('/', SeminarController::class);
});

// Route::prefix('seminar')->middleware(['auth:sanctum', 'verified'])->group(function () {
//     // Route::get('/', 'seminarController@index');
//     Route::resource('/printsuratrekomendasi', PrintSuratRekomendasiController::class);
// });

