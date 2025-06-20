
## CSE702025-N02-Nhom-13
# HỆ THỐNG BOOKING HOMESTAY
# Thành viên nhóm
|       Tên         |    MSSV     |
|-------------------|-------------|
| Nguyễn Đăng Hiếu  |  23010049   |
| Nguyễn Trường Sơn |  23010313   |  
# 1. Bảng phân chia công việc chi tiết của các thành viên trong nhóm theo từng tuần

|       Họ và tên    |         Tuần 1     |     Tuần 2       |   Tuần 3 | Tuần 4| Tuần 5 | Tuần 6| Tuần 7| Tuần 8|
|-------------------|--------------------|------------------|----------|----|------|----|----|------|
| Nguyễn Đăng Hiếu  |  Phân công công việc  | vẽ use case | Thiết kế giao diện| Thiết lập CSDL| Lập trình kỹ năng cơ bản|Kiểm thử chức năng nhỏ| Hoàn thiện sản phẩm| Tổng hợp báo cáo|
| Nguyễn Trường Sơn |  Lập kế hoạch  | Phân tích yêu cầu | Thiết kế giao diện | Thiết lập cơ sở dữ liệu |Lập trình kỹ năng cơ bản|Hoàn thiện Backend kết nối frontend | Hoàn thiện sản phẩm|Chuẩn bị trình bày|

# 2. Mục tiêu và phạm vi của dự án
2.1. Mục tiêu của hệ thống

Dự án “Website Booking Homestay” được xây dựng với mục tiêu chính là tạo ra một nền tảng trực tuyến cho phép người dùng dễ dàng tìm kiếm, xem thông tin và đặt phòng homestay một cách tiện lợi, nhanh chóng và hiệu quả.

Ngoài ra, hệ thống còn hướng đến các mục tiêu cụ thể sau:
    •	Tăng tính minh bạch và rõ ràng trong việc hiển thị thông tin phòng, giá cả, vị trí, hình ảnh.
    •	Hỗ trợ quản trị viên quản lý phòng, đơn đặt và người dùng dễ dàng thông qua giao diện quản trị riêng.
    •	Tạo nền tảng phù hợp để phát triển thêm các chức năng nâng cao trong tương lai (thanh toán online, bản đồ,...).

2.2. Phạm vi của hệ thống

Dự án được phát triển trong phạm vi bài tập lớn môn Kỹ thuật phần mềm, thời gian thực hiện kéo dài trong 8 tuần, với đội ngũ phát triển gồm các thành viên trong nhóm sinh viên. Do đó, hệ thống sẽ được giới hạn với các chức năng cơ bản nhất, bao gồm:

Đối tượng sử dụng:

•	Người dùng (User):

o	Đăng ký / Đăng nhập tài khoản

o	Tìm kiếm homestay theo thành phố

o	Xem thông tin phòng: tên, hình ảnh, mô tả, giá

o	Đặt phòng

o	Đánh giá 

o	Quản lý danh sách đặt phòng

•	Quản trị viên (Admin):

o	Đăng nhập hệ thống quản trị

o	Quản lý thông tin homestay (thêm, sửa, xóa phòng)

o	Quản lý tài khoản người dùng 

o	Xem danh sách đơn đặt

Chức năng triển khai trong phiên bản đầu:

•	Quản lý người dùng và phân quyền cơ bản (User/Admin)

•	Tìm kiếm và lọc homestay theo khu vực (thành phố)

•	Hệ thống đặt phòng đơn giản (chưa tích hợp thanh toán online)

•	Quản lý phòng, đơn đặt và thông tin từ phía quản trị viên

Giới hạn phạm vi:

•	Chưa triển khai tính năng thanh toán trực tuyến

•	Chưa tích hợp bản đồ phòng hoặc phản hồi người dùng

•	Chưa tối ưu cho giao diện mobile (chỉ hỗ trợ trình duyệt máy tính)

3. Phân tích yêu cầu
   
3.1. Đặt vấn đề bài toán

