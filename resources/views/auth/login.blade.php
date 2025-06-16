<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Happy </title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
  <div class="left-panel">
    <div class="swiper-container" id="swiper1">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/1.avif" alt="1" /></div>
        <div class="swiper-slide"><img src="img/2.avif" alt="2" /></div>
        <div class="swiper-slide"><img src="img/3.avif" alt="3" /></div>
        <div class="swiper-slide"><img src="img/4.avif" alt="4" /></div>
        <div class="swiper-slide"><img src="img/5.avif" alt="5" /></div>
        <div class="swiper-slide"><img src="img/6.avif" alt="6" /></div>
        <div class="swiper-slide"><img src="img/7.avif" alt="7" /></div>
        <div class="swiper-slide"><img src="img/8.avif" alt="8" /></div>
      </div>
    </div>
    <div class="swiper-container reverse" id="swiper2">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/a.avif" alt="a" /></div>
        <div class="swiper-slide"><img src="img/b.avif" alt="b" /></div>
        <div class="swiper-slide"><img src="img/c.avif" alt="c" /></div>
        <div class="swiper-slide"><img src="img/d.avif" alt="d" /></div>
        <div class="swiper-slide"><img src="img/e.avif" alt="e" /></div>
        <div class="swiper-slide"><img src="img/f.avif" alt="f" /></div>
        <div class="swiper-slide"><img src="img/g.avif" alt="g" /></div>
        <div class="swiper-slide"><img src="img/h.avif" alt="h" /></div>
      </div>
    </div>
    <div class="swiper-container" id="swiper3">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/11.avif" alt="11" /></div>
        <div class="swiper-slide"><img src="img/12.avif" alt="12" /></div>
        <div class="swiper-slide"><img src="img/13.avif" alt="13" /></div>
        <div class="swiper-slide"><img src="img/14.avif" alt="14" /></div>
        <div class="swiper-slide"><img src="img/15.avif" alt="15" /></div>
        <div class="swiper-slide"><img src="img/16.avif" alt="16" /></div>
        <div class="swiper-slide"><img src="img/17.avif" alt="17" /></div>
        <div class="swiper-slide"><img src="img/18.avif" alt="18" /></div>
      </div>
    </div>
  </div>
  <div class="right-panel">
    <div class="login-box">
      <h1 class="logo-name" style="font-family: 'Georgia', serif; font-size: 48px; color: #007bff;">Happy</h1>
      <h3>Chào mừng đến với Happy</h3>
      <p>Mỗi hành trình là một câu chuyện<br>Hãy bắt đầu với chốn dừng chân tuyệt vời.</p>
      <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
      <div class="mb-3">  
        <input
          type="email"
          id="email"
          name="email"
          class="form-control @error('email') is-invalid @enderror"
          placeholder="Email"
          value="{{ old('email') }}"
        />
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>

      <div class="mb-3">
        <input
          type="password"
          id="password"
          name="password"
          class="form-control @error('password') is-invalid @enderror"
          placeholder="Mật khẩu"
    />
    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3 form-check d-flex align-items-center">
    <input type="checkbox" class="form-check-input me-2" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">Nhớ đăng nhập</label>
  </div>


  <button type="submit" class="btn btn-primary w-100 mb-3">Đăng nhập</button>

  <a href="{{ route('password.request') }}"><small>Quên mật khẩu</small></a>

  <p class="text-muted mt-3"><small>Bạn chưa có tài khoản?</small></p>

  <a class="btn btn-sm btn-outline-primary w-100" href="{{ route('register') }}">Tạo tài khoản</a>
  </form>
    @if ($errors->has('login'))
    <div class="alert alert-danger mt-2">
      {{ $errors->first('login') }}
    </div>
    @endif

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
