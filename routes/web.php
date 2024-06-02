<?php

use App\Http\Controllers\AbsenceController;
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

    Route::resource('/admin/dashboard/categories', CategoryController::class);
    Route::resource('/admin/dashboard/users', UsersController::class);
    
    Route::get('/assign-trainer/{id}', [UsersController::class, 'assignTrainer'])->name('admin_assign_trainer');
    
    Route::get('/admin/dashboard/courses/{id}/users', [CourseController::class, 'admin_users_course'])->name('admin_users_course');
    Route::post('/assign-course-to-users', [CourseController::class, 'assignCourseToUsers'])->name('assign_course_to_users');
    Route::delete('/courses/{course}/users/{user}/remove', [CourseController::class, 'removeUser'])->name('courses.removeUser');
    
    Route::get('/admin/dashboard/courses/{id}/absences', [AbsenceController::class, 'index'])->name('admin_absences_course');
    Route::get('/admin/dashboard/courses/{id}/attendances', [AbsenceController::class, 'show'])->name('admin_attends_absence');

    Route::post('/add-absence/{id}', [AbsenceController::class, 'store'])->name('admin_add_absence');
    Route::delete('/delete-absence/{id}', [AbsenceController::class, 'destroy'])->name('admin_delete_absence');
    Route::delete('/delete-attendance/{id}', [AbsenceController::class, 'delete_attend'])->name('admin_delete_attendance');
    Route::get('/toggle-absence/{id}', [AbsenceController::class, 'update'])->name('admin_toggle_absence');

    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin_courses');
    Route::get('/admin/courses/{id}/detail', [CourseController::class, 'admin_detail_course'])->name('admin_detail_courses');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin_create_courses');
    Route::get('/admin/courses/{id}edit', [CourseController::class, 'edit'])->name('admin_edit_courses');
    Route::post('/admin/courses/loading', [CourseController::class, 'store'])->name('admin_store_courses');
    Route::post('/admin/courses/{id}updating', [CourseController::class, 'update'])->name('admin_update_courses');
    Route::get('/admin/courses/{id}deleting', [CourseController::class, 'destroy'])->name('admin_delete_courses');
});

Route::group(['middleware' => ['role:trainer']], function () {
    Route::get('/trainer/dashboard', [DashboardController::class, 'trainer'])->name('trainer_dashboard');
    Route::get('/trainer/dashboard/course/{id}/detail', [CourseController::class, 'trainer_detail_course'])->name('trainer_detail_courses');
    Route::get('/trainer/dashboard/course/{id}/users', [CourseController::class, 'trainer_users_course'])->name('trainer_users_course');
    Route::get('/trainer/dashboard/course/{id}/absences', [AbsenceController::class, 'index'])->name('trainer_absences_course');
    Route::get('/trainer/dashboard/courses/{id}/attendances', [AbsenceController::class, 'show'])->name('trainer_attends_absence');
    Route::post('/add-absences', [AbsenceController::class, 'store'])->name('trainer_add_absence');
    Route::get('/toggle-absences/{id}', [AbsenceController::class, 'update'])->name('trainer_toggle_absence');

    
});


Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'student'])->name('student_dashboard');
    Route::get('/student/dashboard/{id}/absences', [CourseController::class, 'student_detail_course'])->name('student_detail_courses');

    Route::post('/student-attend', [AbsenceController::class, 'attend'])->name('student_attend');

});
