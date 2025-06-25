<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    StudentController,
    TeacherController,
    CourseController,
    RoleController,
    UserController,
    ProfileController,
    StudentCourseController,
    HomeController
};

// Trang chính
Route::get('/', fn() => view('auth.login'));
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:Admin'])->prefix('admin/courses')->name('admin.courses.')->group(function () {
    Route::resource('/', \App\Http\Controllers\Admin\CourseController::class)->parameters(['' => 'course']);
    Route::get('/admin/courses/{course}', [AdminCourseController::class, 'show'])->name('admin.courses.show');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    // Quản lý role/user/product (admin)
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Student routes
Route::middleware(['auth', 'role:Student'])->prefix('student/courses')->name('student.courses.')->group(function () {
    Route::get('/', [StudentCourseController::class, 'index'])->name('index');
    Route::post('/enroll/{course}', [StudentCourseController::class, 'enroll'])->name('enroll');
    Route::delete('/{id}/unenroll', [StudentCourseController::class, 'unenroll'])->name('unenroll');
    Route::get('/{id}/students', [StudentCourseController::class, 'viewEnrolledStudents'])->name('view_students');
});
Route::middleware(['auth', 'role:Student'])->group(function () {
    Route::get('/student/grades', [StudentController::class, 'grades'])->name('student.grades');
});

// Teacher routes
Route::middleware(['auth', 'role:Teacher'])->prefix('teacher/courses')->name('teacher.course.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index'); // teacher.course.index
    Route::get('/{course}', [TeacherController::class, 'show'])->name('show');
    Route::post('/{course}/grades', [TeacherController::class, 'updateGrades'])->name('grades.update');
});

