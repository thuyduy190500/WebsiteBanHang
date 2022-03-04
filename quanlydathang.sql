-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 09:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydathang`
--
CREATE DATABASE IF NOT EXISTS `quanlydathang` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quanlydathang`;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DiaChiGH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GiaDatHang` float DEFAULT NULL,
  `Giamgia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GhiChu` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `DiaChiGH`, `GiaDatHang`, `Giamgia`, `GhiChu`) VALUES
(119, 'HH04', 1, 'Cần Thơ', 899000, '', 'kiểm tra hàng'),
(120, 'HH05', 2, 'Ninh Kiều, Cần Thơ', 2580000, '', 'kiểm tra hàng'),
(122, 'HH05', 3, 'Sóc Trăng', 3870000, '', 'kiểm tra hàng'),
(123, 'HH015', 6, 'Hồng Ngự, Đồng Tháp', 49800000, '', 'kiểm tra hàng');

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `MSNV` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDH` date DEFAULT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThaiDH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiDH`) VALUES
(119, 134, 'NV02', '2021-11-17', '2021-11-22', 'Đang chờ'),
(120, 135, 'NV02', '2021-11-17', '2021-11-22', 'Đang chờ'),
(122, 137, 'NV02', '2021-11-22', '2021-11-27', 'Đang chờ'),
(123, 138, 'NV02', '2021-11-25', '2021-11-30', 'Đang chờ');

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(449, 'Ninh Kiều, Cần Thơ', 113),
(450, 'Xuân Khánh, Cần Thơ', 114),
(463, 'Bình Thủy, Cần Thơ', 130),
(465, 'Hồng Ngự, Đồng Tháp', 132),
(466, 'Đồng Tháp', 133),
(467, 'Cần Thơ', 134),
(468, 'Ninh Kiều, Cần Thơ', 135),
(470, 'Sóc Trăng', 137),
(471, 'Hồng Ngự, Đồng Tháp', 138);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QuyCach` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `SoLuongHang` int(11) DEFAULT NULL,
  `MaLoaiHang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhDaiDien` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `HinhDaiDien`) VALUES
