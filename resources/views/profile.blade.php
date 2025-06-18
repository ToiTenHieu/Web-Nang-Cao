<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
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

        .profile-card {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 500px;
            text-align: center;
        }

        .profile-card h2 {
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
            width: 40%;
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
    <div class="profile-card">
        <h2>Thông Tin Cá Nhân</h2>
        <table>
            <tr>
                <th>Họ tên</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td>{{ \Carbon\Carbon::parse($user->dob)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Nơi ở</th>
                <td>{{ $user->address }}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $user->phone }}</td>
            </tr>
        </table>
        <a href="{{ route('home') }}#trangchu" class="btn" >Quay lại trang chủ</a>
    </div>
</body>

</html>