Trong bối cảnh du lịch ngày càng phát triển, nhu cầu tìm kiếm và đặt phòng homestay trực tuyến trở nên phổ biến và cần thiết hơn bao giờ hết. Tuy nhiên, nhiều người dùng vẫn gặp khó khăn trong việc tìm kiếm thông tin phòng chính xác, cập nhật nhanh chóng và đặt phòng thuận tiện. Đồng thời, phía quản lý homestay cũng cần một công cụ để dễ dàng theo dõi, cập nhật thông tin phòng và xử lý các đơn đặt của khách hàng.
Do đó, nhóm xây dựng hệ thống Website Booking Homestay với mục tiêu tạo ra một nền tảng trung gian hỗ trợ:

•	Người dùng có thể tìm kiếm, xem thông tin và đặt phòng homestay một cách dễ dàng.

•	Quản trị viên có thể quản lý phòng, xử lý đơn đặt và theo dõi hoạt động người dùng.

Hệ thống được phát triển bằng công nghệ web, giao diện thân thiện, đáp ứng được các chức năng cơ bản của một nền tảng đặt phòng trực tuyến.

3.2 Tác nhân và người dùng

Trong hệ thống, có hai tác nhân chính

|STT	|Tác nhân|	Vai trò chính|
|-------|--------|---------|
|1|	Người dùng (User)	|Người truy cập website để tìm kiếm và đặt phòng homestay|
| 2	|Quản trị viên (Admin)	|Người quản lý hệ thống: phòng, người dùng, đơn đặt phòng|


3.3 Chức năng – Phân tích chức năng (theo tác nhân)
a) Chức năng của Người dùng (User)

|STT|	Tên chức năng	|Mô tả|
|---|------|-------|
|1|	Đăng ký tài khoản|	Người dùng có thể tạo tài khoản mới với email và mật khẩu.|
|2|	Đăng nhập|	Người dùng đăng nhập để truy cập các chức năng đặt phòng.|
|3|	Tìm kiếm homestay|	Tìm kiếm phòng theo thành phố hoặc từ khóa.|
|4	|Xem thông tin homestay	|Xem chi tiết ảnh, mô tả, giá, vị trí của từng homestay.|
|5|	Đặt phòng|	Chọn ngày và đặt phòng.|
|6	|Xem lịch sử đặt phòng|	Xem lại các đơn đặt phòng trước đó của mình.|
|7|	Đăng xuất|	Thoát khỏi tài khoản một cách an toàn.|

b) Chức năng của Quản trị viên (Admin)

|STT	|Tên chức năng|	Mô tả|
|----|------|-----|
|1|	Đăng nhập	|Admin đăng nhập vào hệ thống quản trị.|
|2|	Quản lý homestay	|Thêm, sửa, xóa thông tin homestay (tên, mô tả, giá, ảnh,...).|
|3|	Quản lý đơn đặt|	Xem danh sách đơn đặt|
|4|	Quản lý người dùng|	Xem và quản lý danh sách tài khoản người dùng (nếu có triển khai).|
|5|	Đăng xuất	|Thoát khỏi hệ thống quản trị.|



# 4. Công cụ, ngôn ngữ, công nghệ sử dụng
   
Để xây dựng hệ thống Website Booking Homestay một cách hiệu quả, nhóm đã lựa chọn các công cụ và công nghệ phù hợp với khả năng, điều kiện học tập và thời gian thực hiện của dự án. Cụ thể như sau:

4.1. Ngôn ngữ lập trình

•	PHP (Laravel Framework): Ngôn ngữ lập trình chính dùng cho phía backend. Laravel là framework PHP hiện đại, hỗ trợ MVC, bảo mật tốt, có sẵn các tính năng như routing, authentication, ORM (Eloquent) giúp tăng tốc độ phát triển và tổ chức code rõ ràng.

•	HTML/CSS: Dùng để xây dựng cấu trúc và định dạng giao diện người dùng.

•	JavaScript: Dùng để xử lý tương tác phía client (như xác thực biểu mẫu, hiệu ứng giao diện,...).

