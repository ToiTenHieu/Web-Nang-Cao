<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <title>Document</title>
</head>
<body>
<nav class="main-nav">
    <div class="logo">
        <img class="font" src="{{ asset('images/homestay.png') }}" alt="Sky Luxury Logo" />
        <a href= {{ route('home') }} class="logo-text">Happy </a>
    </div>
    <ul class="menu">
    <li><a href="{{ route('home') }}#trangchu">TRANG CHỦ</a></li>
    <li><a href="{{ route('home') }}#about-section">VỀ CHÚNG TÔI</a></li>
    <li><a href="{{ route('home') }}#slogan">PHÒNG NGHỈ</a></li>
    <li><a href="{{ route('home') }}#service-section">TIN TỨC</a></li>
    <li><a href="{{ route('home') }}#footer">Dịch Vụ</a></li>

    {{-- GÓI FORM TRONG <li> --}}
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="menu-link-button">Đăng xuất</button>
        </form>
    </li>
</ul>

</nav>

</body>
</html>