<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Happy</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>

<body>

    @include('layouts.header')

    <div class="header-bg" id="trangchu">
        <div class="topbar">
            <div class="topba">
                <span>
                    <i class="fas fa-map-marker-alt" style="color: black; margin-right: 5px;"></i>
                    hej hej
                </span>

                <span>📞 0396984248</span>
            </div>

            <div class="user">
            <a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>

                
                <div class="language-wrapper">
                    
                </div>
            </div>
        </div>
        <div class="hero-section">
            <h1 class="hero-title">Tận hưởng trải nghiệm sang trọng</h1>
            <p class="hero-subtitle">— TRẢI NGHIỆM VỚI CHÚNG TÔI —</p>
        </div>

        <!-- Booking form -->
        <form method="POST" action="{{ route('rooms.checkAvailable') }}">
    @csrf
    <div class="booking-form">
        <div class="booking-field">
            <label>NGÀY ĐẾN</label>
            <input type="text" id="checkin-date" name="checkin_date" placeholder="Chọn ngày đến" required>
        </div>
        <div class="booking-field">
            <label>NGÀY ĐI</label>
            <input type="text" id="checkout-date" name="checkout_date" placeholder="Chọn ngày đi" required>
          
        </div>
        <div class="booking-field">
            <label>THÀNH PHỐ</label>
            <select name="city" required>
                <option value="">Chọn thành phố</option>
                <option value="Hanoi">Hà Nội</option>
                <option value="HCM">TP. Hồ Chí Minh</option>
                <option value="DaNang">Đà Nẵng</option>
                <option value="NhaTrang">Nha Trang</option>
                <option value="DaLat">Đà Lạt</option>
            </select>
        </div>
        <div class="booking-button" >
            <button type="submit">KIỂM TRA PHÒNG TRỐNG</button>
        </div>
    </div>
