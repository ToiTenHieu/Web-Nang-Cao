<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rooms')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Nội dung mô tả chung cho tất cả các phòng
        $description = <<<EOD
Giới thiệu về chỗ ở này
Đây là ký túc xá hỗn hợp 6 giường, nơi bạn có thể chia sẻ không gian với các du khách khác trong khi tận hưởng góc riêng của mình.

Mỗi giường được chuẩn bị chu đáo với rèm cửa, đèn đọc sách, tủ khóa, chăn, gối và khăn tắm, đảm bảo cả sự thoải mái và riêng tư. Ký túc xá được thiết kế để cung cấp một không gian chung ấm cúng, được trang bị đầy đủ tiện nghi trong khi vẫn mang đến cho bạn cảm giác nghỉ dưỡng cá nhân.

Ngoài ra, hãy tận hưởng một khu vực chung ở tầng trệt để ăn uống, giao lưu hoặc làm việc, cộng với bãi đỗ xe máy miễn phí.
Chỗ ở
Đây không phải là khách sạn hay nhà khách, chỉ là ngôi nhà nhỏ của tôi. Tôi muốn chia sẻ một không gian ấm cúng với tất cả các tiện nghi, nó vẫn có mọi thứ bạn cần cho một kỳ nghỉ thoải mái và giá cả phải chăng.

/Đây là phòng ngủ tập thể hỗn hợp với 6 giường, phù hợp với cả nam và nữ. Camera an ninh được lắp đặt trong nhà để đảm bảo sự an toàn của tất cả khách, mà không xâm phạm khu vực riêng của khách
/Bãi đỗ xe miễn phí trong khuôn viên.
/Khóa thông minh: mỗi khách được cung cấp một mật khẩu duy nhất cho khóa cửa.
/ Căn phòng nằm trên tầng hai của ngôi nhà, có thể đi bằng cầu thang.
/ Nhà vệ sinh: Chúng tôi có 3 khu vực nhà vệ sinh: Bên trong phòng, bên ngoài và ở tầng trệt.
/ Phòng khách: Nơi bạn có thể trò chuyện, ăn uống và tương tác với các khách khác.
/ Giặt LÀ: Dịch vụ giặt là có sẵn với giá 30k/kg.
/ Internet: Tận hưởng Wi-fi miễn phí ở mọi nơi trong nhà.
/ An toàn: Để đảm bảo sự tiện lợi và an toàn cho tất cả các khách, chúng tôi đã lắp đặt hệ thống camera trong nhà để tránh các sự cố khó chịu.
/ Vệ sinh: Chúng tôi vệ sinh hàng ngày và thay ga trải giường hàng tuần cho khách ở dài hạn.
Tiện nghi khách có quyền sử dụng
/ Rèm cửa - Sự riêng tư của bạn.
/Đèn đọc sách - Đèn cho sách.
/ Móc treo quần áo - Dành cho quần áo.
/ Tủ khóa - Bảo vệ đồ đạc của bạn.
/ Đồ dùng thiết yếu cho phòng tắm - Dầu gội đầu và Sữa tắm
/ Không gian làm việc - Nói chuyện, ăn uống.
/ Máy sấy tóc
/ Bàn là (theo yêu cầu)
Những điều cần lưu ý khác
/ Chúng tôi đề nghị không hút thuốc, hút thuốc lá điện tử hoặc sử dụng cỏ dại và chất kích thích trong khuôn viên

/ Thời gian nghỉ ngơi của điều hòa: từ 11 giờ sáng đến 2 giờ chiều.

/ Chúng tôi có 3 khu vực nhà vệ sinh (1 bên trong phòng - 2 bên ngoài phòng). Sau 10 giờ đêm, vui lòng sử dụng nhà vệ sinh bên ngoài để tránh làm phiền các khách khác ở chung phòng.

/ Đối với khách trả phòng sau 9 giờ tối (vui lòng đóng gói đồ đạc của bạn trước 9 giờ tối).

/ Vì một số lý do nhạy cảm và không muốn có mùi hôi trong phòng tắm, chúng tôi vui lòng yêu cầu không sử dụng giấy vệ sinh trong nhà vệ sinh, thay vào đó, vui lòng sử dụng bình xịt chậu tiểu. Cảm ơn sự thông cảm của bạn.
EOD;

        DB::table('rooms')->insert([
            ['name' => 'DELUXE SKY', 'city' => 'Hanoi', 'price' => 500000, 'image_path' => 'images/home1.jpg', 'describe' => $description],
            ['name' => 'FAMILY', 'city' => 'Hanoi', 'price' => 400000, 'image_path' => 'images/home2.jpg', 'describe' => $description],
            ['name' => 'SWEET', 'city' => 'Hanoi', 'price' => 800000, 'image_path' => 'images/home3.jpg', 'describe' => $description],
            ['name' => 'FAMILY DELUXE', 'city' => 'HCM', 'price' => 600000, 'image_path' => 'images/home4.jpg', 'describe' => $description],
            ['name' => 'FAMILY OCEAN', 'city' => 'HCM', 'price' => 750000, 'image_path' => 'images/home5.jpg', 'describe' => $description],
            ['name' => 'DELUXE', 'city' => 'HCM', 'price' => 550000, 'image_path' => 'images/home6.jpg', 'describe' => $description],
            ['name' => 'DELUXE CITY', 'city' => 'DaNang', 'price' => 470000, 'image_path' => 'images/home7.jpg', 'describe' => $description],
            ['name' => 'FAMILY GARDEN', 'city' => 'DaNang', 'price' => 580000, 'image_path' => 'images/home8.jpg', 'describe' => $description],
            ['name' => 'GOLD SKY', 'city' => 'DaNang', 'price' => 520000, 'image_path' => 'images/home9.jpg', 'describe' => $description],
            ['name' => 'GOLD', 'city' => 'NhaTrang', 'price' => 500000, 'image_path' => 'images/home10.jpg', 'describe' => $description],
            ['name' => 'GOLD FAMILY', 'city' => 'NhaTrang', 'price' => 650000, 'image_path' => 'images/home11.jpg', 'describe' => $description],
            ['name' => 'GOLD DELUXE', 'city' => 'NhaTrang', 'price' => 700000, 'image_path' => 'images/home12.jpg', 'describe' => $description],
            ['name' => 'GOLD GARDEN', 'city' => 'DaLat', 'price' => 560000, 'image_path' => 'images/home13.jpg', 'describe' => $description],
            ['name' => 'GOLD OCEAN', 'city' => 'DaLat', 'price' => 720000, 'image_path' => 'images/home14.jpg', 'describe' => $description],
            ['name' => 'GOLD SWEET', 'city' => 'DaLat', 'price' => 800000, 'image_path' => 'images/home15.jpg', 'describe' => $description],
        ]);
    }
}
