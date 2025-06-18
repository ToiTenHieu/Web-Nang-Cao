<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Admin\QuanlyController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\HomeController;

use App\Http\Middleware\CheckProfileCompletion;


/// ------------------ AUTH ROUTES ------------------ ///

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Forgot/Reset Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email Verification
Route::get('/email/verify', fn() => view('auth.verify-email'))->middleware('auth')->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Đã gửi lại email xác minh!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


/// ------------------ PROFILE SETUP ROUTES ------------------ ///

Route::middleware(['auth', 'verified'])->group(function () {
    // Hiển thị form cập nhật thông tin cá nhân
    Route::get('/profile/setup', [UserController::class, 'showProfileForm'])->name('profile.setup');

    // Lưu thông tin cá nhân
    Route::post('/profile/setup', [UserController::class, 'storeProfile'])->name('profile.store');

    // Trang thông tin cá nhân
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});


/// ------------------ REDIRECT AFTER LOGIN ------------------ ///

Route::get('/redirect-role', function () {
    $role = Auth::user()->role;
    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'user' => redirect()->route('home'),
        default => abort(403),
    };
})->middleware(['auth', 'verified']);


/// ------------------ ADMIN ROUTES ------------------ ///

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin'))->name('admin.dashboard');
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('admin.thongke');

    Route::get('/quanly', [QuanlyController::class, 'index'])->name('admin.quanly.index');
    Route::get('/quanly/them', [QuanlyController::class, 'create'])->name('admin.phong.create');
    Route::post('/quanly', [QuanlyController::class, 'store'])->name('admin.phong.store');
    Route::get('/quanly/{id}/edit', [QuanlyController::class, 'edit'])->name('admin.phong.edit');
    Route::put('/quanly/{id}', [QuanlyController::class, 'update'])->name('admin.phong.update');
    Route::delete('/quanly/{id}', [QuanlyController::class, 'destroy'])->name('admin.phong.destroy');
});


/// ------------------ USER ROUTES ------------------ ///

Route::middleware(['auth', 'verified', 'role:user', CheckProfileCompletion::class])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/rooms/{id}', [HomeController::class, 'show'])->name('rooms.detail');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/rooms/check-available', [HomeController::class, 'checkAvailableRooms'])->name('rooms.checkAvailable');

    Route::get('/booking', fn() => view('booking.index'))->name('booking.index');
    Route::get('/posts', fn() => view('posts.index'))->name('posts.index');
    Route::get('/rooms', fn() => view('rooms.index'))->name('rooms.index');
    Route::get('/settings', fn() => view('settings'))->name('settings');
});


/// ------------------ PUBLIC ROUTES ------------------ ///

Route::get('/phong/family', fn() => view('rooms.family'))->name('rooms.family');
