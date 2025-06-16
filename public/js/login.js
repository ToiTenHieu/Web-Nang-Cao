// Cấu hình Swiper
const commonConfig = {
  direction: 'vertical',
  slidesPerView: 3,
  spaceBetween: 10,
  loop: true,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  speed: 5000,
  allowTouchMove: false,
};

new Swiper('#swiper1', commonConfig);
new Swiper('#swiper2', commonConfig);
new Swiper('#swiper3', commonConfig);

// Xử lý form đăng nhập
document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');
  if (!loginForm) return;

  loginForm.addEventListener('submit', function (e) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorBox = document.getElementById('formErrors');

    let errors = [];

    if (!email) {
      errors.push("Vui lòng nhập email.");
    }

    if (!password) {
      errors.push("Vui lòng nhập mật khẩu.");
    }

    if (errors.length > 0) {
      e.preventDefault(); // Ngăn form gửi đi
      errorBox.innerHTML = errors.join("<br>");
      errorBox.style.display = "block";
    } else {
      errorBox.style.display = "none"; // Ẩn nếu không có lỗi
    }
  });
});
