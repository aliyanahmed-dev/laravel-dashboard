<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
    dd('Link Updated');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile-update', [IndexController::class, 'profile_update'])->name('profile_update');
    Route::post('/profile-submssison', [IndexController::class, 'student_pofile_submission'])->name('student_pofile_submission');
});

Route::middleware(['auth', 'profile.complete'])->group(function () {
    Route::get('/profile', [IndexController::class, 'profile'])->name('profile');
});

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [IndexController::class, 'contact_submit'])->name('contact-submit');
Route::get('/blogs/{slug?}', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{slug}', [IndexController::class, 'blog_detail'])->name('blog-detail');
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




Route::resource('newsletters', NewsletterController::class);

Route::prefix('admin')->group(function () {

    Route::view('signin', 'admin.pages.login')->name('signin');
    Route::post('/signin', [AuthController::class, 'adminLogin'])->name('signin');

    Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::middleware('admin.auth')->group(function () {;



        // Exrea Users 
        Route::get('/teachers', [DashboardController::class, 'teachers_list'])->name('teachers_list');
        Route::get('/teachers-add', [DashboardController::class, 'teachers_add'])->name('teachers_add');
        Route::post('/teachers-store', [DashboardController::class, 'teachers_store'])->name('teachers_store');
        Route::get('/teachers-edit/{id}', [DashboardController::class, 'teachers_edit'])->name('teachers_edit');
        Route::post('/teachers-update', [DashboardController::class, 'teachers_update'])->name('teachers_update');


        // Course
        Route::resource('courses', CourseController::class);
        Route::get('courses/{course}/suspend', [CourseController::class, 'suspend'])->name('courses.suspend');
        Route::get('courses-category', [CourseController::class, 'category'])->name('admin.courses.category');

        // Reviews
        Route::resource('reviews', ReviewController::class);
        Route::get('reviews/{review}/suspend', [ReviewController::class, 'suspend'])->name('reviews.suspend');

        // Fees
        Route::resource('fees', FeesController::class);
        Route::get('fees/{fees}/status', [FeesController::class, 'status'])->name('fees.status');


        // Attendance
        Route::resource('attendance', AttendanceController::class);
        Route::get('attendance/{attendance}/status', [AttendanceController::class, 'status'])->name('attendance.status');
        Route::get('attendance/{attendance}/leave', [AttendanceController::class, 'leave'])->name('attendance.leave');
        Route::post('attendance/search-student', [AttendanceController::class, 'search_student'])->name('attendance.search_student');

        Route::get('attendance-detail', [AttendanceController::class, 'detail'])->name('attendance.detail');

        // Class
        Route::resource('batches', BatchController::class);
        Route::get('batches/{batche}/suspend', [BatchController::class, 'suspend'])->name('batches.suspend');

        // Quiz
        Route::resource('quiz', QuizController::class);
        Route::get('quizzes/{quiz}/suspend', [QuizController::class, 'suspend'])->name('quiz.suspend');
        Route::post('quizz-question-delete', [QuizController::class, 'delete_question'])->name('quiz.delete-question');
        Route::post('quizz-option-delete', [QuizController::class, 'delete_option'])->name('quiz.delete-option');
        Route::get('quizzes/{id}/results', [QuizController::class, 'results'])->name('quiz.results');
        Route::get('quizzes/{id}/result-detail', [QuizController::class, 'result_detail'])->name('quiz.result_detail');


        // Inquiries
        Route::get('inquiries', [DashboardController::class, 'inquiries'])->name('inquiries.list');

        // Inquiries
        Route::get('newsletters', [DashboardController::class, 'newsletters'])->name('newsletters.list');


        Route::get('/check_slug', [DashboardController::class, 'check_slug'])
            ->name('admin.check_slug');

        // Category
        Route::resource('categories', CategoryController::class);
        Route::get('/categories-suspend/{id}', [CategoryController::class, 'categories_suspend'])->name('categories.suspend');
        Route::post('/categories-update', [CategoryController::class, 'update_cat'])->name('categories.update_cat');

        // Settings
        Route::resource('settings', SettingController::class);

        // Blogs
        Route::resource('blogs', BlogController::class);
        Route::get('blogs-category', [BlogController::class, 'category'])->name('admin.blogs.category');
        Route::get('blogs/{blog}/suspend', [BlogController::class, 'suspend'])->name('blogs.suspend');



        Route::get('settings', [PageController::class, 'settings'])->name('settings');
        Route::post('submitSettings', [PageController::class, 'submitSettings'])->name('submitSettings');


        Route::view('/', 'admin.dashboard.index')->name('index');
        Route::view('dashboard-02', 'admin.dashboard.dashboard-02')->name('dashboard-02');
        Route::view('box-layout', 'admin.page-layout.box-layout')->name('box-layout');
        Route::view('layout-rtl', 'admin.page-layout.layout-rtl')->name('layout-rtl');
        Route::view('layout-dark', 'admin.page-layout.layout-dark')->name('layout-dark');
        Route::view('hide-on-scroll', 'admin.page-layout.hide-on-scroll')->name('hide-on-scroll');
        Route::view('footer-light', 'admin.page-layout.footer-light')->name('footer-light');
        Route::view('footer-dark', 'admin.page-layout.footer-dark')->name('footer-dark');
        Route::view('footer-fixed', 'admin.page-layout.footer-fixed')->name('footer-fixed');
        Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');
        Route::view('landing-page', 'admin.pages.landing-page')->name('landing-page');
        Route::view('400', 'admin.errors.400')->name('error-400');
        Route::view('401', 'admin.errors.401')->name('error-401');
        Route::view('403', 'admin.errors.403')->name('error-403');
        Route::view('404', 'admin.errors.404')->name('error-404');
        Route::view('500', 'admin.errors.500')->name('error-500');
        Route::view('503', 'admin.errors.503')->name('error-503');
        Route::view('compact-sidebar', 'admin.admin_unique_layouts.compact-sidebar'); //default //Dubai
        //Route::view('box-layout', 'admin.admin_unique_layouts.box-layout');    //default //New York //
        Route::view('dark-sidebar', 'admin.admin_unique_layouts.dark-sidebar');
        Route::view('default-body', 'admin.admin_unique_layouts.default-body');
        Route::view('compact-wrap', 'admin.admin_unique_layouts.compact-wrap');
        Route::view('enterprice-type', 'admin.admin_unique_layouts.enterprice-type');
        Route::view('compact-small', 'admin.admin_unique_layouts.compact-small');
        Route::view('advance-type', 'admin.admin_unique_layouts.advance-type');
        Route::view('material-layout', 'admin.admin_unique_layouts.material-layout');
        Route::view('color-sidebar', 'admin.admin_unique_layouts.color-sidebar');
        Route::view('material-icon', 'admin.admin_unique_layouts.material-icon');
        Route::view('modern-layout', 'admin.admin_unique_layouts.modern-layout');


        Route::get('admin_logout', [AuthController::class, 'adminlogout'])->name('admin_logout');
    });
});
