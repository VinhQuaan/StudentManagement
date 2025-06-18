<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);
// Route::resource('/courses' ,  CourseController::class);
Route::resource('/batches' ,   BatchController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');


Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/courses', [StudentCourseController::class, 'index'])->name('student.courses.index');
    Route::post('/courses/enroll/{course}', [StudentCourseController::class, 'enroll'])->name('student.courses.enroll');
});

Route::delete('/student/courses/{id}/unenroll', [StudentCourseController::class, 'unenroll'])->name('student.courses.unenroll');
Route::get('/student/courses/{id}/students', [StudentCourseController::class, 'viewEnrolledStudents'])
    ->name('student.courses.view_students');