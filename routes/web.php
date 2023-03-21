<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\InvestController;
use App\Http\Controllers\ImageVideoController;
use App\Http\Controllers\NavChartController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::get('/tuyen-dung', [RecruitmentController::class, 'index'])->name('recruitment');
Route::post('user/register', [RecruitmentController::class, 'store'])->name('user.register.store');
Route::put('tuyen-dung/chinh-sua/{id}', [RecruitmentController::class, 'update'])->name('recruitment.update');
Route::get('user/register', [RecruitmentController::class, 'create'])->name('user.register.create');
Route::get('/tuyen-dung/{id}/edit', [RecruitmentController::class, 'edit'])->name('recruitment.edit');
Route::get('tuyen-dung/{slug}', [RecruitmentController::class, 'show'])->name('recruitment.show');

Route::get('/login', [UserLoginController::class, 'index'])->name('user.login');
Route::post('/auth/login', [UserLoginController::class, 'login'])->name('auth.login');
Route::post('/register', [UserLoginController::class, 'store'])->name('register.store');
Route::get('/register', [UserLoginController::class, 'create'])->name('register.create');

Route::middleware('front')->group(function() {
    Route::get('/welcome', function () {
        return view('frontend.user.welcome');
    })->name('welcome');
    Route::get('/danh-sach-nhan-su', [ManagementController::class, 'index'])->name('manage.index');
    Route::post('/nhan-su', [ManagementController::class, 'store'])->name('manage.store');
    Route::put('nhan-su/chinh-sua/{id}', [ManagementController::class, 'update'])->name('manage.update');
    Route::get('nhan-su/create', [ManagementController::class, 'create'])->name('manage.create');
    Route::get('/nhan-su/{id}/edit', [ManagementController::class, 'edit'])->name('manage.edit');
    Route::get('nhan-su', [ManagementController::class, 'show'])->name('manage.show');

    Route::get('/gioi-thieu', [IntroduceController::class, 'index'])->name('introduce.index');
    Route::get('/phuong-phap-dau-tu', [InvestController::class, 'index'])->name('invest.index');

    Route::get('/hoat-dong-doan-the', [ImageVideoController::class, 'index'])->name('activities.index');
    Route::get('/video', [ImageVideoController::class, 'video'])->name('activities.video');
    Route::get('/thong-bao', [ImageVideoController::class, 'notice'])->name('activities.notice');
    Route::post('/hoat-dong-doan-the', [ImageVideoController::class, 'store'])->name('activities.store');
    Route::put('/hoat-dong-doan-the/chinh-sua/{id}', [ImageVideoController::class, 'update'])->name('activities.update');
    Route::get('/hoat-dong-doan-the/create', [ImageVideoController::class, 'create'])->name('activities.create');
    Route::get('/hoat-dong-doan-the/{id}/edit', [ImageVideoController::class, 'edit'])->name('activities.edit');
    Route::get('/hoat-dong-doan-the/{id}/{slug}', [ImageVideoController::class, 'show'])->name('activities.show');
    Route::get('/thong-bao/{id}/{slug}', [ImageVideoController::class, 'showNotice'])->name('notice.show');

    Route::get('/hieu-qua-dau-tu', [NavChartController::class, 'index'])->name('chart');

    Route::get('/bao-cao-chung', [ReportController::class, 'index'])->name('report');

    Route::get('high-chart', [HighChartController::class, 'index']);

});

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);
});

Route::middleware('admin')->group(function() {
    
});
