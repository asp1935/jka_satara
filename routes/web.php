<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/////////////////////// fontend routes /////////////////////////

Route::get('/', [UserController::class, 'home'])->name('home');
Route::post('/add-contact', [Usercontroller::class, 'contact_us'])->name('contact_us');
Route::post('/student-admission', [UserController::class, 'admission'])->name('admission');
Route::get('/admission', function () {
    return view('studentAdmission');
});



//////////////////// admin routes //////////////////////////

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('GuestAdmin');
Route::post('/admin-login', [AdminController::class, 'Login'])->name('admin.login');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('Admin');
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('Admin');



Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact')->middleware('Admin');
Route::get('/delete-contact/{id}', [AdminController::class, 'delete_contact'])->name('admin.delete_contact')->middleware('Admin');



////////////////////// slider_routes /////////////////////////

Route::get('/add-slider', [AdminController::class, 'add_Slider'])->name('admin.add_slider')->middleware('Admin');
Route::post('/add-slider-post', [AdminController::class, 'add_Slider_Post'])->name('admin.add_slider_post')->middleware('Admin');
Route::get('/edit-slider/{id}', [AdminController::class, 'edit_Slider'])->name('admin.edit_slider')->middleware('Admin');
Route::post('/update-slider', [AdminController::class, 'update_Slider'])->name('admin.update_slider')->middleware('Admin');
Route::get('/delete-slider/{id}', [AdminController::class, 'delete_Slider'])->name('admin.delete_slider')->middleware('Admin');


////////////////////// news routes /////////////////////////

Route::get('/news', [AdminController::class, 'news'])->name('admin.news')->middleware('Admin');
Route::post('/add-news', [AdminController::class, 'addNews'])->name('admin.add_news')->middleware('Admin');
Route::get('/edit-news/{id}', [AdminController::class, 'editNews'])->name('admin.editNews')->middleware('Admin');
Route::put('/update-news', [AdminController::class, 'updateNews'])->name('admin.updateNews')->middleware('Admin');
Route::get('/delete-news/{id}', [AdminController::class, 'deleteNews'])->name('admin.deleteNews')->middleware('Admin');

////////////////////// event routes /////////////////////////

Route::get('/event', [AdminController::class, 'event'])->name('admin.event')->middleware('Admin');
Route::post('/add-event', [AdminController::class, 'addEvent'])->name('admin.addEvent')->middleware('Admin');
Route::get('/edit-event/{id}', [AdminController::class, 'editEvent'])->name('admin.editEvent')->middleware('Admin');
Route::put('/update-event', [AdminController::class, 'updateEvent'])->name('admin.updateEvent')->middleware('Admin');
Route::get('/delete-event/{id}', [AdminController::class, 'deleteEvent'])->name('admin.deleteEvent')->middleware('Admin');


//////////////////////////Syllabus Routes/////////////////////////////

Route::get('/syllabus', [AdminController::class, 'syllabus'])->name('admin.syllabus')->middleware('Admin');
Route::post('/upsert-syllabus', [AdminController::class, 'upsertSyllabus'])->name('admin.upsertSyllabus')->middleware('Admin');
Route::get('/delete-event', [AdminController::class, 'deleteSyllabus'])->name('admin.deleteSyllabus')->middleware('Admin');


//////////////////////////Student Routes/////////////////////////////



Route::get('/student-list', [AdminController::class, 'students'])->name('admin.student.list')->middleware('Admin');