</form>

    </div>
    <div class="slogan" id="slogan">
        <h1>Thông tin phòng nghỉ</h1>
        <img class="fontt" src="{{ asset('images/trangtri.png') }}" />
        <h2>Không gian nghỉ dưỡng đẳng cấp,<br> nơi từng chi tiết được chăm chút để tôn vinh sự tinh tế và riêng tư của bạn.</h2>
    </div>
    <h1>Thông tin phòng nghỉ tại Hà Nội ></h1>
    <div class="room-container">
        @foreach ($rooms->where('city', 'Hanoi') as $room)
        @if ($room && $room->image_path)
        <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
            <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
            <div class="room-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>
    <h1>Thông tin phòng nghỉ tại Hồ Chí Minh ></h1>
    <div class="room-container">
        @foreach ($rooms->where('city', 'HCM') as $room)
        @if ($room && $room->image_path)
        <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
            <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
            <div class="room-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>
    <h1>Thông tin phòng nghỉ tại Đà Nẵng > </h1>
    <div class="room-container">
        @foreach ($rooms->where('city', 'DaNang') as $room)
        @if ($room && $room->image_path)
        <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
            <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
            <div class="room-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>
    <h1>Thông tin phòng nghỉ tại Nha Trang ></h1>
    <div class="room-container">
        @foreach ($rooms->where('city', 'NhaTrang') as $room)
        @if ($room && $room->image_path)
        <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
            <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
            <div class="room-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>
    <h1>Thông tin phòng nghỉ tại Đà Lạt ></h1>
    <div class="room-container">
        @foreach ($rooms->where('city', 'DaLat') as $room)
        @if ($room && $room->image_path)
        <a href="{{ route('rooms.detail', $room->id) }}" class="room-card">
            <img src="{{ asset($room->image_path) }}" alt="Phòng {{ $room->name }}" />
            <div class="room-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ number_format($room->price, 0, ',', '.') }}đ / NGÀY</p>
            </div>
        </a>
        @endif
        @endforeach
    </div>



    <div class="about-section" id="about-section">
        <div class="about-text">
            <h2>Về chúng tôi</h2>
            <hr>
            <p>
                Muối tồn tại ở mọi nơi trên Trái đất và muối từ biển chiếm tỷ lệ lớn nhất. Thương hiệu Sky Luxury Hotel & Resort được lấy cảm hứng từ những hạt muối biển tinh khiết và giá trị bất tận của nó trong bề dày lịch sử của nhân loại. Từ xưa, muối là mặt hàng đầu tiên dùng để trao đổi thực phẩm và trở thành phương thức tiền tệ quan trọng trong cuộc sống của người dân thời đó.
            </p>
            <p>
                Hầu hết mọi người đều nghĩ rằng muối đơn giản chỉ là gia vị trong hầu hết các bữa ăn, nhưng không thể phủ nhận, muối là một phần thiết yếu trong cuộc sống không chỉ của con người mà cả thiên nhiên. Muối được xem là một trong những phương pháp hiệu quả nhất và được sử dụng rộng rãi để bảo quản thực phẩm, trị liệu spa và chăm sóc sức khỏe. Ngày nay, một món quà từ muối là một biểu tượng của sự may mắn, phong phú, chân thành và hài hòa…
            </p>
            <button>Xem thêm</button>
        </div>

        <div class="about-images">
            <img class="img-main" src="{{ asset('images/resort1.jpg') }}" />
            <img class="img-middle" src="{{ asset('images/resort2.jpg') }}" />
            <img class="img-top" src="{{ asset('images/spa.jpg') }}" />

        </div>
    </div>
    <!-- Thêm Font Awesome vào <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <section class="service-section" id="service-section">
        <div class="service-item">
            <a href="/phong-nghi-lon">
                <i class="fas fa-bed"></i>
                <p>PHÒNG NGHỈ LỚN</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/view-bien">
                <i class="fas fa-water"></i>
                <p>VIEW BIỂN TỪ BAN CÔNG</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/spa">
                <i class="fas fa-spa"></i>
                <p>HỒ BƠI & SPA</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/wifi">
                <i class="fas fa-wifi"></i>
                <p>PHỦ SÓNG WIFI</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/dich-vu-mo-rong">
                <i class="fas fa-bell-concierge"></i>
                <p>DỊCH VỤ MỞ RỘNG</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/don-dep-hang-ngay">
                <i class="fas fa-broom"></i>
                <p>DỌN DẸP MỖI NGÀY</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/buffet-sang">
                <i class="fas fa-utensils"></i>
                <p>BUFFET BỮA SÁNG</p>
            </a>
        </div>
        <div class="service-item">
            <a href="/dua-don-san-bay">
                <i class="fas fa-taxi"></i>
                <p>ĐƯA ĐÓN TỪ SÂN BAY</p>
            </a>
        </div>
    </section>
    <section class="testimonial-section">
        <div class="testimonial-container">
            <button class="arrow left" onclick="prevSlide()">&#10094;</button>
            <button class="arrow right" onclick="nextSlide()">&#10095;</button>

            <!-- Slide 1 -->
            <div class="testimonial-slide active">
                <img src="{{ asset('images/beach.jpg') }}" alt="Ảnh khách hàng 1" class="testimonial-avatar" />
                <p class="testimonial-text">
                    “Đây là một nơi tuyệt vời ngay trên một bãi biển cát trắng yên tĩnh...”
                </p>
                <h3 class="testimonial-name">Phil Tritton</h3>
                <p class="testimonial-rating" data-rating="5"></p>
            </div>

            <!-- Slide 2 -->
            <div class="testimonial-slide">
                <img src="{{ asset('images/beach.jpg') }}" alt="Ảnh khách hàng 2" class="testimonial-avatar" />
                <p class="testimonial-text">
                    “Kỳ nghỉ ở đây thật sự tuyệt vời, cảnh biển đẹp và đồ ăn ngon...”
                </p>
                <h3 class="testimonial-name">Anna Nguyen</h3>
                <p class="testimonial-rating" data-rating="4.5"></p>
            </div>

            <!-- Slide 3 -->
            <div class="testimonial-slide">
                <img src="{{ asset('images/beach.jpg') }}" alt="Ảnh khách hàng 3" class="testimonial-avatar" />
                <p class="testimonial-text">
                    “Tôi sẽ quay lại đây lần nữa, mọi thứ đều trên cả mong đợi...”
                </p>
                <h3 class="testimonial-name">John Le</h3>
                <p class="testimonial-rating" data-rating="5"></p>
            </div>

            <!-- Navigation Dots -->
            <div class="testimonial-dots">
                <span class="dot active" onclick="showSlide(0)"></span>
                <span class="dot" onclick="showSlide(1)"></span>
                <span class="dot" onclick="showSlide(2)"></span>
            </div>

        </div>
    </section>
    <footer class="footer" id="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="{{ asset('images/homestay.png') }}" style="width: 200px; height: auto;" alt="Logo">
                <h2>Sky Luxury</h2>
                <p class="slogann">Happy</p>
            </div>
            <div class="footer-column">
                <h3>Về chúng tôi</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Hình ảnh</a></li>
                    <li><a href="#">Video</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Kết nối với chúng tôi</h3>
                <ul>
                    <li><a href="#">Liên hệ</a></li>
                    <li>Email: <a href=""></a>23010049@st.phenikaa-uni.edu.vnvn</li>
                    <li>Hotline: <a href="">0366567296</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>