<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{name}/detail', [HomeController::class, 'detail'])->name('detail_course');

Route::group(['middleware' => ['guest']], function () {
    Route::post('/login/loading', [AuthController::class, 'dologin'])->name('login');
    Route::get('/login', [AuthController::class, 'login'])->name('login_page');
    Route::get('/register', [AuthController::class, 'register'])->name('register_page');
    Route::post('/register/loading', [AuthController::class, 'doregister'])->name('register');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin_dashboard');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin_categories');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin_edit_categories');
    Route::post('/admin/categories/{id}/updating', [CategoryController::class, 'update'])->name('admin_update_categories');
    Route::post('/admin/categories/loading', [CategoryController::class, 'store'])->name('admin_add_category');
    Route::delete('/admin/categories/selected', [CategoryController::class, 'deleteAll'])->name('admin_delete_selected_categories');

    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin_users');
    Route::get('/admin/users/{id}/assign/trainer', [UsersController::class, 'assignTrainer'])->name('admin_assignTrainer_users');
    Route::get('/admin/users/create', [UsersController::class, 'create'])->name('admin_create_users');
    Route::get('/admin/users/{id}/edit', [UsersController::class, 'edit'])->name('admin_edit_users');
    Route::post('/admin/users/loading', [UsersController::class, 'store'])->name('admin_store_users');
    Route::post('/admin/users/{id}/updating', [UsersController::class, 'update'])->name('admin_update_users');
    Route::delete('/admin/users/{id}/delete', [UsersController::class, 'destroy'])->name('admin_delete_users');
    Route::post('/admin/users/addcourse', [UsersController::class, 'addCourse'])->name('admin_addcourse_selected_users');

    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin_courses');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin_create_courses');
    Route::get('/admin/courses/{id}edit', [CourseController::class, 'edit'])->name('admin_edit_courses');
    Route::post('/admin/courses/loading', [CourseController::class, 'store'])->name('admin_store_courses');
    Route::post('/admin/courses/{id}updating', [CourseController::class, 'update'])->name('admin_update_courses');
    Route::get('/admin/courses/{id}deleting', [CourseController::class, 'destroy'])->name('admin_delete_courses');
});

Route::group(['middleware' => ['role:trainer']], function () {
    Route::get('/trainer/dashboard', [DashboardController::class, 'trainer'])->name('trainer_dashboard');
});

Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'student'])->name('student_dashboard');
});
