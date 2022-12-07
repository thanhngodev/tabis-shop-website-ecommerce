-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2021 lúc 08:05 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tabis`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` float(3,2) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` float NOT NULL,
  `GiamGia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(1, 7.32, 2, 209000, 0),
(1, 7.36, 1, 79000, 0),
(2, 7.29, 2, 11799000, 0),
(3, 7.27, 1, 21539000, 0),
(4, 7.12, 1, 30990000, 0),
(5, 7.31, 1, 34550000, 0),
(6, 7.32, 1, 209000, 0),
(7, 7.19, 2, 1831000, 0),
(8, 7.30, 1, 27969000, 0),
(8, 7.29, 1, 11799000, 0),
(9, 7.12, 1, 30990000, 0),
(10, 7.13, 1, 5790000, 0);

--
-- Bẫy `chitietdathang`
--
DELIMITER $$
CREATE TRIGGER `after_delete_c` AFTER DELETE ON `chitietdathang` FOR EACH ROW BEGIN
	UPDATE `hanghoa` SET `hanghoa`.`SoLuongHang` = `hanghoa`.`SoLuongHang` + old.`SoLuong` 
    WHERE `hanghoa`.`MSHH`=old.`MSHH`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `items_update` AFTER INSERT ON `chitietdathang` FOR EACH ROW BEGIN
    UPDATE hanghoa
        SET hanghoa.SoLuongHang = hanghoa.SoLuongHang - new.SoLuong
        where hanghoa.MSHH = new.MSHH;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` float(8,1) NOT NULL,
  `MSNV` float(3,1) DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL,
  `HTGH` varchar(255) NOT NULL,
  `TongTien` float NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `HTGH`, `TongTien`, `TrangThai`) VALUES
(1, 9.0, 1.0, '2021-05-28', '2021-06-02', 'vnpay', 537000, 'Đang xử lý'),
(2, 9.0, 1.0, '2021-05-23', '2021-05-28', 'vnpay', 23638000, 'Giao hàng'),
(3, 9.0, NULL, '2021-05-28', '2021-06-02', 'vnpay', 21579000, 'Mới'),
(4, 1.0, 2.0, '2021-05-28', '2021-06-02', 'vnpay', 31030000, 'Đang xử lý'),
(5, 9.0, NULL, '2021-05-28', '2021-06-02', 'vnpay', 34590000, 'Mới'),
(6, 9.0, NULL, '2021-05-28', '2021-06-02', 'vnpay', 249000, 'Mới'),
(7, 12.0, NULL, '2021-05-29', '2021-06-03', 'vnpay', 3702000, 'Mới'),
(8, 12.0, 2.0, '2021-05-29', '2021-06-03', 'cod', 39808000, 'Đang xử lý'),
(9, 13.0, 2.0, '2021-05-29', '2021-06-03', 'cod', 31030000, 'Đang xử lý'),
(10, 14.0, 2.0, '2021-05-29', '2021-06-03', 'vnpay', 5830000, 'Đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` varchar(20) NOT NULL,
  `DiaChi` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `MSKH` float(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MSGH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSHH` float(8,2) NOT NULL,
  `soluong` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` float(8,2) NOT NULL,
  `TenHH` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Anh` varchar(255) DEFAULT NULL,
  `mansx` int(255) NOT NULL,
  `QuyCach` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Gia` float NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` float(2,1) NOT NULL,
  `GhiChu` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ngaynhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Anh`, `mansx`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `ngaynhap`) VALUES
