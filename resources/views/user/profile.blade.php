@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thông tin cá nhân</h2>
    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Họ tên:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $user->phone ?? 'Chưa có' }}</li>
        <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $user->address ?? 'Chưa có' }}</li>
        <li class="list-group-item"><strong>Ngày sinh:</strong> {{ $user->dob ? $user->dob->format('d/m/Y') : 'Chưa có' }}</li>
    </ul>

    <h3>Lịch sử đặt phòng</h3>
    @if($bookings->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Phòng</th>
                    <th>Từ ngày</th>
                    <th>Đến ngày</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($booking->status ?? 'Chờ xử lý') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Bạn chưa đặt phòng nào.</p>
    @endif
</div>
@endsection
