<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\JabatanController;
use App\Http\Controllers\API\V1\PegawaiController;
use App\Http\Controllers\API\V1\ParameterController;
use App\Http\Controllers\API\V1\ProyekController;
use App\Http\Controllers\API\V1\DashboardController;
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

Route::get('/', function () {
    return view('layout.main');
});
Route::get('/dashboard', [DashboardController::class, 'view']);
Route::get('/pegawai', [PegawaiController::class, 'view']);
Route::get('/proyek', [ProyekController::class, 'view']);
Route::get('/parameter', [ParameterController::class, 'view']);

//Testing
Route::get('/testing', function () {
    return view('testing-1.testing');
});

Route::post('/pegawai/simpan', [PegawaiController::class, 'SimpanPegawai']);
Route::get('/pegawai/ambil', [PegawaiController::class, 'ReadPegawai']);