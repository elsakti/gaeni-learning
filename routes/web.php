<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login_page');
Route::get('/{name}detail', [HomeController::class, 'detail'])->name('detail_course');
Route::get('/register', [AuthController::class, 'register'])->name('register_page');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/loading', [AuthController::class, 'dologin'])->name('login');
Route::post('/register/loading', [AuthController::class, 'doregister'])->name('register');


Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin_dashboard');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin_categories');
Route::get('/admin/categories/{id}edit', [CategoryController::class, 'edit'])->name('admin_edit_categories');
Route::post('/admin/categories/{id}updating', [CategoryController::class, 'update'])->name('admin_update_categories');
Route::post('/admin/categories/loading', [CategoryController::class, 'store'])->name('admin_add_category');
Route::delete('/admin/categories/selected', [CategoryController::class, 'deleteAll'])->name('admin_delete_selected_categories');

Route::get('/admin/users', [UsersController::class, 'index'])->name('admin_users');
Route::get('/admin/users/{id}assignTrainer', [UsersController::class, 'assignTrainer'])->name('admin_assignTrainer_users');
Route::get('/admin/users/create', [UsersController::class, 'create'])->name('admin_create_users');
Route::get('/admin/users/{id}edit', [UsersController::class, 'edit'])->name('admin_edit_users');
Route::post('/admin/users/loading', [UsersController::class, 'store'])->name('admin_store_users');
Route::post('/admin/users/{id}updating', [UsersController::class, 'update'])->name('admin_update_users');
Route::delete('/admin/users/selected', [UsersController::class, 'deleteAll'])->name('admin_delete_selected_users');
Route::post('/admin/users/addcourse', [UsersController::class, 'addCourseToAll'])->name('admin_addcourse_selected_users');

Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin_courses');
Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin_create_courses');
Route::get('/admin/courses/{id}edit', [CourseController::class, 'edit'])->name('admin_edit_courses');
Route::post('/admin/courses/loading', [CourseController::class, 'store'])->name('admin_store_courses');
Route::post('/admin/courses/{id}updating', [CourseController::class, 'update'])->name('admin_update_courses');
Route::get('/admin/courses/{id}deleting', [CourseController::class, 'destroy'])->name('admin_delete_courses');


Route::get('/trainer/dashboard', [DashboardController::class, 'trainer'])->name('trainer_dashboard');
Route::get('/student/dashboard', [DashboardController::class, 'student'])->name('student_dashboard');

