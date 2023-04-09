<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\ExampleController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\ProfileController;
use App\Http\Controllers\API\V1\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {

    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('register', [AuthController::class,'register']);
        Route::post('login', [AuthController::class,'login']);

        Route::group(['middleware' => 'auth'], function ($router) {
            Route::post('logout', [AuthController::class,'logout']);
            Route::post('refresh', [AuthController::class,'refresh']);

        });
    });


    Route::middleware('auth.jwt')->group(function(){
        // role
        Route::apiResource('roles',RoleController::class);
        Route::apiResource('permissions',PermissionController::class);
        Route::post('profile', [ProfileController::class,'index']);
    });


});
