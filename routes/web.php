<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\JabatanController;
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
    return view('welcome');
});

//Testing
Route::get('/jabatan', function () {
    return view('testing-1.jabatan');
});

Route::post('/jabatan/simpan', [JabatanController::class, 'SimpanJabatan']);
Route::get('/jabatan/ambil', [JabatanController::class, 'ReadJabatan']);
