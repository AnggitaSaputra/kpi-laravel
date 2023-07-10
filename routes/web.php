<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\JabatanController;
use App\Http\Controllers\API\V1\PegawaiController;
use App\Http\Controllers\API\V1\ParameterController;
use App\Http\Controllers\API\V1\ProyekController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\TugasController;
use App\Http\Controllers\API\V1\DepartemenController;
use App\Models\Parameter;
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

//Dashboard
Route::get('/', function () {
    return view('layout.main');
});
Route::get('/dashboard', [DashboardController::class, 'view'])->name("Dashboard");

//Pegawai
Route::get('/pegawai', [PegawaiController::class, 'view'])->name("Employees/Data Pegawai");
Route::get('/pegawai/get', [PegawaiController::class, 'readPegawai']);
Route::get('/pegawai/add',[PegawaiController::class, 'viewTambah'])->name("Employees/Tambah Pegawai");
Route::post('/pegawai/add/simpan',[PegawaiController::class,'SimpanPegawai']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'viewEdit']) ->name("Employees/Edit Pegawai");
Route::post('/pegawai/edit/{id}/simpan', [PegawaiController::class, 'EditPegawai']);
Route::get('/pegawai/hapus/{id}',[PegawaiController::class,'HapusPegawai']); 

//Departemen
Route::get('/departemen', [DepartemenController::class, 'view'])->name("Departemen/Data Departemen");
Route::get('/departemen/get', [DepartemenController::class, 'ReadDepartemen']);
Route::get('/departemen/add',[DepartemenController::class, 'viewTambah'])->name("Departemen/Tambah Departemen");
Route::post('/departemen/add/simpan',[DepartemenController::class,'SimpanDepartemen']);
Route::get('/departemen/edit/{id}', [DepartemenController::class, 'viewEdit'])->name("Departemen/Edit Departemen");
Route::post('/departemen/edit/{id}/simpan', [DepartemenController::class, 'EditDepartemen']);
Route::get('/departemen/hapus/{id}',[DepartemenController::class,'HapusDepartemen']); 

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'view'])->name("Jabatan/Data Jabatan");
Route::get('/jabatan/get', [JabatanController::class, 'ReadJabatan']);
Route::get('/jabatan/add',[JabatanController::class, 'viewTambah'])->name("Jabatan/Tambah Jabatan");;
Route::post('/jabatan/add/simpan',[JabatanController::class,'SimpanJabatan']);
Route::get('/jabatan/edit/{id}', [JabatanController::class, 'viewEdit'])->name("Jabatan/Edit Jabatan");;
Route::post('/jabatan/edit/{id}/simpan', [JabatanController::class, 'EditJabatan']);
Route::get('/jabatan/hapus/{id}',[JabatanController::class,'HapusJabatan']); 

//Tugas
Route::get('/tugas', [TugasController::class, 'view'])->name("Tugas/Data Tugas");
Route::get('/tugas/get', [TugasController::class, 'readTugas']);
Route::get('/tugas/add',[TugasController::class, 'viewTambah'])->name("Tugas/Tambah Tugas");
Route::post('/tugas/add/simpan',[TugasController::class,'SimpanTugas']);
Route::get('/tugas/hapus/{id}',[TugasController::class,'HapusTugas']); 
Route::get('/tugas/edit/{id}',[TugasController::class,'viewEdit'])->name("Tugas/Edit Tugas");
Route::post('/tugas/edit/{id}/simpan', [TugasController::class,'EditTugas']);


//Proyek
Route::get('/proyek', [ProyekController::class, 'view'])->name("Proyek/Data Proyek");
Route::get('/proyek/get', [ProyekController::class, 'readProyek']);
Route::get('/proyek/add', [ProyekController::class, 'viewTambah'])->name("Proyek/Tambah Proyek");
Route::post('/proyek/add/simpan', [ProyekController::class, 'SimpanProyek']);
//Parameter
Route::get('/parameter', [ParameterController::class, 'view'])->name("Parameter/Data Parameter");
Route::get('/parameter/get', [ParameterController::class, 'readParameter']);
Route::get('/parameter/add', [ParameterController::class,'viewTambah'])->name("Parameter/Tambah Parameter");
Route::post('/parameter/add/simpan', [ParameterController::class,'SimpanParameter']);
Route::get('/parameter/edit/{id}',[ParameterController::class,'viewEdit'])->name("Parameter/Edit Parameter");
Route::post('/parameter/edit/{id}/simpan', [ParameterController::class,'EditParameter']);
Route::get('/parameter/hapus/{id}',[ParameterController::class,'HapusParameter']); 


//Testing
Route::get('/testing', function () {
    return view('testing-1.testing');
});

Route::post('/pegawai/simpan', [PegawaiController::class, 'SimpanPegawai']);
Route::get('/pegawai/ambil', [PegawaiController::class, 'ReadPegawai']);{{  }}