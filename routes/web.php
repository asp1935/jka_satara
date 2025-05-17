<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//////////////////// admin routes //////////////////////////

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('GuestAdmin');
Route::post('/admin-login', [AdminController::class, 'Login'])->name('admin.login');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('Admin');
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('Admin');



////////////////////// slider_routes /////////////////////////

Route::get('/add-slider', [AdminController::class, 'add_Slider'])->name('admin.add_slider')->middleware('Admin');
Route::post('/add-slider-post',[AdminController::class,'add_Slider_Post'])->name('admin.add_slider_post')->middleware('Admin');
Route::get('/edit-slider/{id}', [AdminController::class, 'edit_Slider'])->name('admin.edit_slider')->middleware('Admin');
Route::post('/update-slider', [AdminController::class, 'update_Slider'])->name('admin.update_slider')->middleware('Admin');
Route::get('/delete-slider/{id}',[AdminController::class,'delete_Slider'])->name('admin.delete_slider')->middleware('Admin');



/////////////////////// fontend routes /////////////////////////

Route::get('/',[UserController::class,'home'])->name('home');


 


