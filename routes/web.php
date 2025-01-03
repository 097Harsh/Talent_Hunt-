<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::get('/',[UserController::class,'home'])->name('home');

//Admin URl
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/ManagerUsers',[AdminController::class,'managerUsers'])->middleware(['auth', 'verified'])->name('ManagerUsers');
//delete user URL
Route::post('/delete_user/{id}', [AdminController::class, 'deleteUser'])->middleware(['auth', 'verified'])->name('deleteUser');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
