<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }



public function login(LoginRequest $request): RedirectResponse
{
    if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        $request->session()->regenerate();

        /** @var User $user */
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Bạn cần xác minh email trước khi đăng nhập.',
            ]);
        }

        // 👉 Chuyển hướng dựa theo vai trò
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('home');
        }

        // Nếu role không hợp lệ
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Không xác định quyền truy cập.',
        ]);
    }

    return back()->withErrors([
        'email' => 'Thông tin đăng nhập không chính xác.',
    ])->withInput();
}
    protected function authenticated(Request $request, $user)
{
    return redirect()->route('redirect.role');
}

}
