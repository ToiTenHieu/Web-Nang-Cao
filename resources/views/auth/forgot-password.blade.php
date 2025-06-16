<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/forgot.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>
<body>
    <div class="form-container">
        <h2>Quên mật khẩu</h2>

        @if (session('status'))
            <div class="message">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Nhập email đã đăng ký" required>

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Gửi liên kết đặt lại mật khẩu</button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Quay lại trang đăng nhập</a>
        </div>
    </div>
</body>
</html>
