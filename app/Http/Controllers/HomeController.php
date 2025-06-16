<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Booking;


class HomeController extends Controller
{
    // Trang chủ - hiển thị các phòng chia theo thành phố
    public function index()
    {
        // Lấy tất cả phòng có đầy đủ dữ liệu (image_path không null)
        $rooms = Room::whereNotNull('image_path')->get();

        // Truyền dữ liệu sang view
        return view('home', compact('rooms'));
    }

    // Trang chi tiết 1 phòng cụ thể theo ID


    public function show($id)
    {
        // Lấy phòng theo id, kèm ảnh
        $room = Room::with('images')->findOrFail($id);

        return view('rooms.detail', compact('room'));
    }
    public function checkAvailableRooms(Request $request)
    {
        $checkin = Carbon::parse($request->input('checkin_date'))->toDateString();
        $checkout = Carbon::parse($request->input('checkout_date'))->toDateString();

        // Lấy dữ liệu từ form hoặc request
        $city = $request->input('city');
        $checkin = $request->input('checkin_date');
        $checkout = $request->input('checkout_date');

        // Validate dữ liệu đơn giản (bạn có thể thêm rules kỹ hơn)
        if (!$city || !$checkin || !$checkout) {
            return back()->with('error', 'Vui lòng nhập đầy đủ thông tin.');
        }

        // Lấy các phòng cùng thành phố
        $rooms = Room::where('city', $city)->get();

        // Lọc ra phòng trống (không có booking nào trùng hoặc chồng ngày)
        $availableRooms = $rooms->filter(function($room) use ($checkin, $checkout) {
            $conflict = Booking::where('room_id', $room->id)
                ->where(function($query) use ($checkin, $checkout) {
                    $query->whereBetween('checkin_date', [$checkin, $checkout])
                          ->orWhereBetween('checkout_date', [$checkin, $checkout])
                          ->orWhere(function($q) use ($checkin, $checkout) {
                              $q->where('checkin_date', '<=', $checkin)
                                ->where('checkout_date', '>=', $checkout);
                          });
                })->exists();
            return !$conflict;
        });
        

        // Trả về view với danh sách phòng trống
        return view('rooms.available', ['rooms' => $availableRooms]);
    }
}