('HH01', ' Vali Valinice', 'Chất liệu ABS cứng cáp chống bể vỡ tối đa, màu sắc đa dạng kết hợp bề mặt vân dọc lạ mắt cho bạn nâng tầm phong cách. Vali được bảo mật tuyệt đối cho bạn an tâm di chuyển nhờ khóa số TSA hiện đại ', 799000, 10, 'VL', 'img/valiniceADD.jpg'),
('HH010', ' Combo 2 Vali Larita', '8 bánh xe được thiết kế tinh tế với đệm cao su giảm âm, phân tán lực đều trên 4 trục xoay 360 độ di chuyển linh hoạt. Khoang chứa rộng rãi ngoài dây đai cố định, còn tích hợp ngăn lưới có khóa kéo đảm bảo hành lý luôn gọn gàng', 1899000, 20, 'VL', 'img/cblaritaADD.jpg'),
('HH011', ' Combo 2 Vali Rayan ', 'Chịu lực tốt chống lại mọi ngoại lực kể cả nhiệt độ cao, màu sắc sắc nét bền bỉ với thời gian. Từ hợp kim nhôm siêu nhẹ chống rỉ sét với thiết kế tăng giảm nhiều nấc phù hợp mọi đối tượng', 2399000, 20, 'VL', 'img/cbrayanADD.jpg'),
('HH012', ' Combo 2 Vali Turon ', '8 bánh xe được thiết kế tinh tế với đệm cao su giảm âm, phân tán lực đều trên 4 trục xoay 360 độ di chuyển linh hoạt. Khoang chứa rộng rãi ngoài dây đai cố định, còn tích hợp ngăn lưới có khóa kéo đảm bảo hành lý của bạn luôn gọn gàng', 2620000, 20, 'VL', 'img/cbturonADD.jpg'),
('HH013', ' Combo 2 Vali Olix', 'Chịu lực tốt chống lại mọi ngoại lực kể cả nhiệt độ cao, màu sắc sắc nét bền bỉ với thời gian. Từ hợp kim nhôm siêu nhẹ chống rỉ sét với thiết kế tăng giảm nhiều nấc phù hợp mọi đối tượng', 2790000, 20, 'VL', 'img/cbolixADD.jpg'),
('HH014', ' Vali Walker ', 'Chịu lực tốt chống lại mọi ngoại lực kể cả nhiệt độ cao, màu sắc sắc nét bền bỉ với thời gian. Từ hợp kim nhôm siêu nhẹ chống rỉ sét với thiết kế tăng giảm nhiều nấc phù hợp mọi đối tượng', 6500000, 20, 'VL', 'img/walkerADD.jpg'),
('HH015', ' Vali Iron', 'Có thiết kế sang trọng, tỉ mỉ đến từ Anh mang phong cách Hoàng gia, logo thương hiệu trên vali được thiết kế bằng đồng tinh tế. Độ đàn hồi tốt, có thể trở về hình dạng ban đầu khi xảy ra va chạm mạnh, ngoài ra có khả năng chống trầy xước vượt trội', 8300000, 20, 'VL', 'img/ironADD.jpg'),
('HH02', ' Vali Olix', 'Có đến 2 quai xách cho bạn dễ dàng mang vác, đặc biệt đối với vali xách tay hoặc trong địa hình khó di chuyển. 4 bánh xe kép được thiết kế tỉ mỉ với đệm cao su giảm âm, phân tán lực đều xoay 360 độ di chuyển  linh hoạt', 1399000, 20, 'VL', 'img/olixADD.jpg'),
('HH026', ' Vali YG', 'Vali xách tay size S có thể chứa từ 5 - 7kg hành lý nhỏ gọn tiện lợi, size M rộng rãi có thể chứa đến 20 - 25kg. Nhựa PP nguyên chất dẻo dai chống lại mọi tác động ngoại lực, họa tiết vân ngang thời trang và hiện đại', 2790000, 23, 'VL', 'img/ygADD.jpg'),
('HH03', ' Vali Riati', 'Khóa số TSA đạt tiêu chuẩn Bộ An ninh vận tải Hoa Kỳ, bảo mật cao cho bạn an tâm trải nghiệm suốt chặng đường dài. Trọng lực dàn trải đều trên 8 bánh xe, tối ưu hóa với chất liệu giảm âm.', 1299000, 20, 'VL', 'img/riatiADD.jpg'),
('HH04', ' Vali Menti', 'Trang bị quai xách thuận tiện cho việc mang vác, tinh tế với lớp đệm cao su êm ái mang lại trải nghiệm tuyệt vời. Khoang chứa rộng rãi ngoài dây đai cố định, tỉ mỉ còn tích hợp ngăn lưới có khóa kéo đảm bảo hành lý của bạn luôn gọn gàng', 899000, 20, 'VL', 'img/mentiADD.jpg'),
('HH05', ' Vali Moki', '8 bánh xe được thiết kế tỉ mỉ với đệm cao su giảm âm, phân tán lực đều trên 4 trục xoay 360 độ di chuyển linh hoạt. Khoang chứa rộng rãi ngoài dây đai cố định, còn tích hợp ngăn lưới có khóa kéo đảm b', 1290000, 20, 'VL', 'img/mokiADD.jpg'),
('HH06', ' Vali Pisani', 'Thiết kế vuông cạnh cá tính tận dụng tối đa sức chứa, kết hợp chất liệu PC bền bỉ chịu được tác động va đập cực lớn. Thiết kế viền kim loại ở 4 góc bảo vệ vali luôn nguyên vẹn và sạch như mới dù di chuyển suốt chặng đường dài', 1700000, 20, 'VL', 'img/pisaniADD.jpg'),
('HH07', ' Vali Reed', 'Có thiết kế sang trọng đến từ Anh mang phong cách Hoàng gia, logo thương hiệu trên vali được thiết kế bằng đồng tinh tế. Độ đàn hồi tốt, có thể trở về hình dạng ban đầu khi xảy ra va chạm mạnh', 1100000, 20, 'VL', 'img/reedADD.jpg'),
('HH08', ' Vali Ego', 'Khóa số TSA đạt chuẩn Hoa Kỳ kết hợp dây kéo đôi chống rạch đảm bảo an toàn tối đa cho hành lý của bạn. Thiết kế tỉ mỉ, quai xách thông minh êm ái, đặc biệt được trang bị tới 2 quai xách thuận tiện việc mang vác', 1420000, 20, 'VL', 'img/egoADD.jpg'),
('HH09', ' Combo 2 Vali Pisani', 'Vali xách tay size S có thể chứa từ 5 - 7kg hành lý nhỏ gọn tiện lợi, size M rộng rãi có thể chứa đến 20 - 25kg. Nhựa PP nguyên chất dẻo dai chống lại mọi tác động ngoại lực, họa tiết vân ngang thời thượng', 1999000, 20, 'VL', 'img/cbpisaniADD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MSHH` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `Hinh`, `MSHH`) VALUES
(35, 'valiniceADD.jpg', 'HH01'),
(36, 'olix3.jpg', 'HH02'),
(37, 'olix2.jpg', 'HH02'),
(38, 'olix1.jpg', 'HH02'),
(39, 'olixADD.jpg', 'HH02'),
(41, 'riati2.jpg', 'HH03'),
(42, 'riatiADD.jpg', 'HH03'),
(43, 'menti2.jpg', 'HH04'),
(44, 'menti3.jpg', 'HH04'),
(45, 'menti1.jpg', 'HH04'),
(46, 'mentiADD.jpg', 'HH04'),
(52, 'valinice2.jpg', 'HH01'),
(53, 'valinice4.jpg', 'HH01'),
(56, 'valinice5.jpg', 'HH01'),
(57, 'riati3.jpg', 'HH03'),
(58, 'riati4.jpg', 'HH03'),
(59, 'moki1.jpg', 'HH05'),
(60, 'moki2.jpg', 'HH05'),
(61, 'moki3.jpg', 'HH05'),
(62, 'mokiADD.jpg', 'HH05'),
(63, 'pisani3.jpg', 'HH06'),
(64, 'pisani2.jpg', 'HH06'),
(65, 'pisani1.jpg', 'HH06'),
(66, 'pisaniADD.jpg', 'HH06'),
(67, 'reed3.jpg', 'HH07'),
(68, 'reed2.jpg', 'HH07'),
(69, 'reed1.jpg', 'HH07'),
(70, 'reedADD.jpg', 'HH07'),
(71, 'ego4.jpg', 'HH08'),
(72, 'ego3.jpg', 'HH08'),
(73, 'ego1.jpg', 'HH08'),
(74, 'egoADD.jpg', 'HH08'),
(75, 'cbpisani3.jpg', 'HH09'),
(76, 'cbpisani2.jpg', 'HH09'),
(77, 'cbpisani1.jpg', 'HH09'),
(78, 'cbpisaniADD.jpg', 'HH09'),
(83, 'cblaritaADD.jpg', 'HH010'),
(84, 'cblarita3.jpg', 'HH010'),
(85, 'cblarita2.jpg', 'HH010'),
(86, 'cblarita1.jpg', 'HH010'),
(87, 'cbrayan3.jpg', 'HH011'),
(88, 'cbrayan2.jpg', 'HH011'),
(89, 'cbrayan1.jpg', 'HH011'),
(90, 'cbrayanADD.jpg', 'HH011'),
(91, 'cbturon3.jpg', 'HH012'),
(92, 'cbturon2.jpg', 'HH012'),
(93, 'cbturon1.jpg', 'HH012'),
(94, 'cbturonADD.jpg', 'HH012'),
(99, 'cbolix3.jpg', 'HH013'),
(100, 'cbolix2.jpg', 'HH013'),
(101, 'cbolix1.jpg', 'HH013'),
(102, 'cbolixADD.jpg', 'HH013'),
(103, 'walker3.jpg', 'HH014'),
(104, 'walker2.jpg', 'HH014'),
(105, 'walker1.jpg', 'HH014'),
(106, 'walkerADD.jpg', 'HH014'),
(107, 'iron3.jpg', 'HH015'),
(108, 'iron2.jpg', 'HH015'),
(109, 'iron1.jpg', 'HH015'),
(110, 'ironADD.jpg', 'HH015'),
(120, 'yg3.jpg', 'HH026'),
(121, 'yg2.jpg', 'HH026'),
(122, 'yg1.jpg', 'HH026'),
(123, 'ygADD.jpg', 'HH026');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(50) NOT NULL,
  `HoTenKH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenCongTy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoFax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`) VALUES
