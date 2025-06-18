<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    // Trang thống kê
    public function index()
    {
        $homNay = Carbon::today();
    
        // 1. Khách đang cư trú
        $khachDangCuTru = DB::table('bookings')
            ->whereDate('checkin_date', '<=', $homNay)
            ->whereDate('checkout_date', '>', $homNay)
            ->get();
    
        // 2. Khách đã đặt hôm nay nhưng chưa cư trú
        $khachDaDatHomNay = DB::table('bookings')
            ->whereDate('created_at', $homNay)
            ->whereDate('checkin_date', '>', $homNay)
            ->get();
    
        // Gộp 2 danh sách lại
        $khachHienTai = $khachDangCuTru->merge($khachDaDatHomNay);
    
        // Đếm tổng số phòng
        $tongPhong = DB::table('rooms')->count();
    
        // Đếm số lượt đặt phòng hôm nay
        $soDatHomNay = DB::table('bookings')
            ->whereDate('created_at', $homNay)
            ->count();
    
        // Tổng số khách gồm cả đang lưu trú và đã đặt hôm nay
        $soKhachHienTai = $khachHienTai->count();
    
        return view('admin.thongke', compact(
            'tongPhong',
            'soDatHomNay',
            'soKhachHienTai',
            'khachHienTai'
        ));
    }
    
}

