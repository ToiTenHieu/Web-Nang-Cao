<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{
    /**
     * Lưu đặt phòng.
     */
    public function store(Request $request)
    {
        $room_id = $request->input('room_id');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
    
        // Kiểm tra dữ liệu
        if (!$checkin || !$checkout || !$room_id) {
            return back()->with('error', 'Vui lòng chọn đầy đủ ngày nhận và ngày trả phòng.');
        }
    
        // Kiểm tra phòng có bị trùng thời gian không
        $isBooked = Booking::where('room_id', $room_id)
            ->where(function ($query) use ($checkin, $checkout) {
                $query->whereBetween('checkin_date', [$checkin, $checkout])
                    ->orWhereBetween('checkout_date', [$checkin, $checkout])
                    ->orWhere(function ($q) use ($checkin, $checkout) {
                        $q->where('checkin_date', '<=', $checkin)
                          ->where('checkout_date', '>=', $checkout);
                    });
            })->exists();
    
        if ($isBooked) {
            return back()->with('error', 'Phòng này đã được đặt trong khoảng thời gian bạn chọn. Vui lòng chọn ngày khác.');
        }
    
        // Nếu không trùng, tiến hành lưu
        Booking::create([
            'room_id' => $room_id,
            'user_id' => Auth::id(),
            'customer_name' => Auth::user()->name ?? 'Khách',
            'checkin_date' => $checkin,
            'checkout_date' => $checkout,
            'city' => $request->input('city') ?? '',
        ]);
        
    
        return back()->with('success', 'Đặt phòng thành công!');
    }
    
}