(7.07, 'Điện thoại iPhone 12 64GB', 'product_images/iphone-12-violet-1-600x600.jpg', 1, 'cái', 21290000, 100, 1.0, '', '0000-00-00'),
(7.08, 'Điện thoại Xiaomi Redmi 9T (4GB/64GB)', 'product_images/redmi-9t-den-600x600-600x600.jpg', 1, 'cái', 3590000, 73, 1.0, '', '0000-00-00'),
(7.09, 'Điện thoại OPPO A93', 'product_images/oppo-a93-trang-14-600x600.jpg', 1, 'cái', 5990000, 98, 1.0, '', '0000-00-00'),
(7.10, 'Điện thoại Samsung Galaxy A02', 'product_images/samsung-galaxy-a02-xanhduong-600x600-600x600.jpg', 2, 'cái', 2370000, 100, 1.0, '', '0000-00-00'),
(7.11, 'Điện thoại OPPO Reno5 ', 'product_images/oppo-reno5-trang-600x600-1-600x600.jpg', 1, 'cái', 8690000, 100, 1.0, '', '0000-00-00'),
(7.12, 'Điện thoại iPhone 12 Pro Max 128GB', 'product_images/iphone-12-pro-max-xanh-duong-new-600x600-600x600.jpg', 1, 'cái', 30990000, 96, 1.0, '', '0000-00-00'),
(7.13, 'Điện thoại Vivo Y51 (2020)', 'product_images/vivo-y51-bac-600x600-600x600.jpg', 1, 'cái', 5790000, 97, 1.0, '', '0000-00-00'),
(7.14, 'Điện thoại Realme C12', 'product_images/realme-c12-do-13-600x600.jpg', 1, 'cái', 3190000, 94, 1.0, '', '0000-00-00'),
(7.15, 'Điện thoại Realme C20', 'product_images/realme-c20-xanh-600x600-1-2-600x600.jpg', 1, 'cái', 2690000, 100, 1.0, '', '0000-00-00'),
(7.19, 'Micro thu âm Takstar PH 130- Hàng Chính Hãng', 'product_images/micro.jpg', 10, 'cái', 1831000, 98, 2.0, 'Được thiết kế cho các bài hát K trên thiết bị di động và phát sóng trực tiếp, cho điện thoại thông minh và máy tính bảng, tương thích với hệ thống Android và iOS', '2021-05-21'),
(7.20, 'Micro Không Dây Karaoke Vietstar, 2 Mic Chuyên Dàn', 'product_images/3c8b339526dff9c876ec414e7f1e5c5c.jpg', 5, 'bộ', 315000, 26, 2.0, 'Chất lượng âm thanh chân thực, Mic hát rất nhẹ cho ra âm thanh cực chuẩn\r\nTần số điều chỉnh trong phạm vi 100m\r\nMàn hình LCD hiển thị tần số sóng âm, volume, pin giúp bạn dễ kiểm soát.\r\nBộ mic không dây Vstar MV01', '2021-05-22'),
(7.21, 'Tủ lạnh Samsung Inverter 208 lít RT19M300BGS/SV', 'product_images/9b74354498138aecf37f12a415ed6f01.jpg', 2, 'cái', 4315000, 12, 2.0, 'Dung tích: 208L\r\nKiểu tủ: Ngăn đá trên\r\nDuy trì độ ẩm đồng đều tại khắp các ngăn\r\nCông nghệ Digital Inverter hoạt động bền bỉ\r\nMiếng đệm kháng khuẩn, chống nấm mốc', '2021-05-22'),
(7.22, 'Máy Lạnh Inverter Panasonic CU/CS-U9VKH-8 (1.0HP) ', 'product_images/3fcc4b03465441816cddfc2599640c56.jpg', 5, 'cái', 9650000, 22, 2.0, 'Công nghê lọc bụi hiệu quả Nanoe-G\r\nTích hợp chế độ ngủ đêm bảo vệ sức khỏe\r\nCông nghệ làm lạnh cực nhanh P-Tech\r\nCánh quạt đảo gió kép Aerowings tạo hiệu quả làm lạnh lý tưởng', '2021-05-22'),
(7.23, 'Smart Tivi Casper HD 32 inch 32HX6200', 'product_images/5a1f8cede955503e1a6ddd4d1bac2f42.jpg', 4, 'cái', 3619000, 16, 2.0, 'Smart Tivi Casper HD 32 inch 32HX6200 sở hữu độ phân giải HD đem lại hình ảnh có độ nét cao tối ưu với màn hình kích thước 32 inch, chân đế thiết kế hình chữ V vững chãi ở mọi mặt phẳng. Tivi thanh mảnh, nhỏ gọn phù hợp với đa số không gian chật hẹp ở đô ', '2021-05-22'),
(7.24, 'Micro không dây gài tai Aporo 2.4G', 'product_images/a065a50b4cb525133271797c54881cfd.jpg', 2, 'bộ', 1490000, 100, 2.0, 'Micro không dây gài tai Aporo 2.4G hạt gạo cao cấp siêu nhỏ, mic live stream bán hàng online kèm Micro thu âm mini thiết kế cài áo tiện dụng- Hàng chính hãng', '2021-05-22'),
(7.25, 'Apple Macbook Pro 2020 M1 - 13 Inchs (Apple M1/ 8G', 'product_images/33d72e8efc6ef58d5fbe0cb1770c797e.jpg', 1, 'cái', 30699000, 8, 1.0, 'Thiết kế trau chuốt từng đường nét, trải nghiệm hình ảnh sắc nét với màn hình Retina.\r\nPhản hồi siêu tốc với vi xử lý M1 mạnh mẽ, macOS Big Sur nhiều tính năng mạnh mẽ.\r\nThời lượng pin lên đến 20 giờ, quạt tản nhiệt thế hệ mới.', '2021-05-22'),
(7.26, 'Apple Macbook Air 2020 M1 - 13 Inchs (Apple M1/ 8G', 'product_images/32568923c4c42a13346ca55c8bd473fb.jpg', 1, 'cái', 25590000, 10, 1.0, 'MacBook Air mới sử dụng chip M1 có CPU 8 lõi, được chia thành 4 lõi hiệu suất cao (High Performance) và 4 lõi hiệu quả (High Efficiency) cùng với Neural Engine 16 lõi.', '2021-05-22'),
(7.27, 'Laptop HP Envy 13-ba1027TU 2K0B1PA (Core i5-1135G7', 'product_images/1d0bde7776e2d0e90ab4972f58a997e3.jpg', 4, 'cái', 21539000, 9, 1.0, 'CPU: Intel Core i5-1135G7 2.4GHz up to 4.2GHz 8MB\r\nMàn hình: 13.3\" FHD (1920 x 1080) IPS with 72% NTSC, BrightView Micro-Edge, 300 nits\r\nRAM: 8GB DDR4 3200MHz (Onboard)\r\nĐồ họa: Intel Iris Xe Graphics\r\nLưu trữ: 256GB PCIe NVMe M.2 SSD\r\nHệ điều hành: Windo', '2021-05-22'),
(7.28, 'Laptop HP ProBook 455 G7 1A1A9PA (AMD R5-4500U/ 4G', 'product_images/2f65fc76dd7b068a1e76e6f8ade6b938.jpg', 4, 'cái', 15819000, 10, 1.0, 'CPU: AMD Ryzen 5-4500U 2.3GHz up to 4.0GHz 8MB\r\nMàn hình: 15.6\" FHD (1920 x 1080) Diagonal IPS Anti-Glare WLED-Backlit, 45% NTSC, 250nits\r\nRAM: 4GB DDR4 3200MHz (2x SO-DIMM socket, up to 32GB SDRAM)\r\nĐồ họa: AMD Radeon Graphics\r\nLưu trữ: 256GB SSD M.2 PCI', '2021-05-22'),
(7.29, 'Laptop HP 340s G7 240Q4PA (Core i3-1005G1/ 4GB DDR', 'product_images/49722472da18e5170c3c2622f5fce07e.jpg', 4, 'cái', 11799000, 7, 1.0, 'Laptop HP 340s G7 240Q4PA (Core i3-1005G1/ 4GB DDR4 2666MHz/ 256GB SSD M.2 NVMe/ 14 FHD IPS/ Win10) - Hàng Chính Hãng có thiết kế trang nhã sang trọng khi được phủ một lớp màu bạc bóng bẩy, những đường nét tinh tế cao cấp đảm bảo tính thẩm mĩ cao. Với trọ', '2021-05-22'),
(7.30, 'Laptop DELL Inspiron 15 7501 X3MRY1 (Core i7-10750', 'product_images/57ec9ef5aa74837a6c3c7a7894b4eb8c.jpg', 3, 'cái', 27969000, 9, 1.0, 'Hệ điều hành: Win 10 bản quyền\r\nCPU: Intel Core i7 10750H 2.6GHz, 12MB\r\nRAM: 8GB onboard DDR4/ 2933MHz (1 slot)\r\nỔ đĩa cứng: 512GB SSD PCIe (M.2 2230) – combo M.2 2230/2280\r\nVGA: NVIDIA GEFORCE GTX 1650Ti 4GB GDDR6\r\nMàn hình: 15.6” inch diagonal Full HD (', '2021-05-22'),
(7.31, 'Laptop Dell Gaming G5 5500 70228123 (Core i7-10750', 'product_images/01bff4802533f0f6d5d50f7f8d47e3db.jpg', 3, 'cái', 34550000, 7, 1.0, 'Viền màn hình benzen của máy được làm mỏng hơn, phần bản lề thiết kế lại với hai đường vát chéo cách điệu mới lạ hơn.\r\n\r\nKhung máy được gia công chắc chắn và bền bỉ, giúp bảo vệ những linh kiện bên trong khi có lực bên ngoài tác động. Bản lề máy mở gập li', '2021-05-22'),
(7.32, 'Giày thể thao nam 2 màu tăng chiều cao vải da kết ', 'product_images/fcdd76981c07b00884e8e181d6f3db80.jpg', 8, 'cái', 209000, 47, 3.0, 'Chất liệu: vải kết hợp da\r\nChất liệu đế: Cao su non đúc, tạo cảm giác thoải mái khi đi\r\nSize : 39-44\r\nSản phẩm được đảm bảo chất lượng\r\nThiết kế thời trang\r\nChất liệu cao cấp\r\nKiểu dáng phong cách\r\nĐộ bền cao', '2021-05-22'),
(7.33, 'Giày Sneake nam Phượt dạo phố cực ngầu Phối nền xa', 'product_images/653fa37a38e273120b44ac5b10eeb84b.jpg', 9, 'cái', 353812, 50, 3.0, 'Kiểu dáng thời trang, mẫu mã đa dạng\r\n\r\nVải lỗ thoáng giúp bay mùi của giày\r\n\r\nDây giày: Sợi canvas\r\n\r\nChất liệu bên trong: Cotton\r\n\r\nĐầy đủ các size : 39-40-41-42-43-44', '2021-05-22'),
(7.34, 'Áo sơ mi đũi ngắn tay cổ bẻ cao cấp', 'product_images/45be021f9b0a6c70278f2682af80b9c2.jpg', 7, 'cái', 128000, 100, 3.0, 'Vải đũi lụa tơ tằm, mềm mịn, mát mặc cực kì thỏa mái dễ chịu\r\nĐẹp từng đường kim mũi chỉ\r\nthấm hút mồ hôi tốt\r\nmàu sắc trang nhã, trẻ trung không kém phần lịch sự\r\n5 size m< 55kg, L< 63kg, xl< 71kg, xxl< 78kg, xxxl< 85kg!', '2021-05-22'),
(7.35, 'Áo sơ mi nam trơn, tay dài', 'product_images/254b860dc59179fed49f809ee513b481.jpg', 6, 'cái', 129000, 100, 3.0, 'Áo Chất cotton pha lụa trơn lanh đẹp, chuẩn chất dư của hãng rồi ko phải lăn tăn, vô cùng mềm mịn, mát hạn chế nhăn không xù.\r\nSang trọng lịch lãm, cuốn hút\r\nThiết kế hiện đại, màu sắc thời thượng, tinh tế từng đường kim mũi chỉ.\r\nFullsize đủ số cho anh e', '2021-05-22'),
(7.36, 'Áo sơ mi caro unisex nam nữ in hình họa tiết hai t', 'product_images/9bf272ac35171fb3de12174364a88394.jpg', 7, 'cái', 79000, 99, 3.0, 'ÁO khoác unisex kiểu dáng sơ mi sọc caro sẽ là điểm đáng tự hào được sáng tạo độc quyền.\r\nChất liệu thấm hút mồ hôi, thông thoáng, mềm mại.\r\nĐược dệt nhuộm theo công nghệ hiện đại.\r\nĐường may theo tiêu chuẩn xuất khẩu từ trong ra ngoài từ trên xuống dưới.', '2021-05-22'),
(7.37, 'Nệm Cao Su Non Hoạt Tính Thuần Việt Classic', 'product_images/372d6d2841151f6f2f893e73aaf2846d.jpg', 10, 'cái', 990000, 10, 4.0, 'Nệm cao su Thuần Việt Classic được làm từ chất liệu Memory Foam hiệu suất cao (hay còn gọi là cao su non). Điều đặc biệt ở nguyên liệu này là chúng được cải thiện và nâng cấp khả năng nâng đỡ tốt gấp 3 lần so với PU Foam hoặc Mousse Foam. Sản phẩm êm ái n', '2021-05-22'),
(7.38, 'Bàn cafe sofa loại to có ngăn kéo - Hàng chính hãn', 'product_images/fe1679e9670353af97fda536e00bd064.jpg', 10, 'cái', 876525, 20, 4.0, '- Kích thước: 100x40x42cm\r\n- Chất liệu mặt bàn: gỗ ép MDF\r\n- Có 3 màu lựa chọn: Trắng,Đen,Vàng\r\n- Mặt bàn phủ hoa văn giả gỗ\r\n- Bàn có thêm ngăn bàn 2 ngăn để đồ tiện lợi', '2021-05-22'),
(7.39, 'Đèn Bàn Học LED USB Di Động Cao Cấp Có Thể Gập Hai', 'product_images/b209178ba29ffe0be2302cf84b79f848.jpg', 10, 'cái', 259000, 100, 4.0, 'Bảo vệ mắt chống cận thị.\r\nPhù hợp với nhiều mục đích sử dụng.\r\nCó 03 mức điều chỉnh cường độ ánh sáng.\r\nChất liệu nhựa ABS cao cấp.', '2021-05-22'),
(7.40, 'Laptop DELL Inspiron 15 7501 X3MRY1 (Core i7-10750', 'product_images/57ec9ef5aa74837a6c3c7a7894b4eb8c.jpg', 3, 'cái', 27969000, 10, 1.0, 'Hệ điều hành: Win 10 bản quyền\r\nCPU: Intel Core i7 10750H 2.6GHz, 12MB\r\nRAM: 8GB onboard DDR4/ 2933MHz (1 slot)\r\nỔ đĩa cứng: 512GB SSD PCIe (M.2 2230) – combo M.2 2230/2280\r\nVGA: NVIDIA GEFORCE GTX 1650Ti 4GB GDDR6\r\nMàn hình: 15.6” inch diagonal Full HD (', '2021-05-22'),
(8.00, 'Laptop Dell Gaming G5 5500 70228123 (Core i7-10750', 'product_images/01bff4802533f0f6d5d50f7f8d47e3db.jpg', 3, 'cái', 34550000, 10, 1.0, 'Viền màn hình benzen của máy được làm mỏng hơn, phần bản lề thiết kế lại với hai đường vát chéo cách điệu mới lạ hơn.\r\n\r\nKhung máy được gia công chắc chắn và bền bỉ, giúp bảo vệ những linh kiện bên trong khi có lực bên ngoài tác động. Bản lề máy mở gập li', '2021-05-22'),
(9.00, 'Laptop Dell Gaming G5 5500 70228123 (Core i7-10750', 'product_images/01bff4802533f0f6d5d50f7f8d47e3db.jpg', 3, 'cái', 34550000, 10, 1.0, 'Viền màn hình benzen của máy được làm mỏng hơn, phần bản lề thiết kế lại với hai đường vát chéo cách điệu mới lạ hơn.\r\n\r\nKhung máy được gia công chắc chắn và bền bỉ, giúp bảo vệ những linh kiện bên trong khi có lực bên ngoài tác động. Bản lề máy mở gập li', '2021-05-22'),
(10.00, 'Giày thể thao nam 2 màu tăng chiều cao vải da kết ', 'product_images/fcdd76981c07b00884e8e181d6f3db80.jpg', 8, 'cái', 209000, 50, 3.0, 'Chất liệu: vải kết hợp da\r\nChất liệu đế: Cao su non đúc, tạo cảm giác thoải mái khi đi\r\nSize : 39-44\r\nSản phẩm được đảm bảo chất lượng\r\nThiết kế thời trang\r\nChất liệu cao cấp\r\nKiểu dáng phong cách\r\nĐộ bền cao', '2021-05-22'),
(11.00, 'Giày Sneake nam Phượt dạo phố cực ngầu Phối nền xa', 'product_images/653fa37a38e273120b44ac5b10eeb84b.jpg', 9, 'cái', 353812, 50, 3.0, 'Kiểu dáng thời trang, mẫu mã đa dạng\r\n\r\nVải lỗ thoáng giúp bay mùi của giày\r\n\r\nDây giày: Sợi canvas\r\n\r\nChất liệu bên trong: Cotton\r\n\r\nĐầy đủ các size : 39-40-41-42-43-44', '2021-05-22'),
(12.00, 'Áo sơ mi đũi ngắn tay cổ bẻ cao cấp', 'product_images/45be021f9b0a6c70278f2682af80b9c2.jpg', 7, 'cái', 128000, 100, 3.0, 'Vải đũi lụa tơ tằm, mềm mịn, mát mặc cực kì thỏa mái dễ chịu\r\nĐẹp từng đường kim mũi chỉ\r\nthấm hút mồ hôi tốt\r\nmàu sắc trang nhã, trẻ trung không kém phần lịch sự\r\n5 size m< 55kg, L< 63kg, xl< 71kg, xxl< 78kg, xxxl< 85kg!', '2021-05-22'),
(13.00, 'Áo sơ mi nam trơn, tay dài', 'product_images/254b860dc59179fed49f809ee513b481.jpg', 6, 'cái', 129000, 100, 3.0, 'Áo Chất cotton pha lụa trơn lanh đẹp, chuẩn chất dư của hãng rồi ko phải lăn tăn, vô cùng mềm mịn, mát hạn chế nhăn không xù.\r\nSang trọng lịch lãm, cuốn hút\r\nThiết kế hiện đại, màu sắc thời thượng, tinh tế từng đường kim mũi chỉ.\r\nFullsize đủ số cho anh e', '2021-05-22'),
(14.00, 'Áo sơ mi caro unisex nam nữ in hình họa tiết hai t', 'product_images/9bf272ac35171fb3de12174364a88394.jpg', 7, 'cái', 79000, 100, 3.0, 'ÁO khoác unisex kiểu dáng sơ mi sọc caro sẽ là điểm đáng tự hào được sáng tạo độc quyền.\r\nChất liệu thấm hút mồ hôi, thông thoáng, mềm mại.\r\nĐược dệt nhuộm theo công nghệ hiện đại.\r\nĐường may theo tiêu chuẩn xuất khẩu từ trong ra ngoài từ trên xuống dưới.', '2021-05-22'),
(15.00, 'Nệm Cao Su Non Hoạt Tính Thuần Việt Classic', 'product_images/372d6d2841151f6f2f893e73aaf2846d.jpg', 10, 'cái', 990000, 10, 4.0, 'Nệm cao su Thuần Việt Classic được làm từ chất liệu Memory Foam hiệu suất cao (hay còn gọi là cao su non). Điều đặc biệt ở nguyên liệu này là chúng được cải thiện và nâng cấp khả năng nâng đỡ tốt gấp 3 lần so với PU Foam hoặc Mousse Foam. Sản phẩm êm ái n', '2021-05-22'),
(16.00, 'Bàn cafe sofa loại to có ngăn kéo - Hàng chính hãn', 'product_images/fe1679e9670353af97fda536e00bd064.jpg', 10, 'cái', 876525, 10, 4.0, '- Kích thước: 100x40x42cm\r\n- Chất liệu mặt bàn: gỗ ép MDF\r\n- Có 3 màu lựa chọn: Trắng,Đen,Vàng\r\n- Mặt bàn phủ hoa văn giả gỗ\r\n- Bàn có thêm ngăn bàn 2 ngăn để đồ tiện lợi', '2021-05-22'),
(17.00, 'Đèn Bàn Học LED USB Di Động Cao Cấp Có Thể Gập Hai', 'product_images/b209178ba29ffe0be2302cf84b79f848.jpg', 10, 'cái', 259000, 100, 4.0, 'Bảo vệ mắt chống cận thị.\r\nPhù hợp với nhiều mục đích sử dụng.\r\nCó 03 mức điều chỉnh cường độ ánh sáng.\r\nChất liệu nhựa ABS cao cấp.', '2021-05-22'),
(18.00, 'Laptop DELL Inspiron 15 7501 X3MRY1 (Core i7-10750', 'product_images/57ec9ef5aa74837a6c3c7a7894b4eb8c.jpg', 3, 'cái', 27969000, 10, 1.0, 'Hệ điều hành: Win 10 bản quyền\r\nCPU: Intel Core i7 10750H 2.6GHz, 12MB\r\nRAM: 8GB onboard DDR4/ 2933MHz (1 slot)\r\nỔ đĩa cứng: 512GB SSD PCIe (M.2 2230) – combo M.2 2230/2280\r\nVGA: NVIDIA GEFORCE GTX 1650Ti 4GB GDDR6\r\nMàn hình: 15.6” inch diagonal Full HD (', '2021-05-22'),
(19.00, 'Laptop Dell Gaming G5 5500 70228123 (Core i7-10750', 'product_images/01bff4802533f0f6d5d50f7f8d47e3db.jpg', 3, 'cái', 34550000, 10, 1.0, 'Viền màn hình benzen của máy được làm mỏng hơn, phần bản lề thiết kế lại với hai đường vát chéo cách điệu mới lạ hơn.\r\n\r\nKhung máy được gia công chắc chắn và bền bỉ, giúp bảo vệ những linh kiện bên trong khi có lực bên ngoài tác động. Bản lề máy mở gập li', '2021-05-22'),
(20.00, 'Laptop Dell Gaming G5 5500 70228123 (Core i7-10750', 'product_images/01bff4802533f0f6d5d50f7f8d47e3db.jpg', 3, 'cái', 34550000, 10, 1.0, 'Viền màn hình benzen của máy được làm mỏng hơn, phần bản lề thiết kế lại với hai đường vát chéo cách điệu mới lạ hơn.\r\n\r\nKhung máy được gia công chắc chắn và bền bỉ, giúp bảo vệ những linh kiện bên trong khi có lực bên ngoài tác động. Bản lề máy mở gập li', '2021-05-22'),
(21.00, 'Giày thể thao nam 2 màu tăng chiều cao vải da kết ', 'product_images/fcdd76981c07b00884e8e181d6f3db80.jpg', 8, 'cái', 209000, 50, 3.0, 'Chất liệu: vải kết hợp da\r\nChất liệu đế: Cao su non đúc, tạo cảm giác thoải mái khi đi\r\nSize : 39-44\r\nSản phẩm được đảm bảo chất lượng\r\nThiết kế thời trang\r\nChất liệu cao cấp\r\nKiểu dáng phong cách\r\nĐộ bền cao', '2021-05-22'),
(22.00, 'Giày Sneake nam Phượt dạo phố cực ngầu Phối nền xa', 'product_images/653fa37a38e273120b44ac5b10eeb84b.jpg', 9, 'cái', 353812, 50, 3.0, 'Kiểu dáng thời trang, mẫu mã đa dạng\r\n\r\nVải lỗ thoáng giúp bay mùi của giày\r\n\r\nDây giày: Sợi canvas\r\n\r\nChất liệu bên trong: Cotton\r\n\r\nĐầy đủ các size : 39-40-41-42-43-44', '2021-05-22'),
(23.00, 'Áo sơ mi đũi ngắn tay cổ bẻ cao cấp', 'product_images/45be021f9b0a6c70278f2682af80b9c2.jpg', 7, 'cái', 128000, 100, 3.0, 'Vải đũi lụa tơ tằm, mềm mịn, mát mặc cực kì thỏa mái dễ chịu\r\nĐẹp từng đường kim mũi chỉ\r\nthấm hút mồ hôi tốt\r\nmàu sắc trang nhã, trẻ trung không kém phần lịch sự\r\n5 size m< 55kg, L< 63kg, xl< 71kg, xxl< 78kg, xxxl< 85kg!', '2021-05-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` float(8,1) NOT NULL,
  `HoTenKH` varchar(30) CHARACTER SET utf8 NOT NULL,
  `phai` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `DiaChi` varchar(80) CHARACTER SET utf8 NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `phai`, `ngaysinh`, `DiaChi`, `SoDienThoai`, `Email`, `username`, `password`) VALUES
