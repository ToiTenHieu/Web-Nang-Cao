<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác minh Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
            <div class="text-center mb-4">
                <h2 class="text-primary">Xác minh Email</h2>
                <p class="text-muted">
                    Chúng tôi đã gửi một liên kết xác minh đến địa chỉ email của bạn.
                    <br>Vui lòng kiểm tra và nhấp vào liên kết để hoàn tất đăng ký.
                </p>
            </div>

            @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary w-100">Gửi lại email xác minh</button>
            </form>

            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-link text-danger">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