4.2. Cơ sở dữ liệu 

•	MySQL: Hệ quản trị cơ sở dữ liệu được sử dụng để lưu trữ dữ liệu người dùng, thông tin phòng homestay, đơn đặt phòng và các dữ liệu liên quan. Laravel hỗ trợ tích hợp trực tiếp với MySQL thông qua hệ thống migration và Eloquent ORM.

4.3. Framework & Thư viện hỗ trợ

•	Laravel (PHP): Là framework chính dùng để xây dựng ứng dụng web với cấu trúc rõ ràng, hỗ trợ routing, controller, middleware, validation, migrations, authentication,...

•	Bootstrap: Thư viện CSS giúp thiết kế giao diện nhanh chóng, phản hồi tốt trên nhiều loại màn hình, đặc biệt là giao diện responsive.

•	Eloquent ORM: Là công cụ quản lý truy vấn dữ liệu theo hướng đối tượng trong Laravel.

•	Swiper JS: Thư viện JavaScript nhẹ, hiện đại dùng để tạo slider (carousel) hiển thị ảnh phòng homestay theo kiểu trượt ngang. Hỗ trợ responsive, cảm ứng, hiệu ứng chuyển cảnh đẹp mắt, tương thích tốt với giao diện Bootstrap.

4.4. Công cụ hỗ trợ phát triển

|Công cụ|	Mục đích sử dụng|
|----|-----|
|XAMPP	|Giả lập môi trường máy chủ web (Apache + MySQL)|
|VS Code	|Trình soạn thảo mã nguồn chính|
|Git|	Quản lý mã nguồn và làm việc nhóm hiệu quả|
|GitHub|	Nơi lưu trữ mã nguồn dự án trên nền tảng cloud|

5. Phân tích và Thiết kế Hệ thống

|STT|	Mục |	Mô tả chức năng|
|---|---|-----|
|5.1|	Biểu đồ Use Case + mô tả|	Mô hình Use Case cho cả User và Admin, mô tả từng chức năng|
|5.2|	Biểu đồ hoạt động (Activity Diagram)|	Vẽ và giải thích quy trình của 1 hành vi (ví dụ: Đặt phòng)|
|5.3	|Thiết kế hướng đối tượng (OOP)	|Mô tả cách bạn áp dụng OOP & MVC trong Laravel|
|5.4	|Data Flow Diagram (DFD)|	Vẽ sơ đồ luồng dữ liệu cấp 0 và cấp 1|
|5.5	Thiết kế cơ sở dữ liệu (ERD & mô tả)|	Các bảng, khóa chính/ngoại, mô hình ERD (Entity Relationship)|


5.1. Biểu đồ Use Case và mô tả

Tác nhân (Actors)
•	Người dùng (User): Truy cập hệ thống để tìm kiếm, xem và đặt phòng homestay.
•	Quản trị viên (Admin): Quản lý thông tin phòng, đơn đặt phòng và người dùng.




Các Use Case chính:
a) Use Case cho Người dùng (User)

|STT	|Use Case|	Mô tả chức năng|
|---|----|-----|
|1|	Đăng ký	|Người dùng tạo tài khoản mới bằng email, mật khẩu và thông tin cá nhân cơ bản.|
|2|	Đăng nhập|	Đăng nhập để truy cập các chức năng của hệ thống.|
|3|	Tìm kiếm homestay|	Tìm kiếm homestay theo thành phố, tên, hoặc khu vực.|
|4|	Xem thông tin chi tiết|	Xem chi tiết hình ảnh, mô tả, giá cả, tiện ích và đánh giá phòng.|
|5	|Đặt phòng	|Chọn homestay, nhập ngày check-in/check-out, gửi yêu cầu đặt phòng.|
|6|	Xem đơn đặt|	Xem danh sách các đơn đặt phòng đã thực hiện.|
|7	|Cập nhật thông tin cá nhân|	Chỉnh sửa thông tin như tên, ngày sinh, số điện thoại,...|
|8|	Đăng xuất	|Thoát khỏi hệ thống một cách an toàn.|

