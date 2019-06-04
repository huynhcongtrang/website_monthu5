-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2019 lúc 08:21 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitesalematerial`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advisory`
--

CREATE TABLE `advisory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advisory`
--

INSERT INTO `advisory` (`id`, `name`, `sex`, `phone`, `position`) VALUES
(1, 'Thái', 1, '0326646934', 'Tư vân'),
(2, 'Hải', 2, '0326646935', 'Kinh doanh'),
(3, 'Thanh', 2, '0326646936', 'Tư vấn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `created`) VALUES
(1, 'slider-01.jpg', 20152015),
(2, 'slider-02.jpg', 20152016),
(3, 'slider-03.jpg', 20152017);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `id_parent`, `priority`) VALUES
(1, 'Giấy dầu', 0, 1),
(2, 'Vải địa kỹ thuật', 0, 2),
(3, 'Rọ đá', 0, 3),
(4, 'Lưới thép', 0, 4),
(5, 'Dây thép gai', 0, 5),
(6, 'Nhựa đường', 0, 6),
(7, 'Vật tư giao thông', 0, 7),
(8, 'Sản phẩm khác', 0, 8),
(9, 'Lưới B40', 4, 1),
(10, 'Lưới B41', 4, 2),
(11, 'Lưới bọc nhựa PVC', 4, 2),
(12, 'Lưới bọc nhựa PVC1', 4, 4),
(13, 'Dây thép gai', 4, 5),
(14, 'Lưới B40 - Lưới mắt cáo', 9, 1),
(15, 'Lưới B40 - Các loại ô lưới', 9, 2),
(16, 'cai con', 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_user` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_product`
--

INSERT INTO `comment_product` (`id`, `id_product`, `name`, `phone_user`, `email_user`, `content`, `id_parent`, `created`) VALUES
(1, 1, 'trang', '0326646934', 'trang@gmail.com', 'xau quac', 0, '2019-02-12 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `address`, `phone`, `email`, `content`, `created`) VALUES
(2, 'Dương Trọng Tín', 'Đường Số 2 , Chung cư Sài Gòn METRO PARK', '0907926567', 'huynhcongtrang12a3@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-06-01 10:36:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `from_date` int(11) NOT NULL,
  `to_date` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_company`
--

CREATE TABLE `info_company` (
  `id` int(11) NOT NULL,
  `name_company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_owner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_company`
--

INSERT INTO `info_company` (`id`, `name_company`, `name_owner`, `address`, `phone`, `email`, `created`) VALUES
(1, 'VN Building', 'Huynh Cong Trang', '87 Xuân Diệu , Cam Đức ,Cam Lâm , Khánh Hoà', '0326646934', 'huynhcongtrang12a3@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `id_maker` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `discount` int(11) NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `decription` text COLLATE utf8_unicode_ci NOT NULL,
  `element` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `gift` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_catalog`, `id_maker`, `name`, `price`, `discount`, `introduce`, `decription`, `element`, `content`, `image_link`, `total`, `gift`, `view`, `rating`, `created`) VALUES
(1, 3, 0, 'Giấy dầu xây dựng vật liệu KFC', '1000000.0000', 20, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', 'Giấy dầu là vật liệu hiện nay được dùng rộng rãi trong các công trình xây dựng dân dụng và công nghiệp như làm khu công nghiệp, làm đường bê tông, chống thấm mặt cầu, chống thấm sân bay. Giấy Dầu là vật liệu lót dưới cho công trình bê tông…', '- Nhựa đường;\r\n- Giấy Karaf;\r\n- Bột đá;\r\n- Mành chịu cơ tính;\r\n- Một số phụ gia khác.', 'Đặc điểm của Giấy dầu xây dựng.\r\n- Giấy dầu xây dựng màu đen, đóng gói thành cuộn:\r\n- Khổ cuộn: 1m\r\n- Chiều dài cuộn: 7m, 10m, 15m, 20m\r\n- Nguyên liệu sản xuất chính: Nhựa đường, giấy karat, bột đá, mành chịu cơ tính và một số phụ gia khác\r\n- Trọng lượng:\r\n- Giấy dầu loại thường: 350g/m2\r\n- Giấy dầu loại nặng: 600g/m2\r\nCác chức năng chính của tấm Giấy dầu tóm tắt như sau:\r\n- Mục đích sử dụng của lớp Giấy dầu trong kết cấu mặt đường Bê Tông Xi măng:\r\n- Làm lớp tạo phẳng, giảm ma sát giữa lớp mặt đường bê tông xi măng và móng đường khi tấm bê tông xi măng giãn nở do nhiệt.\r\n- Tránh không cho lớp móng hút nước trong bê tông xi măng mặt đường khi đang ninh kết làm giảm chất lượng bê tông\r\n- Làm lớp cách ly giữa lớp móng giảm ma sát (thường làm bằng cát dày 2-5cm) và lớp bê tông xi măng mặt đường.\r\n- Do vậy có thể thấy sự cần thiết phải dùng lớp giấy dầu lót trong kết cấu bê tông xi măng và tấm này phải là loại đủ độ dày và độ cứng để giữ phẳng đáy tấm bê tông xi măng và loại trừ các yếu tố ảnh hưởng đến chất lượng trong thi công.\r\nMục đích sử dụng của Giấy dầu trong trường hợp khác:\r\n- Làm máng che mưa cho rãnh cây cao su trong quá trình thu hoạch mủ cao su;\r\n- Dùng để che phủ tạm thời cho mái nhà...\r\nThông tin cụ thể về sản phẩm quý khách vui lòng liên hệ với công ty VNBUILDING để được tư vấn và giá tốt nhất thị trường.', '01.png', 20, '', 549, 4, '1998-01-14 00:00:00'),
(2, 2, 0, 'Vải địa kỹ thuật không dệt Aritex', '3350000.0000', 5, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', '', '', '', '02.png', 10, '', 296, 2, '2019-02-25 00:00:00'),
(3, 11, 0, 'Lưới mắt cá b40 bọc nhựa PVC', '356000000.0000', 5, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', '', '', '', '03.png', 15, '', 132, 3, '2016-12-02 00:00:00'),
(4, 1, 0, 'Giấy dầu xây dựng chống thấm ', '356000000.0000', 5, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', '', '', '', '06.png', 12, '', 120, 1, '0000-00-00 00:00:00'),
(5, 5, 0, 'Dây thép gai mạ kẽm tiêu chuẩn ', '256000000.0000', 5, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', '', '', '', '07.png', 5, '', 132, 0, '2016-12-02 00:00:00'),
(6, 2, 0, 'Vải địa kỹ thuật không dệt G10 chất lượng đảm bảo', '256000000.0000', 5, 'Được mạ kẽm theo tiêu chuẩn TCVN 2053-93, ASTM A475, BS443, EN 10244 tùy theo yêu cầu của khách hàng', '', '', '', '08.png', 8, '', 110, 0, '2016-12-02 00:00:00'),
(7, 1, 0, 'Giấy dầu chống thấm', '356000000.0000', 3, 'Làm lớp tạo phẳng, giảm ma sát giữa lớp mặt và móng đường', '', '', '', '11.jpg', 18, '', 102, 0, '2016-12-02 00:00:00'),
(8, 1, 0, 'Giấy dầu dan dụng', '356000000.0000', 3, 'Tránh không cho lớp móng hút nước trong bê tông mặt đường khi đang ninh kết làm giảm chất lượng bê tông', '', '', '', '12.jpg', 19, '', 100, 0, '2016-12-02 00:00:00'),
(9, 1, 0, 'Giấy dầu cao cấp chuẩn ACB', '25000000.0000', 7, 'Làm máng che mưa cho rãnh cây cao su trong quá trình thu hoạch mủ cao su', '', '', '', '13.jpg', 25, '', 208, 0, '2016-12-02 00:00:00'),
(10, 14, 0, 'Lưới mắt cáo bọc nhựa', '356000000.0000', 3, 'Lưới mắt cáo bọc nhựa là loại lưới mắt cáo xoắn ba chao được sản xuất từ các loại dây thép có bọc thêm lớp nhựa PVC nhằm hạn chế tối đa tính axit và ăn mòn của môi trường bên ngoài.', '', '', '', '14.jpg', 20, '', 153, 0, '2016-02-02 00:00:00'),
(11, 14, 0, 'Lưới mắt cáo', '356000000.0000', 3, 'Lưới mắt cáo là loại lưới được sản xuất từ các loại dây thép mạ kẽm, được xoắn 3 chao tạo thành các ô hình lục giác.', '', '', '', '15.jpg', 20, '', 152, 0, '2016-02-02 00:00:00'),
(12, 13, 0, 'Dây thép gia', '356000000.0000', 3, 'Dây thép gai được dùng làm vòng rào bảo vệ, tường rào bảo vệ trong các công trình an ninh quốc phòng và dân dụng khác.', '', '', '', '16.jpg', 18, '', 132, 0, '2016-12-02 00:00:00'),
(13, 10, 0, 'Lưới bọc nhựa B41', '356000000.0000', 3, 'Được sử dụng rộng rãi trong các ngành xây dựng, giao thông, nông lâm, ngư nghiệp, hàng rào chắn các sân bóng, sân tenis, đường hành lang bảo vệ', '', '', '', '17.png', 18, '', 105, 0, '2016-12-02 00:00:00'),
(14, 13, 0, 'Dây gai tôn', '356000000.0000', 3, 'Dây thép gai bùng nhùng Là sản phẩm có mặt trên thị trường khá sớm, với sự tiện lợi chất lượng cao các đầu gai sắc nhọn được bọc bên ngoài bằng lớp tôn mạ kẽm nhúng nóng chất lượng cao.', '', '', '', '18.jpg', 18, '', 102, 0, '2016-12-02 00:00:00'),
(21, 7, 0, 'Trụ đèn đường', '650000.0000', 4, 'Trụ đèn chắc chắn, cao, thắp sáng rộng, phù hợp cho những đường vừa và lớn', '', '', '', '19.jpg', 11, '', 8, 0, '0000-00-00 00:00:00'),
(16, 7, 0, 'Rào chắn đường', '850000.0000', 0, 'Được làm từ théo không gỉ , cứng cáp, phù hợp với thời tiết nắng nóng', '', '', '', '09.png', 12, '', 5, 0, '0000-00-00 00:00:00'),
(17, 7, 0, 'Sơn kẻ đường chuẩn AYT', '850000.0000', 0, 'Bám đường chắc chắn, vạch kẻ rỏ ràng, chất liệu làm bằng dung dịch Titarin chịu đựng nhiệt dộ cao', '', '', '', '10.png', 11, '', 5, 0, '0000-00-00 00:00:00'),
(18, 7, 0, 'Rào trên cầu hiệu Katanic', '700000.0000', 0, 'Dể dàng lắp đặt, thành chắn chắc chắn, được làm từ thép không gỉ, phù hợp với cầu vừa và nhỏ', '', '', '', '01.jpg', 12, '', 5, 0, '0000-00-00 00:00:00'),
(19, 7, 0, 'Biển báo đường giao thông', '700000.0000', 0, 'Dể dàng lắp đặt, thành chắn chắc chắn, được làm từ thép không gỉ, phù hợp với cầu vừa và nhỏ', '', '', '', '02.jpg', 8, '', 6, 0, '0000-00-00 00:00:00'),
(20, 7, 0, 'Vạch kẻ giữa đường katama', '650000.0000', 4, 'Vạch kẻ màu vàng , chất liệu dính chặt, phù hợp với thời tiết bất thường, làm từ chất polymanaja', '', '', '', '03.jpg', 11, '', 8, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id`, `name`, `introduce`, `image_link`, `created`) VALUES
(1, 'Dự án Khu đô thị RiverSide', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '01.png', '0000-00-00 00:00:00'),
(2, 'Dự án Khu đô thị Quasinten', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '03.png', '0000-00-00 00:00:00'),
(3, 'Dự án Đường cao tốc Hà Nội - Lào Cai', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '03.jpg', '0000-00-00 00:00:00'),
(4, 'Dự án khu dô thị trái tim', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '02.jpg', '0000-00-00 00:00:00'),
(5, 'Dự án Nhà máy UDMIC', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '06.jpg', '0000-00-00 00:00:00'),
(6, 'Dự án Nhà máy ABCFD', 'Morbi sed aliquet dui. Aenean fermentum luctus neque quis eleifend.', '04.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_product`
--

CREATE TABLE `rating_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `id_type_service` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `decription` text COLLATE utf8_unicode_ci NOT NULL,
  `procedure` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `id_type_service`, `name`, `introduce`, `decription`, `procedure`, `image_link`, `created`) VALUES
(1, 1, 'Dịch vụ Thi công hàn màng chống thấm', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', 'Với năng lực và thiết bị của chúng tôi được giới thiệu trên website này. Công ty TNHH Vnbuilding Thăng Long xin giới thiệu đến quý khách hàng quan tâm đến dịch vụ của chúng tôi trong công tác thi công hàn màng chống thấm xử lý các công trình như chúng tôi giới thiệu dưới đây.', 'I. Chuẩn bị. enter\r\n\r\n1. Công tác làm đất. enter\r\n\r\n– Mặt bằng để trải màng chống thấm HDPE phải được chuẩn bị sạch sẽ, phẳng, không đọng vũng nước, nền đất phảm đầm chắc. enter\r\n\r\n– Nền đất không được có sỏi hoặc những vật khác có hình dạng nhọn có thể ảnh hưởng đến màng chống thấm HDPE. enter\r\n\r\n– Nền đất không được quá yếu dẫn đến lún sụp gây rách mối hàn. enter\r\n\r\n2. Rãnh neo enter\r\n\r\n– Đội thi công phải xây dựng rãnh neo để trải màng chống thấm HDPE, chiều rộng, chiều sâu phải đúng như thiết kế trên bản vẽ trong quy cách kỹ thuật. Việc đào rãnh neo phải được thực hiện trước khi trải màng chống thấm HDPE. enter\r\n\r\n– Mép của màng chống thấm HDPE tiếp xúc với rãnh neo phải không có những hình dạng lồi ra để tránh những rách. Sau đó đội thi công đổ đất lên rãnh neo theo quy cách bản vẽ. Việc đổ đất thải phải được tiến hành ngay sau khi trải màng chống thấm HDPE để tránh việc bắc cầu qua rãnh neo. Trong quá trình đổ đất phải tránh làm hư hỏng màng enter\r\n\r\n3. Trải màng chống thấm enter\r\n\r\nGiám sát công trường phối hợp với nhà thầu để thỏa thuận công tác thi công. Nếu trong trường hợp thời tiết xấu hoặc bất đồng xảy ra thì giám sát công trường phải ngừng ngay việc trải màng chống thấm HDPE cho đến khi mọi việc được giải quyết xong. enter', '01.jpg', '0000-00-00 00:00:00'),
(2, 1, 'Thi công cọc cát', 'Máy cơ sở: Sử dụng máy Kobelko; Hitachi DH 308, DH350, DH400, Sumitomo cú trong tải 30 Tấn, 35 Tấn, 40 Tấn ...', '', '', '02.jpg', '0000-00-00 00:00:00'),
(3, 1, 'Thi công nhà dân dụng', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', '', '', '03.jpg', '0000-00-00 00:00:00'),
(4, 1, 'Thi công chống thấm mái tôn', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', '', '', '04.jpg', '0000-00-00 00:00:00'),
(5, 1, 'Thi công cọc cát', 'Máy cơ sở: Sử dụng máy Kobelko; Hitachi DH 308, DH350, DH400, Sumitomo cú trong tải 30 Tấn, 35 Tấn, 40 Tấn ...', '', '', '05.jpg', '0000-00-00 00:00:00'),
(6, 1, 'Thi công nhà dân dụng', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', '', '', '06.jpg', '0000-00-00 00:00:00'),
(7, 1, 'Thi công hàn màng chống thấm', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', '', '', '07.jpg', '0000-00-00 00:00:00'),
(8, 1, 'Thi công hàn', 'Máy cơ sở: Sử dụng máy Kobelko; Hitachi DH 308, DH350, DH400, Sumitomo cú trong tải 30 Tấn, 35 Tấn, 40 Tấn ...', '', '', '08.jpg', '0000-00-00 00:00:00'),
(9, 1, 'Thi công hố sâu', 'Dây nhựa HDPE là sản phẩm được sản xuất đầu tiên ở VN với thiết bị máy móc hiện đại nhập từ Châu Âu, ....', '', '', '09.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `payment` tinyint(4) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `status_payment` int(11) NOT NULL,
  `status_ship` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `address`, `payment`, `amount`, `discount`, `status_payment`, `status_ship`, `created`) VALUES
(1, 22, '87 Xuân Diệu, Quận 12 , Tp Hồ Chí Minh', 1, '155000.0000', '3000.00', 1, 1, '2019-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeservice`
--

CREATE TABLE `typeservice` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeservice`
--

INSERT INTO `typeservice` (`id`, `name`, `created`) VALUES
(1, 'Thi Công', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created`) VALUES
(6, 'Trang', 'huynh@gmail.com', '0326646934', 'Quan 12', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', '2019-05-05 17:26:41'),
(22, 'Trạng Công Huỳnh', 'trang@gmail.com', '0326646941', '87 Xuan dieu , Phường Tân Chánh Hiệp , Quận 1 , Tp. Hồ Chí Minh', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', '2019-06-03 22:33:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advisory`
--
ALTER TABLE `advisory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_company`
--
ALTER TABLE `info_company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `typeservice`
--
ALTER TABLE `typeservice`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advisory`
--
ALTER TABLE `advisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `info_company`
--
ALTER TABLE `info_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `typeservice`
--
ALTER TABLE `typeservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
