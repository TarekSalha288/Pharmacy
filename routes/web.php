<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MedicineController;
use App\Http\Middleware\TowFactor;
use App\Http\Middleware\UserStatus;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',TowFactor::class])->name('dashboard');
Route::get('/registe/verify',[TwoFactorController::class,'verify'])->name('verify');
Route::get('/register/verify/code',[TwoFactorController::class,'store'])->name('verify.store');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(UserStatus::class)->group(function(){
    Route::get('dashboard/create',[UserController::class,'create'])->name('create');
    Route::get('dashboard/archive',[MedicineController::class,'archive'])->name('archive');
    Route::get('dashboard/sending',[UserController::class,'showSend'])->name('sending');
    Route::get('dashboard/receiving',[UserController::class,'showReceive'])->name('receiving');
    Route::get('dashboard/requests',[UserController::class,'requests'])->name('request');
    Route::get('dashboard/requests/accept/{id}',[UserController::class,'accept'])->name('accept');
    Route::get('dashboard/requests/delete/{id}',[UserController::class,'deleteRequest'])->name('deleteRequest');
    Route::get('/dashboard/show',[MedicineController::class,'show'])->name('show');
    Route::get('dashboard/create/insert',[MedicineController::class,'insert'])->name('insert');
    Route::get("dashboard/show/search",[MedicineController::class,'search'])->name('search');
    Route::get('dashboard/show/update/{id}',[MedicineController::class,'updateMedicine'])->name('update_medicine');
    Route::Post('dashboard/show/update/medicine/{id}',[MedicineController::class,'updateMedicineAdmin'])->name('update_medicine_admin');
    Route::get('dashboard/show/update/',[MedicineController::class,'update'])->name('update');
    Route::get('dashboard/show/search/edit/{id}',[MedicineController::class,'edit'])->name('edit');
    Route::get('dashboard/archive/delete/{id}',[MedicineController::class,'delete'])->name('delete');
});
