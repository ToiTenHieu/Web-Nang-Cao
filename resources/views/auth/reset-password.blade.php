<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
</head>
<body>
    <div class="form-container">
        <h2>Đặt lại mật khẩu</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password" placeholder="Mật khẩu mới" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>

            <button type="submit">Cập nhật mật khẩu</button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Quay lại đăng nhập</a>
        </div>
    </div>
</body>
</html>