(1.0, 'Nguyễn Văn A', NULL, NULL, 'Long Xuyên, An Giang', '0926636405', 'anguyen@gmail.com', 'anguyen', 'ff28e41dfb2c44f93c2295fb2f265d98'),
(2.0, 'Lê Bá Nhân', NULL, NULL, '111 - Nguyễn Trãi - TP. Cần Thơ', '071.123456', 'nhan@gmail.com', 'nhanba', '8b75b49b0f006107b0098961638bbdf6'),
(3.0, 'Nguyễn Văn Thông', NULL, NULL, '222 - Lê Lợi - TP. Long Xuyên', '061.128769', 'thong@gmail.com', 'thongnguyen', '038412f80565f9ba448809bca3fd62ce'),
(4.0, 'Trần Văn Thạch', NULL, NULL, '333 - Hùng Vương - Tx. Bạc Liêu', '081.339874', 'thach@gmail.com', 'thachtran', '865335f44877d73277ce8dc970047e02'),
(5.0, 'Nguyễn Hoàng Thái', NULL, NULL, '444 - Trần Hưng Đạo - TP. Cà Mau', '081.378926', 'thai@gmail.com', 'thainguyen', 'd7599d71034350c74d3a8408f61d8e20'),
(6.0, 'Lâm Phước Như', NULL, NULL, '555 - Hùng Vương - TP. Mỹ Tho', '063.287498', 'nhu123@gmail.com', 'phuocnhu', '14cae1d5fcd35151096b33e918456779'),
(7.0, 'Đào Ánh Tuyết', NULL, NULL, '666 - Trần Văn Khéo - Tp. Cần Thơ', '071.123123', 'anhtuyet@gmail.com', 'anhtuyet', '72f9b8d809633a39966d3bb3a5e02dce'),
(8.0, 'Lê Bá Nhân', NULL, NULL, '35 Hung Vuong', '071.123356', 'nhanleba@gmail.com', 'banhan', '55a860edf66436fc0763cd52baa0d25a'),
(9.0, 'Hồ Tấn Lợi', 'Nam', '2000-10-17', 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0334131019', 'loihaag12345@gmail.com', 'loi', '84ab36b2995bb3949db34038a2b24c64'),
(10.0, 'Thành', NULL, NULL, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0334131019', 'thanh@gmail.com', 'thanh', '8478e2bdb758f8467225ae87ed3750c2'),
(12.0, 'Trần Lâm Mỹ Xuân', 'Nữ', NULL, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0334131019', 'xuan@gmail.com', 'xuan', '0f3d014eead934bbdbacb62a01dc4831'),
(13.0, 'Nguyễn Văn B', 'Nam', NULL, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0334131019', 'loihaag12345@gmail.com', 'bnguyen', '1692fcfff3e01e7ba8cffc2baadef5f5'),
(14.0, 'Nguyễn Văn C', 'Nam', NULL, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0334131019', 'loihaag12345@gmail.com', 'cnguyen', '94f3b3a16d8ce064c808b16bee5003c5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` float(2,1) NOT NULL,
  `TenLoaiHang` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1.0, 'Điện Thoại-Laptop'),
(2.0, 'Điện Tử-Điện Lạnh'),
(3.0, 'Thời Trang-Phụ Kiện'),
(4.0, 'Nhà Cửa-Đời Sống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` float(3,1) NOT NULL,
  `HoTenNV` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ChucVu` varchar(40) CHARACTER SET utf8 NOT NULL,
  `DiaChi` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `username`, `password`) VALUES
(1.0, 'Ngô Tấn Thành', 'Admin', 'Chợ Mới, An Giang', '0329382782', 'admin', '8478e2bdb758f8467225ae87ed3750c2'),
(2.0, 'Hồ Tấn Lợi', 'Admin 1', 'Ninh Kiều, Cần Thơ', '0334131019', 'admin1', '84ab36b2995bb3949db34038a2b24c64');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `mansx` int(255) NOT NULL,
  `tennsx` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`mansx`, `tennsx`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Dell'),
(4, 'HP'),
(5, 'Sharp'),
(6, 'Christian Dior SE'),
(7, 'Louis Vuitton'),
(8, 'Adidas'),
(9, 'Nike'),
(10, 'Tabi\'s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vnpay`
--

INSERT INTO `vnpay` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(8, 16, 'Nguyễn Văn A', 30739000, 'Noi dung thanh toan', '00', '13513025', 'NCB', '2021-05-27 21:00:00'),
(9, 21, 'Hồ Tấn Lợi', 458000, 'Noi dung thanh toan', '00', '13513082', 'NCB', '2021-05-28 00:00:00'),
(10, 1, 'Hồ Tấn Lợi', 537000, 'Noi dung thanh toan', '00', '13513091', 'NCB', '2021-05-28 00:00:00'),
(11, 2, 'Hồ Tấn Lợi', 23638000, 'Thanh toán online vnpay', '00', '13513450', 'NCB', '2021-05-28 12:00:00'),
(12, 3, 'Hồ Tấn Lợi', 21579000, 'Thanh toán hóa đơn', '00', '13513459', 'NCB', '2021-05-28 12:00:00'),
(13, 4, 'Nguyễn Văn A', 31030000, 'Noi dung thanh toan', '00', '13513633', 'NCB', '2021-05-28 15:00:00'),
(14, 6, 'Hồ Tấn Lợi', 249000, 'Thanh toán mua hàng online', '00', '13513928', 'NCB', '2021-05-28 22:00:00'),
(15, 7, 'Trần Lâm Mỹ Xuân', 3702000, 'Thanh toán mua hàng online', '00', '13513952', 'NCB', '2021-05-29 00:00:00'),
(16, 10, 'Nguyễn Văn C', 5830000, 'Thanh toán mua hàng online', '00', '13513958', 'NCB', '2021-05-29 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `giohang_ibfk_1` (`MSHH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`),
  ADD KEY `mansx` (`mansx`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`mansx`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` float(8,2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` float(8,1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` float(2,1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` float(3,1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `mansx` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Các ràng buộc cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD CONSTRAINT `nhasanxuat_ibfk_1` FOREIGN KEY (`mansx`) REFERENCES `hanghoa` (`mansx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
