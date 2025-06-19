<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use App\Models\Room; 

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

        return redirect()->route('home')->with('success', 'Cập nhật thông tin thành công');
    } else {
        return redirect()->back()->withErrors(['user' => 'Không tìm thấy người dùng.']);
    }

}

public function profile()
{
    $user = Auth::user();   

    $bookings = Booking::with('room')
                ->where('user_id', $user->id)
                ->latest()
                ->get();

    // Lấy danh sách tất cả phòng (hoặc chỉ phòng ở Hà Nội)
    $rooms = Room::all(); 

    return view('home', compact('user', 'bookings', 'rooms'));
}
public function index()
{
    // Chỉ lấy những user có role là 'user'
    $users = User::where('role', 'user')->get();

    return view('admin.index', compact('users'));
}
public function destroy($id)
{
    $user = User::findOrFail($id);

    // Không cho xoá admin nếu bạn muốn bảo vệ
    if ($user->role === 'admin') {
        return redirect()->back()->with('error', 'Không thể xoá admin!');
    }

    $user->delete();

    return redirect()->route('admin.nguoidung.index')->with('success', 'Đã xoá người dùng thành công.');
}

}