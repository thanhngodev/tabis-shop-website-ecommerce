# tabis-ECommerce

## Hướng dẫn cài đặt

1. Tải và cài đặt [xampp](https://www.apachefriends.org/download.html)
2. Clone project về máy
3. Copy thư mục vừa clone về vào [Ổ đĩa cài xampp]/xampp/htdocs/
4. Mở xampp và start 2 service Apache + MySQL
   ![XAMPP Control Panel](/views/xampp.png)
5. Truy cập [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/) bằng trình duyệt web(vd: Chrome) và tạo mới một database có tên là "tabis"
   ![PHP My Admin Dashboard](/views/phpMyadmin.png)
6. Chọn vào database vừa tạo -> Tab Nhập -> chọn file /data/tabisDB.sql ở project vừa clone về -> Thực hiện
   ![Add Data To Database](/views/input.png)
7. Truy cập [http://localhost/tabis-Ecommerce](http://localhost/tabis-Ecommerce) trên trình duyệt

## Giao diện của trang web

1. Trang chủ

![Home Page](/views/home.png "Home Page")

2. Sản phẩm / Danh mục sản phẩm

![Product Page](/views/product.png "Product Page")

3. Giỏ hàng

![Cart Page](/views/cart.png "Cart Page")

4. Tài khoản người dùng

![Account Page](/views/account.png "Account Page")

5. Quản trị viên

![Admin Dashboard](/views/adminDashboard.png "Admin Dashboard")