![](img/Picture1.png)

b) Use Case cho Quản trị viên (Admin)

|STT	|Use Case	|Mô tả chức năng|
|1|	Đăng nhập	|Truy cập hệ thống quản trị|
|2|	Quản lý homestay	|Thêm, sửa, xóa thông tin phòng|
|3|	Quản lý đơn đặt|	Xem, xác nhận, từ chối đơn đặt của người dùng|
|4	|Quản lý người dùng	|Xem danh sách user và hành vi đặt phòng (nếu có triển khai)|
|5|	Thống kê|	Thông kê dữ liệu |
|6	|Đăng xuất	|Thoát khỏi hệ thống admin|

![](img/Picture2.png)
 
Mô tả Use Case chi tiết:

a) Use Case: Tìm kiếm phòng

•	Tác nhân: Người dùng (User)

•	Mục tiêu: Cho phép người dùng tìm kiếm homestay theo thành phố, từ khóa

•	Tiền điều kiện: Người dùng đã đăng nhập

•	Luồng sự kiện chính:

1.	Người dùng truy cập giao diện trang chủ hoặc trang tìm kiếm.

2.	Người dùng chọn:

	Ngày nhận phòng (check in)

	Ngày trả phòng (check out)

	Thành phố cần đến

3.	Nhấn nút “Tìm kiếm”

4.	Hệ thống kiểm tra:

	Các phòng thuộc thành phố được chọn

	Phòng chưa bị đặt trùng trong khoảng thời gian đó

5.	Hệ thống hiển thị danh sách phòng còn trống phù hợp

•	Hậu điều kiện: Danh sách phòng được hiển thị, người dùng có thể chọn để xem chi tiết

![](img/Picture3.png)
 
b) Use Case: Đặt phòng


•	Tác nhân: Người dùng (User)

•	Mục tiêu: Cho phép đặt phòng homestay online

•	Tiền điều kiện: Người dùng đã đăng nhập và chọn được phòng

•	Luồng sự kiện chính:

1.	Người dùng nhấn “Đặt phòng” trong trang chi tiết

2.	Nhập ngày nhận – trả phòng

3.	Xác nhận đặt phòng

4.	Hệ thống lưu thông tin vào cơ sở dữ liệu

5.	Hiển thị thông báo đặt phòng thành công

•	Hậu điều kiện: Đơn đặt phòng mới được tạo trong hệ thống

![](img/Picture4.png)



c) Use Case: Cập nhật thông tin cá nhân

•	Tác nhân: Người dùng (User)

•	Mục tiêu: Cho phép người dùng cập nhật thông tin tài khoản

•	Tiền điều kiện: Người dùng đã đăng nhập

•	Luồng sự kiện chính:

1.	Người dùng vào mục “Tài khoản cá nhân”

2.	Nhấn “Cập nhật”

3.	Nhập các thông tin mới: họ tên, số điện thoại, ngày sinh

4.	Hệ thống kiểm tra và lưu lại thông tin mới

5.	Thông báo “Cập nhật thành công”

•	Hậu điều kiện: Dữ liệu cá nhân được cập nhật trên hệ thống

 
![](img/Picture5.png)



d) Use Case: Quản lý phòng

•	Tác nhân: Quản trị viên (Admin)

•	Mục tiêu: Cho phép admin thêm, sửa, xóa phòng homestay

•	Tiền điều kiện: Admin đã đăng nhập

•	Luồng sự kiện chính:

1.	Admin truy cập mục “Quản lý Homestay”

2.	Chọn hành động: Thêm mới / Sửa / Xóa phòng

3.	Nhập hoặc chỉnh sửa thông tin phòng

4.	Nhấn “Lưu” → hệ thống lưu thông tin

•	Hậu điều kiện: Dữ liệu homestay được cập nhật vào hệ thống


![](img/Picture6.png)



e) Use Case: Quản lý đơn đặt phòng

•	Tác nhân: Quản trị viên (Admin)

