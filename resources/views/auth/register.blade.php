<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy - Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
<div class="register-box">
    <h1 class="logo-name">Happy</h1>
    <h3>Chào mừng bạn đến với Happy</h3>
    <p>Hãy tạo tài khoản để bắt đầu hành trình mới.</p>

    @if ($errors->any())
        <div class="alert alert-danger text-start">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3 text-start">
            <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="mb-3 text-start">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3 text-start">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
        </div>

        <div class="mb-3 text-start">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">Đăng ký </button>

        <p class="text-muted">Bạn đã có tài khoản?</p>
        <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">Đăng nhập</a>
    </form>
</div>

</body>
</html>
