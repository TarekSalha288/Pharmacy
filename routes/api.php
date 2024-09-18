<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\MedicineController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');

});
Route::post("/medicine/request/{id}",[MedicineController::class,'insert']);
Route::post('/medicines',[MedicineController::class,'show']);
Route::post('/search',[MedicineController::class,'search']);
Route::post('/medicine/{id}',[MedicineController::class,'edit']);
Route::post('/user/medicines',[UserController::class,'getMedicines']);
Route::get('/user/medicines/request/{id}',[MedicineController::class,'receive']);
Route::get('/user/ShowNotidication',[UserController::class,'ShowNotidication']);
Route::get('/user/ShowNotidication/readAll',[MedicineController::class,'markAll']);
Route::post('/user/deleteaccount/',[MedicineController::class,'deleteAccount']);
