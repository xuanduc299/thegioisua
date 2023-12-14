-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 03:10 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thegioisua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Phan Tiến Huy', 'huyphan21092002@gmail.com', '123', 0),
(2, 'Nguyễn Xuân Đức', 'nxd@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(150) NOT NULL,
  `dia_chi` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `so_dien_thoai` char(20) NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lien_he`
--

INSERT INTO `lien_he` (`id`, `ho_ten`, `dia_chi`, `email`, `so_dien_thoai`, `noi_dung`) VALUES
(7, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(150) NOT NULL,
  `phone_receiver` char(20) NOT NULL,
  `address_receiver` text NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `total_price`, `status`, `created_at`) VALUES
(3, 3, '', '0986538387', 'Hà Nội', 2317000, 0, '2022-11-24 07:04:40'),
(4, 3, '', '1231232112', 'hn', 240000, 0, '2022-12-17 08:15:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(3, 2, 2),
(3, 4, 1),
(3, 6, 1),
(3, 7, 1),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_san` varchar(250) NOT NULL,
  `mo_ta` text NOT NULL,
  `anh` varchar(250) NOT NULL,
  `gia` float NOT NULL,
  `khuyen_mai` float NOT NULL,
  `danh_muc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san`, `mo_ta`, `anh`, `gia`, `khuyen_mai`, `danh_muc`) VALUES
