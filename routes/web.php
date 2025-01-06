<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::get('/',[UserController::class,'home'])->name('home');
Route::get('/about',[UserController::class,'about'])->name('about');
Route::get('/contact',[UserController::class,'contact'])->name('contact');
//store contact detials
Route::post('/storeContact',[UserController::class,'storeContact'])->name('storeContact');

//User side URL's
Route::get('/userProfile',[UserController::class,'userProfile'])->middleware(['auth', 'verified'])->name('userProfile');
Route::post('/UpdateProfile',[UserController::class,'UpdateProfile'])->middleware(['auth', 'verified'])->name('UpdateProfile');
//for fetching record for country,state, and city using ajax URL's
Route::get('/get_country',[UserController::class,'get_country'])->name('get_country');
//for fetching state
Route::get('/get_state',[UserController::class,'get_state'])->name('get_state');
//for fetching city
Route::get('/get_city',[UserController::class,'get_city'])->name('get_city');

//Admin URl
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/ManagerUsers',[AdminController::class,'managerUsers'])->middleware(['auth', 'verified'])->name('ManagerUsers');
//delete user URL
Route::post('/delete_user/{id}', [AdminController::class, 'deleteUser'])->middleware(['auth', 'verified'])->name('deleteUser');
//edit user  URl
Route::get('/edit_user/{id}',[AdminController::class,'editUser'])->middleware(['auth', 'verified'])->name('EditUser');
//updating record
Route::post('/update_user/{id}',[AdminController::class,'updateUser'])->middleware(['auth', 'verified'])->name('updateUser');
//Manage Course Module
Route::get('/ManageCourse',[AdminController::class,'ManageCourse'])->middleware(['auth', 'verified'])->name('ManageCourse');
Route::get('/AddCourse',[AdminController::class,'AddCourse'])->middleware(['auth', 'verified'])->name('AddCourse');
Route::post('/InsertCourse',[AdminController::class,'InsertCourse'])->middleware(['auth', 'verified'])->name('InsertCourse');
//delte course
Route::post('/delete_course/{id}', [AdminController::class, 'deleteCourse'])->middleware(['auth', 'verified'])->name('DeleteCourse');
//edit course
Route::get('/edit_course/{id}',[AdminController::class,'EditCourse'])->middleware(['auth', 'verified'])->name('EditCourse');
Route::post('/UpdateCourse/{id}',[AdminController::class,'UpdateCourse'])->middleware(['auth', 'verified'])->name('UpdateCourse');
//Manage skills module
Route::get('/ManageSkills',[AdminController::class,'ManageSkills'])->middleware(['auth', 'verified'])->name('ManageSkills');
Route::get('/AddSkill',[AdminController::class,'AddSkill'])->middleware(['auth', 'verified'])->name('AddSkill');
Route::post('/InsertSkill',[AdminController::class,'InsertSkill'])->middleware(['auth', 'verified'])->name('InsertSkill');
//delete skills
Route::post('/delete_skill/{id}', [AdminController::class, 'deleteSkill'])->middleware(['auth', 'verified'])->name('deleteSkill');
//editing skill
Route::get('/EditSkill/{id}',[AdminController::class,'editSkill'])->middleware(['auth', 'verified'])->name('EditSkill');
Route::post('/updatingRecord/{id}',[AdminController::class,'UpdatingSkill'])->middleware(['auth', 'verified'])->name('UpdatingSkill');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