•	Mục tiêu: Xem danh sách các đơn đặt

•	Tiền điều kiện: Admin đã đăng nhập

•	Luồng sự kiện chính:

1.	Admin vào mục “Thống kê”

2.	Xem danh sách đơn đặt từ người dùng

•	Hậu điều kiện: Đơn đặt được xử lý, người dùng nhận được thông báo


f) Use Case: Quản lý người dùng

•	Tác nhân: Quản trị viên (Admin)

•	Mục tiêu: Xem danh sách người dùng, khóa/mở tài khoản (nếu có)

•	Tiền điều kiện: Admin đã đăng nhập

•	Luồng sự kiện chính:

1.	Admin vào mục “Quản lý người dùng”

2.	Hệ thống hiển thị danh sách người dùng đã đăng ký

3.	Admin có thể xem chi tiết, xóa hoặc khóa tài khoản người dùng

•	Hậu điều kiện: Dữ liệu người dùng được cập nhật theo thao tác của admin

g) Use Case: Xem thông tin chi tiết phòng

•	Tác nhân: Người dùng (User)

•	Mục tiêu: Xem thông tin chi tiết homestay như mô tả, hình ảnh, giá

•	Tiền điều kiện: Người dùng đã tìm được phòng trong danh sách kết quả

•	Luồng sự kiện chính:

1.	Người dùng chọn một phòng bất kỳ


2.	Hệ thống chuyển đến trang chi tiết

3.	Hiển thị thông tin: tên phòng, ảnh, mô tả, giá, tiện ích, vị trí,...

•	Hậu điều kiện: Người dùng có thể tiếp tục đặt phòng từ trang này




5.2. Biểu đồ hoạt động (Activity Diagram)

a) Chức năng tìm kiếm phòng

Tác nhân: Người dùng

Luồng chính:

1.	Người dùng truy cập trang tìm kiếm phòng.

2.	Người dùng chọn: 

o	Ngày nhận phòng

o	Ngày trả phòng  

o	Thành phố cần tìm.

3.	Nhấn nút Tìm kiếm.

4.	Hệ thống truy vấn cơ sở dữ liệu, tìm các phòng:

o	Thuộc thành phố đã chọn.

o	Không bị đặt trùng trong khoảng thời gian người dùng chọn.

5.	Nếu có kết quả, hệ thống hiển thị danh sách phòng phù hợp.

6.	Người dùng có thể chọn một phòng bất kỳ để xem chi tiết hoặc đặt phòng.

![](img/Picture7.png)

 

b) Chức năng đặt phòng

Tác nhân: Người dùng

Luồng chính:

1.	Người dùng đã đăng nhập và chọn được một phòng từ danh sách.

2.	Người dùng nhập thông tin đặt phòng:

o	Ngày nhận phòng.

o	Ngày trả phòng.

o	Số lượng người.

3.	Nhấn nút Xác nhận đặt phòng.

4.	Hệ thống kiểm tra:

o	Thông tin hợp lệ.

o	Phòng còn trống trong khoảng thời gian đã chọn.

5.	Nếu mọi thứ hợp lệ, hệ thống tạo bản ghi mới trong bảng bookings.

6.	Hiển thị thông báo: "Đặt phòng thành công" và chuyển hướng sang trang đơn đặt.


![](img/Picture8.png)
 

c) Chức năng: Cập nhật thông tin cá nhân


Tác nhân: Người dùng

Luồng chính:

1.	Người dùng đăng nhập hệ thống.

2.	Truy cập trang Thông tin cá nhân.

3.	Nhập các thông tin muốn thay đổi:

o	Tên, số điện thoại, địa chỉ,...

4.	Nhấn nút Cập nhật thông tin.

5.	Hệ thống kiểm tra tính hợp lệ của các trường 

6.	Nếu hợp lệ, hệ thống cập nhật thông tin trong cơ sở dữ liệu.

7.	Hiển thị thông báo: "Cập nhật thành công".

![](img/Picture9.png)




d) Quản lý phong