(1, 'Sữa bột Bimbosan Stage 3 400g cho bé trên 12 tháng ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_1.jpg', 299000, 139000, 'sale'),
(2, 'Sữa bột Bimbosan Stage 3 800g cho bé trên 12 tháng ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_2.jpg', 619000, 268000, 'sale'),
(3, 'Sữa bột Bimbosan Stage 2 800g cho bé 6-12 tháng ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_3.jpg', 240000, 149000, 'sale'),
(4, 'Rontamil Plus 2 400g cho bé 6-12 tháng ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_4.jpg', 240000, 149000, 'sale'),
(5, 'Rontamil Plus 2 800g cho bé 6-12 tháng ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_5.jpg', 299000, 160000, 'sale'),
(6, 'Sữa bột GrowPLUS+ trên 1 tuổi (Vàng - Sữa non tăng đề kháng) Lon 850g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_6.jpg', 599000, 286000, 'sale'),
(7, 'Anlene Gold 5X hương vani 800g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_7.jpg', 240000, 149000, 'sale'),
(8, 'Sữa bột GrowPLUS+ 0-12 tháng (Vàng -  Sữa non tăng đề kháng) Lon 850g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_bot_8.jpg', 610000, 268000, 'sale'),
(9, 'Sữa tươi tiệt trùng NuVi 100% Ít Đường Hộp 180ml', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_1.jpg', 220000, 99000, 'topsale'),
(10, 'Sữa tươi tiệt trùng NuVi 100% Có Đường Hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_8.jpg', 650000, 286000, 'topsale'),
(11, 'Sữa tươi tiệt trùng NuVi 100% Ít Đường Hộp 180ml', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_2.jpg', 200000, 81000, 'topsale'),
(12, 'Sữa tiệt trùng không đường NutiMilk 100% sữa New Zealand 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_3.jpg', 290000, 168000, 'topsale'),
(13, 'Sữa tiệt trùng ít đường NutiMilk 100% sữa New Zealand 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_4.jpg', 50000, 15000, 'topsale'),
(14, 'Sữa uống NuVi có thạch hương cam hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_5.jpg', 399000, 199000, 'topsale'),
(15, 'Sữa uống NuVi lúa Mạch cacao có thạch hộp 170 ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_6.jpg', 190000, 97000, 'topsale'),
(16, 'Sữa uống NuVi Trái Cây Nhiệt Đới hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_7.jpg', 350000, 178000, 'topsale'),
(17, 'Sữa tươi tiệt trùng NuVi 100% Có Đường Hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_tuoi_8.jpg', 190000, 97000, 'Chăm Sóc Da'),
(18, 'Sữa chua Nutimilk trân châu ngọc trai 100g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_1.jpg', 27000, 15000, 'Chăm Sóc Da'),
(19, 'Sữa chua Nutimilk trân châu đường đen 100g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_2.jpg', 290000, 170000, 'Chăm Sóc Da'),
(20, 'Sữa chua uống NuVi Dâu có thạch hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_3.jpg', 240000, 78000, 'Chăm Sóc Da'),
(21, 'Sữa uống lên men NuVi Có Đường Chai 100ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_4.jpg', 250000, 178000, 'Chăm Sóc Da'),
(22, 'Sữa chua uống NuVi Đào táo hộp 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_5.jpg', 450000, 149000, 'Chăm Sóc Da'),
(23, 'Sữa chua uống NuVi dâu 180ml ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_6.jpg', 304000, 183000, 'Chăm Sóc Da'),
(24, 'Sữa chua Nutimilk Nha đam 100g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_chua_7.jpg', 209000, 152000, 'Chăm Sóc Da'),
(25, 'Sữa bột Rontamil Mom 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_1.jpg', 570000, 236000, 'Chăm Sóc Da'),
(26, 'Sữa bột Rontamil Mom 800g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_2.jpg', 99000, 69000, 'Chăm Sóc Da'),
(27, 'Sữa bột Bimbosan Ladymilk 800g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_3.jpg', 120000, 65000, 'Chăm Sóc Da'),
(28, 'Sữa bột Bimbosan Ladymilk 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_4.jpg', 380000, 153000, 'Chăm Sóc Da'),
(29, 'Sữa bột Anmum Materna Vanilla 800g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_5.jpg', 280000, 199000, 'Chăm Sóc Da'),
(30, 'Sữa bột Anmum Materna Vanilla 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_6.jpg', 64000, 56000, 'Chăm Sóc Da'),
(31, 'Sữa bột Anmum Materna Socola 800g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_7.jpg', 430000, 218000, 'Chăm Sóc Da'),
(32, 'Sữa bột Anmum Materna Socola 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_me_8.jpg', 285000, 198000, 'Chăm Sóc Da'),
(33, 'Sữa bột Abbott Ensure Gold ít ngọt vị Vani 850g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://product.hstatic.net/1000006063/product/01_4ae7b634b7394ef1878a826c82a58e67_1024x1024.png', 320000, 199000, 'Chăm Sóc Da'),
(34, 'Sữa bột Anlene Gold 3X Vani 800g hộp thiếc ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_1.jpg', 290000, 180000, 'Chăm Sóc Da'),
(35, 'Sữa bột Anlene Gold 3X Vani 440g hộp giấy ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_2.jpg', 300000, 119000, 'Chăm Sóc Da'),
(36, 'Sữa bột giàu Protein Nepro 2 900g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_3.jpg', 220000, 134000, 'Chăm Sóc Da'),
(37, 'Sữa bột giảm Protein Nepro 1 900g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_5.jpg', 180000, 105000, 'Trang Điểm'),
(38, 'Sữa bột cho người tiểu đường Gluvita 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_6.jpg', 160000, 135000, 'Trang Điểm'),
(39, 'Sữa bột cho người tiểu đường Gluvita 400g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_7.jpg', 230000, 134000, 'Trang Điểm'),
(40, 'Sữa bột Calosure 900g ', 'Giao hàng toàn quốc 24h\r\n\r\nGiao hàng với đơn hàng tối thiểu 250.000 VNĐ\r\n\r\nHotline: 0979840906', 'https://nxdstore.000webhostapp.com/images/design_sua/sua_cao_8.jpg', 260000, 159000, 'Trang Điểm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` char(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `password`, `token`) VALUES
(3, 'PhanTienHuy', 'huyphan1232002@gmail.com', '0986538387', 'Ha Noi', '123', 'user_637f18ca458066.04581637'),
(7, 'duc', 'duc@gmail.com', '0979840906', 'hn', '123', ''),
(9, 'hai', 'hai@gmail.com', '098882323', 'hn', '123', ''),
(10, 'hanh', 'hanh@gmail.com', '098882323', 'hn', '123', ''),
(11, 'huyen', 'huyen@gmail.com', '098882123', 'hn', '123', ''),
(12, 'trang', 'trang@gmail.com', '0982382323', 'hn', '123', ''),
(13, 'Vanh', 'vanh@gmail.com', '094582323', 'hn', '123', ''),
(14, 'Phanh', 'phanh@gmail.com', '0986782323', 'hn', '123', ''),
(15, 'Phuong', 'phuong@gmail.com', '0988782323', 'hn', '123', ''),
(16, 'Ha', 'ha@gmail.com', '098867323', 'hn', '123', ''),
(17, 'Linh', 'linh@gmail.com', '098342323', 'hn', '123', ''),
(18, 'Mai', 'mai@gmail.com', '09892482323', 'hn', '123', ''),
(19, 'Thao', 'thao@gmail.com', '098454323', 'hn', '123', ''),
(20, 'Dung', 'dung@gmail.com', '098565323', 'hn', '123', ''),
(21, 'Ngoc', 'ngoc@gmail.com', '09853323', 'hn', '123', ''),
(22, 'Vy', 'vy@gmail.com', '098452323', 'hn', '123', ''),
(23, 'Quyen', 'quyen@gmail.com', '098228233', 'hn', '123', ''),
(24, 'Le', 'le@gmail.com', '098482323', 'hn', '123', ''),
(25, 'Huong', 'huong@gmail.com', '098582323', 'hn', '123', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
