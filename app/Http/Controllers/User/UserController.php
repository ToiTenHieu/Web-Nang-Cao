<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;

class UserController extends Controller
{
    public function showProfileForm()
{
    return view('user.setup-profile');
}


public function storeProfile(Request $request)
{
    $request->validate([
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
    ]);

    $user = Auth::user();   
    /** @var \App\Models\User $user */
    if ($user) {
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->dob = $request->dob;
    $user->profile_completed = true;

    $user->save();

        return redirect()->route('user.profile')->with('success', 'Cập nhật thông tin thành công');
    } else {
        return redirect()->back()->withErrors(['user' => 'Không tìm thấy người dùng.']);
    }

}
public function profile()
{
    $user = Auth::user();   

    // Lấy các booking của user kèm phòng (nếu dùng quan hệ)
    $bookings = Booking::with('room') // cần định nghĩa quan hệ
                ->where('user_id', $user->id)
                ->latest()
                ->get();

    return view('users.profile', compact('user', 'bookings'));
}
}