Tác nhân: Quản trị viên (Admin)

Luồng chính:

1.	Admin đăng nhập vào hệ thống quản trị.

2.	Truy cập trang Quản lý phòng.

3.	Từ danh sách phòng, Admin có thể:

o	Thêm phòng mới.

o	Sửa thông tin phòng có sẵn.

o	Xoá phòng không còn hoạt động.

4.	Với mỗi thao tác:

o	Admin nhập hoặc chỉnh sửa thông tin (tên phòng, mô tả, giá, ảnh,...).

o	Nhấn nút Lưu / Cập nhật / Xoá.

5.	Hệ thống xác thực dữ liệu (ví dụ: giá phải là số, không để trống tên,...).

6.	Cập nhật dữ liệu tương ứng trong cơ sở dữ liệu.

7.	Hiển thị thông báo: “Thao tác thành công”.


![](img/Picture10.png)



# 5.3 Thiết kế hướng đối tượng


![](img/Picture11.png)



5.4. Biểu đồ luồng dữ liệu (Data Flow Diagram)

DFD Level 0 (Context Diagram)

  Mô tả tổng quát:

Hệ thống Booking Homestay có 2 tác nhân chính:

•	Người dùng (User): tìm kiếm, xem phòng, đặt phòng, cập nhật thông tin cá nhân

•	Quản trị viên (Admin): quản lý phòng, đơn đặt, người dùng

Thành phần:

•	Tác nhân ngoài (External Entities):

o	Người dùng

o	Quản trị viên (Admin)

•	Hệ thống chính:

o	Hệ thống đặt phòng Homestay

•	Các kho dữ liệu (Data Stores):

o	D1: Thông tin người dùng

o	D2: Thông tin phòng

o	D3: Thông tin đơn đặt phòng

Luồng dữ liệu mô tả:

|Tác nhân|	Luồng vào hệ thống	|Luồng phản hồi từ hệ thống|
|----|-----|------|
|Người dùng	|- Tìm kiếm phòng- Đặt phòng- Cập nhật thông tin cá nhân|	- Danh sách phòng- Thông báo đặt phòng thành công- Xác nhận cập nhật thành công|

|Admin	|- Quản lý phòng- Quản lý đơn- Quản lý người dùng	|- Kết quả thao tác: thêm/sửa/xoá xác nhận|



DFD Level 1 – Chi tiết chức năng

Tiến trình xử lý chính:

|Mã tiến trình	|Tên tiến trình|	Mô tả chức năng chính|
|----|-----|------|
|P1	|Tìm kiếm phòng|	Nhận thông tin ngày đến/ngày đi/thành phố → lọc phòng còn trống|
|P2	|Đặt phòng	|Nhận thông tin đặt phòng từ người dùng → lưu đơn nếu hợp lệ|
|P3|	Cập nhật thông tin cá nhân	|Người dùng cập nhật email, tên, sđt,... → cập nhật CSDL|
|P4|	Quản lý phòng|	Admin thêm/sửa/xoá thông tin phòng → cập nhật bảng phòng|
|P5	|Quản lý đơn đặt phòng	|Admin duyệt/hủy đơn đặt → cập nhật trạng thái đơn đặt|


Chi tiết từng tiến trình (logic dữ liệu):

Tiến trình P1 – Tìm kiếm phòng

•	Luồng vào: 	

Người dùng nhập ngày đến, ngày đi, thành phố

•	Xử lý:

o	Kiểm tra dữ liệu đầu vào

o	Truy vấn bảng phòng D2, lọc những phòng còn trống

•	Luồng ra:

o	Trả về danh sách phòng phù hợp cho người dùng

Tiến trình P2 – Đặt phòng

•	Luồng vào:

Người dùng chọn phòng và nhập ngày đến, ngày đi, số người

•	Xử lý:

o	Kiểm tra dữ liệu và phòng có bị trùng lịch không

o	Nếu hợp lệ, lưu vào bảng D3: đơn đặt phòng

•	Luồng ra:

