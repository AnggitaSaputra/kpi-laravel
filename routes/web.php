<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\JabatanController;
use App\Http\Controllers\API\V1\PegawaiController;
use App\Http\Controllers\API\V1\ParameterController;
use App\Http\Controllers\API\V1\ProyekController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Models\Pegawai;

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
Route::get('/dashboard', [DashboardController::class, 'view'])->name("Dashboard");

//Pegawai
Route::get('/pegawai', [PegawaiController::class, 'view'])->name("Employees/Data Pegawai");
Route::get('/pegawai/get', [PegawaiController::class, 'readPegawai']);
Route::get('/pegawai/add',[PegawaiController::class, 'viewTambah']);

//Proyek
Route::get('/proyek', [ProyekController::class, 'view'])->name("Proyek/Data Proyek");
Route::get('/proyek/get', [ProyekController::class, 'readProyek']);
Route::get('/proyek/add', [ProyekController::class, 'viewTambah'])->name("Proyek/Tambah Proyek");

//Parameter
Route::get('/parameter', [ParameterController::class, 'view'])->name("Parameter/Data Parameter");
Route::get('/parameter/get', [ParameterController::class, 'readParameter']);
Route::get('/addparameter', function () {
    return view('parameter.add');
});



//Testing
Route::get('/testing', function () {
    return view('testing-1.testing');
});

Route::post('/pegawai/simpan', [PegawaiController::class, 'SimpanPegawai']);
Route::get('/pegawai/ambil', [PegawaiController::class, 'ReadPegawai']);{{  }}