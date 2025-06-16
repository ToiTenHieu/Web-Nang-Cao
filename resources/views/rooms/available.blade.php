<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Document</title>
</head>
<body>
@include('layouts.header')
    
<h2>Phòng trống</h2>

@if($rooms->isEmpty())
    <p>Không có phòng trống trong khoảng thời gian này.</p>
@else
    <div class="room-container">
        @foreach($rooms as $room)
            @if ($room && $room->image_path)
            <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
                <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
                <div class="room-info">
                    <h3>{{ $room->name }}</h3>
                    <p>{{ $room->city }} - {{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
                </div>
            </a>
            @endif
        @endforeach
    </div>
@endif

</body>
</html>