o	Thông báo đặt thành công / thất bại cho người dùng

Tiến trình P3 – Cập nhật thông tin cá nhân

•	Luồng vào:

Người dùng nhập dữ liệu cần cập nhật (tên, email, sđt, …)

•	Xử lý:

o	Kiểm tra hợp lệ

o	Cập nhật dữ liệu trong bảng D1: thông tin người dùng

•	Luồng ra:

o	Xác nhận cập nhật thành công



Tiến trình P4 – Quản lý phòng (Admin)

•	Luồng vào:

Admin thêm mới / sửa / xoá thông tin phòng

•	Xử lý:

o	Kiểm tra dữ liệu nhập

o	Thêm hoặc cập nhật bảng D2: phòng

•	Luồng ra:

o	Thông báo thành công hoặc lỗi cho admin



Tiến trình P5 – Quản lý đơn đặt (Admin)

•	Luồng vào:

Admin chọn đơn → xác nhận hoặc huỷ

•	Xử lý:

o	Cập nhật trạng thái đơn trong bảng D3

•	Luồng ra:

o	Trả về kết quả cập nhật trạng thái cho admin



 5.5. Thiết kế cơ sở dữ liệu (Database Design)
 
 Mô hình thực thể - liên kết (ERD)
 
 Các thực thể chính:
1
.	User (Người dùng)

2.	Room (Phòng)

3.	Booking (Đơn đặt phòng)

4.	City (Thành phố)

5.	Admin (quản lý)

 Các mối quan hệ:
|Mối quan hệ	|Mô tả|
|-----|------|
|User – Booking|	1 người dùng có thể tạo nhiều đơn đặt (1:N)|

|Room – Booking	|1 phòng có thể được đặt nhiều lần (1:N)|

|City – Room|	Mỗi phòng thuộc 1 thành phố (1:N)|

|Admin – Room / Booking / User|	Admin có quyền quản lý toàn bộ (N:M hoặc role-based)|



Dạng bảng mô tả ERD:

User

|Tên trường|	Kiểu dữ liệu	|Ràng buộc|
|---|----|----|
|id	|INT (PK)	|Tự tăng|
|name	|VARCHAR(100)|	NOT NULL|
|email	|VARCHAR(150)|	UNIQUE, NOT NULL|
|password	|VARCHAR(255)|	NOT NULL|
|phone	|VARCHAR(20)	|NULL|
|role	|ENUM(user, admin)	|Mặc định: 'user'|
|created_at|	TIMESTAMP|	Mặc định CURRENT_TIMESTAMP|



City

|Tên trường|	Kiểu dữ liệu|	Ràng buộc|
|---|---|----|
|id|	INT| (PK)|	Tự tăng|

|name	|VARCHAR(100)|	UNIQUE, NOT NULL|

Room

|Tên trường|	Kiểu dữ liệu|	Ràng buộc|
|--|---|----|
|id|	INT (PK)|	Tự tăng|
|name|	VARCHAR(100)|	NOT NULL|
|description	|TEXT|	NULL|
|price	|DECIMAL(10,2)|	NOT NULL|
|image_path	|VARCHAR(255)|	NULL|
|city_id	|INT (FK → City)	|NOT NULL|
|status|	BOOLEAN	TRUE = còn trống|
|created_at	|TIMESTAMP	|


Booking
|Tên trường|	Kiểu dữ liệu	|Ràng buộc|
|id|	INT (PK)	|Tự tăng|
|user_id	|INT (FK → User)	|NOT NULL|
|room_id	|INT (FK → Room)	|NOT NULL|
|check_in	|DATE	|NOT NULL|
|check_out|	DATE	|NOT NULL|
|total_price|	DECIMAL(10,2)	|Tính từ số đêm × giá phòng|


6.Đánh giá kết quả

6.1. Các chức năng đã hoàn thành

Nhóm đã hoàn thiện và triển khai thành công các chức năng chính sau:

•	Tìm kiếm phòng: theo thành phố, ngày đến và ngày đi.

