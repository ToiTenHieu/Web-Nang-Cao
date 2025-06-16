<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    // Trang thống kê
    public function index()
    {
        $khachHienTai = DB::table('bookings')
    ->whereDate('checkin_date', '<=', Carbon::today())
    ->whereDate('checkout_date', '>', Carbon::today())
    ->get();

        // Đếm tổng số phòng
    $tongPhong = DB::table('rooms')->count();

    // Đếm số lượt đặt phòng hôm nay
    $soDatHomNay = DB::table('bookings')
        ->whereDate('created_at', Carbon::today())
        ->count();

    // Đếm số khách hiện tại đang lưu trú
    $soKhachHienTai = DB::table('bookings')
        ->whereDate('checkin_date', '<=', Carbon::today())
        ->whereDate('checkout_date', '>', Carbon::today())
        ->count();

        return view('admin.thongke', compact(
            'tongPhong',
            'soDatHomNay',
            'soKhachHienTai',
            'khachHienTai'
        ));
        
    }
}
