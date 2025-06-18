<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfileCompletion
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Nếu chưa cập nhật thông tin thì bắt buộc chuyển hướng
        if ($user && !$user->profile_completed && !$request->is('setup-profile')) {
            return redirect()->route('profile.setup');
        }

        return $next($request);
    }
}
