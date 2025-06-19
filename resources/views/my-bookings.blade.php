<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phòng đã đặt</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .booking-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 900px;
            text-align: center;
        }

        .booking-card h2 {
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        td {
            background-color: #fafafa;
            border-bottom: 1px solid #eee;
        }

        .btn {
            margin-top: 30px;
            padding: 10px 30px;
            background-color: #ff7e5f;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #eb5e40;
        }
    </style>
</head>
<body>
    <div class="booking-card">
        <h2>Danh Sách Phòng Đã Đặt</h2>

        @if ($bookings->isEmpty())
            <div class="alert alert-warning text-center">
                Bạn chưa đặt phòng nào.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Tên Khách</th>
                        <th>Room ID</th>
                        <th>Thành Phố</th>
                        <th>Ngày Nhận Phòng</th>
                        <th>Ngày Trả Phòng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->room_id }}</td>
                            <td>{{ $booking->city }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->checkin_date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->checkout_date)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('home') }}#trangchu" class="btn">Quay lại trang chủ</a>
    </div>
</body>
</html>
