<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin cá nhân</title>
    <style>
        body {
            font-family: sans-serif;
            background: #fefefe;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 20px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .btn {
            margin-top: 25px;
            background-color: #ff7e5f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #eb5e40;
        }
    </style>
</head>
<body>
<div class="container">
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
    </form>
</div>
</body>
</html>