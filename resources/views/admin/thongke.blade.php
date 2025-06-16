@extends('admin')

@section('content')
    <h1 class="mb-4">📊 Trang thống kê</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Tổng số phòng</div>
                <div class="card-body">
                <h5 class="card-title">{{ $tongPhong }}</h5>

                    <p class="card-text">Phòng đang có trong hệ thống.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Đặt phòng hôm nay</div>
                <div class="card-body">
                <h5 class="card-title">{{ $soDatHomNay }}</h5>

                    <p class="card-text">Số lượt đặt phòng trong ngày.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Khách hiện tại</div>
                <div class="card-body">
                <h5 class="card-title">{{ $soKhachHienTai }}</h5>
                    <p class="card-text">Khách đang lưu trú tại khách sạn.</p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-5">🧍 Danh sách khách đang lưu trú</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách</th>
            <th>Phòng</th>
            <th>Thành phố</th>
            <th>Ngày nhận phòng</th>
            <th>Ngày trả phòng</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($khachHienTai as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->customer_name }}</td>
                <td>{{ $booking->room_id }}</td>
                <td>{{ $booking->city }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->checkin_date)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->checkout_date)->format('d/m/Y') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Không có khách đang lưu trú.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
