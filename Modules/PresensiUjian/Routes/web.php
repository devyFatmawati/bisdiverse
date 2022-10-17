<?php

use Modules\PresensiUjian\Http\Controllers\PresensiController;
use Modules\PresensiUjian\Http\Controllers\PresensiUjianController;

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

Route::prefix('presensiujian')->group(function() {
    // Route::get('/', 'PresensiUjianController@index');
    Route::resource('/', PresensiController::class);
});