•	Xem chi tiết phòng: hiển thị đầy đủ thông tin và ảnh phòng.

•	Đặt phòng: người dùng có thể chọn ngày, số người và gửi đơn đặt.

•	Quản lý thông tin cá nhân: cập nhật tên, địa chỉ, số điện thoại,...

•	Quản trị phòng (Admin): thêm, sửa, xóa thông tin phòng.

•	Quản lý đơn đặt (Admin): xem, duyệt hoặc huỷ đơn đặt phòng.

•	Phân quyền người dùng: tách biệt giao diện và quyền giữa người dùng và admin.



 6.2. Ưu điểm của hệ thống
•
Hệ thống sử dụng Laravel (MVC) giúp tách biệt rõ ràng giữa dữ liệu – xử lý – giao diện.

•	Giao diện người dùng đơn giản, dễ thao tác, logic luồng hợp lý.

•	Cấu trúc cơ sở dữ liệu chặt chẽ, đảm bảo quan hệ 1-N, N-N phù hợp với nghiệp vụ.

•	Phân quyền rõ ràng giữa User và Admin.

•	Code dễ mở rộng, chuẩn hoá theo PSR-4, dùng Eloquent ORM để quản lý dữ liệu hiệu quả.



6.3. Hạn chế hiện tại

•	Chưa có tích hợp cổng thanh toán online.

•	Chưa gửi được email thông báo khi đặt phòng thành công.

•	Giao diện chưa tối ưu cho thiết bị di động (responsive) hoàn chỉnh.

•	Chưa có tính năng lọc nâng cao (giá, tiện nghi, loại phòng...).

•	Bảo mật ở mức cơ bản, chưa có kiểm tra kỹ các lỗ hổng như XSS, SQLi.



6.4. Hướng phát triển tiếp theo

•	Tích hợp các phương thức thanh toán trực tuyến (Momo, VNPAY, PayPal...).

•	Bổ sung tính năng gửi email xác nhận khi đặt phòng thành công hoặc cập nhật hồ sơ.

•	Cải thiện giao diện thân thiện hơn, responsive hoàn toàn, thêm hiệu ứng động.

•	Phát triển hệ thống thống kê báo cáo dành cho admin (doanh thu, số lượng người dùng,...).

•	Tối ưu hệ thống với Redis, Memcached hoặc cache Laravel để tăng hiệu suất.

•	Viết unit test và bổ sung kiểm thử bảo mật tự động (Laravel Dusk, PHPUnit,...).



7. Kết luận



7.1. Tổng kết quá trình làm việc nhóm

Trong quá trình thực hiện dự án, nhóm đã cùng nhau lên kế hoạch, phân chia công việc hợp lý, phối hợp thực hiện từ giai đoạn phân tích yêu cầu, thiết kế hệ thống, 
xây dựng giao diện đến lập trình và kiểm thử. Mỗi thành viên đều tích cực đóng góp công sức và học hỏi lẫn nhau để hoàn thành sản phẩm đúng thời hạn.

7.2. Kết quả đạt được

Dự án đã hoàn thiện về mặt chức năng cơ bản và đáp ứng được mục tiêu ban đầu đề ra. Hệ thống hoạt động ổn định, đầy đủ các luồng nghiệp vụ cơ bản của một website đặt homestay. Giao diện thân thiện, dễ thao tác và dữ liệu được xử lý hiệu quả.

7.3. Kiến thức và kỹ năng rút ra

Qua quá trình thực hiện, nhóm đã rèn luyện và nâng cao các kỹ năng:

•	Phân tích và thiết kế phần mềm theo hướng đối tượng (UML, DFD, ERD,...).

•	Xây dựng hệ thống bằng framework Laravel, quản lý dữ liệu với Eloquent ORM.

•	Sử dụng MySQL để thiết kế và vận hành cơ sở dữ liệu.

•	Làm việc nhóm, phân chia công việc hợp lý và hỗ trợ lẫn nhau.

•	Làm báo cáo kỹ thuật và trình bày hệ thống một cách khoa học.



