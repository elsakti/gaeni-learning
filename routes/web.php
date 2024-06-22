<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{name}/detail', [HomeController::class, 'detail'])->name('detail_course');

Route::group(['middleware' => ['guest']], function () {
    Route::post('/login/loading', [AuthController::class, 'dologin'])->name('login');
    Route::get('/login', [AuthController::class, 'login'])->name('login_page');
    Route::get('/register', [AuthController::class, 'register'])->name('register_page');
    Route::post('/register/loading', [AuthController::class, 'doregister'])->name('register');
    Route::get('/reset-password/{token}',[AuthController::class, 'password_reset'])->name('password.reset');
    Route::post('/reset-password',[AuthController::class, 'password_update'])->name('password.update');

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

    Route::get('/edit-course-assigned/{id}', [CourseController::class, 'edit_assigned'])->name('edit_user_courses');
    Route::post('/course-assign-to-user/{id}', [CourseController::class, 'assign_courses'])->name('course_assign_to_user');

    Route::post('/assign-course-to-users', [CourseController::class, 'assignCourseToUsers'])->name('assign_course_to_users');
    Route::delete('/courses/{course}/users/{user}/remove', [CourseController::class, 'removeUser'])->name('courses.removeUser');

    Route::get('/admin/dashboard/courses/{id}/tasks', [TaskController::class, 'index'])->name('admin_tasks_course');
    Route::get('/admin/dashboard/courses/{id}/submissions', [TaskController::class, 'show'])->name('admin_submissions_task');
    Route::get('/admin/dashboard/courses/task/{id}/edit', [TaskController::class, 'edit'])->name('admin_edit_task');
    Route::get('/admin/dashboard/courses/submission/{id}/edit', [TaskController::class, 'add_grade'])->name('admin_edit_submission');

    Route::get('/admin/toggle-task/{id}', [TaskController::class, 'toggle'])->name('admin_toggle_task');
    Route::delete('/admin/delete-task/{id}', [TaskController::class, 'destroy'])->name('admin_delete_task');
    Route::put('/admin/update-task/{id}', [TaskController::class, 'update'])->name('admin_update_task');
    Route::post('/admin/add-task/{id}', [TaskController::class, 'store'])->name('admin_add_task');
    Route::put('/admin/update-submission/{id}', [TaskController::class, 'update_grade'])->name('admin_update_grade');
    Route::delete('/admin/delete-submission/{id}', [TaskController::class, 'del_submission'])->name('admin_delete_submission');

    Route::get('/admin/dashboard/courses/{id}/absences', [AbsenceController::class, 'index'])->name('admin_absences_course');
    Route::get('/admin/dashboard/courses/{id}/attendances', [AbsenceController::class, 'show'])->name('admin_attends_absence');

    Route::post('/admin/add-absence/{id}', [AbsenceController::class, 'store'])->name('admin_add_absence');
    Route::delete('/admin/delete-absence/{id}', [AbsenceController::class, 'destroy'])->name('admin_delete_absence');
    Route::delete('/admin/delete-attendance/{id}', [AbsenceController::class, 'delete_attend'])->name('admin_delete_attendance');
    Route::get('/admin/toggle-absence/{id}', [AbsenceController::class, 'update'])->name('admin_toggle_absence');

    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin_courses');
    Route::get('/admin/courses/{id}/detail', [CourseController::class, 'admin_detail_course'])->name('admin_detail_courses');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin_create_courses');
    Route::get('/admin/courses/{id}edit', [CourseController::class, 'edit'])->name('admin_edit_courses');
    Route::post('/admin/courses/loading', [CourseController::class, 'store'])->name('admin_store_courses');
    Route::post('/admin/courses/{id}updating', [CourseController::class, 'update'])->name('admin_update_courses');
    Route::get('/admin/courses/{id}deleting', [CourseController::class, 'destroy'])->name('admin_delete_courses');

    Route::get('/forgot-password',[AuthController::class, 'password_request'])->name('password.request');
    Route::post('/forgot-password',[AuthController::class, 'password_email'])->name('password.email');

});

Route::group(['middleware' => ['role:trainer']], function () {
    Route::get('/trainer/dashboard', [DashboardController::class, 'trainer'])->name('trainer_dashboard');

    Route::get('/trainer/dashboard/courses/{id}/detail', [CourseController::class, 'trainer_detail_course'])->name('trainer_detail_courses');

    Route::get('/trainer/dashboard/courses/{id}/users', [CourseController::class, 'trainer_users_course'])->name('trainer_users_course');
    Route::get('/trainer/dashboard/courses/{id}/absences', [AbsenceController::class, 'index'])->name('trainer_absences_course');
    Route::get('/trainer/dashboard/courses/{id}/attendances', [AbsenceController::class, 'show'])->name('trainer_attends_absence');

    Route::post('/trainer/add-absences', [AbsenceController::class, 'store'])->name('trainer_add_absence');
    Route::get('/trainer/toggle-absences/{id}', [AbsenceController::class, 'update'])->name('trainer_toggle_absence');

    Route::get('/trainer/dashboard/courses/{id}/tasks', [TaskController::class, 'index'])->name('trainer_tasks_course');
    Route::get('/trainer/dashboard/courses/{id}/submissions', [TaskController::class, 'show'])->name('trainer_submissions_task');
    Route::get('/trainer/dashboard/courses/task/{id}/edit', [TaskController::class, 'edit'])->name('trainer_edit_task');
    Route::get('/trainer/dashboard/courses/submission/{id}/edit', [TaskController::class, 'add_grade'])->name('trainer_edit_submission');

    Route::get('/trainer/toggle-task/{id}', [TaskController::class, 'toggle'])->name('trainer_toggle_task');
    Route::delete('/trainer/delete-task/{id}', [TaskController::class, 'destroy'])->name('trainer_delete_task');
    Route::put('/trainer/update-task/{id}', [TaskController::class, 'update'])->name('trainer_update_task');
    Route::post('/trainer/add-task/{id}', [TaskController::class, 'store'])->name('trainer_add_task');
    Route::put('/trainer/update-submission/{id}', [TaskController::class, 'update_grade'])->name('trainer_update_grade');
    Route::delete('/trainer/delete-submission/{id}', [TaskController::class, 'del_submission'])->name('trainer_delete_submission');


});


Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'student'])->name('student_dashboard');
    Route::get('/student/dashboard/{id}/absences', [CourseController::class, 'student_detail_course'])->name('student_detail_courses');
    Route::get('/student/dashboard/profile',[DashboardController::class, 'student_profile'])->name('student_profile');

    Route::post('/student-attend', [AbsenceController::class, 'attend'])->name('student_attend');
    Route::post('/student-submit', [TaskController::class, 'submission'])->name('student_submit');

});
