<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

// Reset password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

     Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

use App\Http\Controllers\Auth\VerifyEmailController;


Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware([ 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Đã gửi lại email xác minh!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/dashboard'); // Hoặc trang khác sau xác minh
// })->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/admin', function () {
    return view('admin'); // Đây là trang chính admin
})->name('admin.dashboard');


// Route cho phòng Family
Route::get('/phong/family', function () {
    return view('rooms.family');
})->name('rooms.family');
Route::get('/admin', function () {
    return view('Admin'); // Đây là trang chính admin
})->name('admin.dashboard');



use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\QuanlyController;

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke');



// Hiển thị danh sách phòng
Route::get('/quanly', [QuanlyController::class, 'index'])->name('quanly.index');

// Form thêm phòng
Route::get('/quanly/them', [QuanlyController::class, 'create'])->name('phong.create');

// Lưu phòng mới
Route::post('/quanly', [QuanlyController::class, 'store'])->name('phong.store');

// Form sửa phòng
Route::get('/quanly/{id}/edit', [QuanlyController::class, 'edit'])->name('phong.edit');

// Cập nhật thông tin phòng
Route::put('/quanly/{id}', [QuanlyController::class, 'update'])->name('phong.update');

// Xóa phòng
Route::delete('/quanly/{id}', [QuanlyController::class, 'destroy'])->name('phong.destroy');


// Tạm thời cho các route menu khác:
Route::get('/booking', fn() => view('booking.index'))->name('booking.index');
Route::get('/posts', fn() => view('posts.index'))->name('posts.index');
Route::get('/rooms', fn() => view('rooms.index'))->name('rooms.index');
Route::get('/settings', fn() => view('settings'))->name('settings');
Route::get('/logout', fn() => redirect('/login'))->name('logout');
use App\Http\Controllers\HomeController;
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/rooms/{id}', [HomeController::class, 'show'])->name('rooms.detail');

use App\Http\Controllers\BookingController;
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');


Route::post('/rooms/check-available', [HomeController::class, 'checkAvailableRooms'])->name('rooms.checkAvailable');