(113, 'Hồ Thị Thùy Duy', '', '01255067123', ''),
(114, 'Nguyễn Quốc Bảo', '', '01255067123', ''),
(124, 'Trần Gia Hưng', '', '0855067123', ''),
(130, 'Nguyễn Văn A', '', '0945665567', ''),
(132, 'Trần Thanh Phong', '', '0125678912', ''),
(133, 'Trần ngọc quý', '', '01255067123', ''),
(134, 'Võ Xuân Thu', '', '0855067123', ''),
(135, 'Võ Văn Tuấn', '', '08678233', ''),
(137, 'Võ Xuân Ánh', '', '0855067123', ''),
(138, 'Trần Văn C', '', '0912678990', '');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiHang` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('TX', 'Túi xách'),
('VL', 'Vali');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNV` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChucVu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
('NV010', 'Võ Thị Huyền', 'Duyệt Đơn', 'Đồng Tháp ', '0945665567'),
('NV02', 'Trần Hà Anh', 'Tư Vấn', 'Cần Thơ', '0356768912'),
('NV03', 'Cao Thị Hà', 'Bán hàng', 'Trà Vinh', '0356788812'),
('NV04 ', 'Bùi Quang Thái', 'Bán Hàng', 'Đồng Tháp ', '0556228672'),
('NV05', 'Ngô Anh Thư', 'Tư Vấn', 'Vĩnh Long', '0277768912'),
('NV06', 'Thái Thị Thu', 'Bán Hàng', 'Bến Tre', '0466768321'),
('NV09', 'Võ Thái Hào', 'Kiểm toán', 'Sóc Trăng', '0945665567');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `User` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `VaiTro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `User`, `Pass`, `VaiTro`) VALUES
(1, 'B1805681', 'B1805681', 'Quản trị'),
(17, 'member', '12345', 'Thành viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
