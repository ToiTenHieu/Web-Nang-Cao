<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin cá nhân</title>
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
            padding-bottom: 50px;
        }
        .profile-card h2 {
            margin-bottom: 30px;
            color: #333;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            margin-top: 15px;
            color: #333;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px 15px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fafafa;
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
    <h2>Chỉnh sửa thông tin cá nhân</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <label for="name">Họ tên</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">

        <label for="dob">Ngày sinh</label>
        <input type="date" name="dob" id="dob" value="{{ old('dob', $user->dob) }}">

        <label for="address">Địa chỉ</label>
        <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}">

        <label for="phone">Số điện thoại</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">

        <button type="submit" class="btn">Cập nhật</button>
        <a href="{{ route('home') }}#trangchu" class="btn">Quay lại</a>
    </form>
</div>
</body>
</html>
