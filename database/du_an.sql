-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 04:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `price`, `quantity`) VALUES
(202, 75, 7, 3500000, 3),
(208, 76, 9, 4000000, 2),
(211, 76, 12, 1100000, 3),
(264, 75, 47, 200000, 2),
(265, 87, 5, 3000000, 1),
(266, 85, 44, 1600000, 2),
(267, 85, 41, 2000000, 1),
(269, 75, 29, 2250000, 4),
(270, 75, 5, 3000000, 3),
(271, 89, 9, 4000000, 2),
(272, 92, 46, 1200000, 1),
(273, 93, 46, 1200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `create_at`, `update_at`) VALUES
(33, 'Rolex', '2021-11-18 08:57:30', '2021-11-26 16:10:53'),
(35, 'Zenith', '2021-11-18 08:57:30', '2021-11-18 08:57:30'),
(36, 'Chanel', '2021-11-18 08:57:30', '2021-11-26 16:11:42'),
(37, 'Piaget', '2021-11-18 08:57:30', '2021-11-18 08:57:30'),
(38, 'Hublot', '2021-11-18 08:57:30', '2021-11-18 08:57:30'),
(39, 'Longines', '2021-11-18 08:57:30', '2021-11-18 08:57:30'),
(40, 'Graff', '2021-11-18 08:57:30', '2021-11-18 08:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `sender_id`, `recipient_id`) VALUES
(57, 85, NULL),
(58, 75, 85),
(59, 85, NULL),
(60, 75, 85),
(61, 85, NULL),
(62, 85, NULL),
(63, 75, 85),
(64, 87, NULL),
(65, 75, 87),
(66, 87, NULL),
(67, 75, 87),
(68, 3, 87),
(69, 89, 0),
(70, 75, 3),
(71, 75, 89),
(72, 75, 89),
(73, 89, 0),
(74, 75, 89),
(75, 89, 0),
(76, 75, 89),
(77, 89, 0),
(78, 89, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_content`
--

CREATE TABLE `chat_content` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_content`
--

INSERT INTO `chat_content` (`id`, `chat_id`, `content`, `create_at`, `status`) VALUES
(52, 57, 'chào shop', '2021-12-10 21:53:46', 0),
(53, 58, 'hello', '2021-12-10 21:54:11', 0),
(54, 59, 'ttt', '2021-12-10 21:54:18', 0),
(55, 60, 'ttt', '2021-12-10 21:54:25', 0),
(56, 61, 'chào chào', '2021-12-10 21:54:52', 0),
(57, 62, 'goodbye', '2021-12-10 22:03:10', 0),
(58, 63, 'ok', '2021-12-10 22:03:20', 0),
(59, 64, 'hello shop', '2021-12-10 22:04:21', 0),
(60, 65, 'ok em', '2021-12-10 22:04:34', 0),
(61, 66, 'bye bye', '2021-12-10 22:04:53', 0),
(62, 67, 'chào', '2021-12-10 22:36:50', 0),
(63, 68, 'chào', '2021-12-10 22:41:46', 0),
(64, 69, 'hello', '2022-09-16 13:44:14', 0),
(65, 70, 'hehe', '2022-09-16 13:44:42', 0),
(66, 71, 'hello', '2022-09-16 13:44:54', 0),
(67, 72, 'bạn cần giúp gì', '2022-09-16 13:45:13', 0),
(68, 73, 'aa', '2022-09-16 13:54:40', 0),
(69, 74, 'bb', '2022-09-16 13:55:23', 0),
(70, 75, 'cc', '2022-09-16 13:55:46', 0),
(71, 76, 'dd', '2022-09-16 13:56:35', 0),
(72, 77, 'aa', '2022-09-16 16:28:07', 0),
(73, 78, 'aa \n', '2022-09-16 16:29:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `create_at`, `user_id`, `product_id`) VALUES
(110, 'sản phẩm tốt', '2021-12-01 14:37:57', 76, 5),
(111, 'sản phẩm rất tốt', '2021-12-03 15:11:02', 76, 3),
(114, 'sản phẩm đẹp', '2021-12-04 12:56:34', 76, 48),
(124, 'sản phẩm rẩ tốt', '2021-12-07 11:44:35', 75, 5),
(125, 'giá hợp lí', '2021-12-07 11:50:01', 75, 9),
(126, 'sản phẩm giá rất rẻ', '2021-12-07 11:59:13', 87, 5),
(127, 'sản phẩm tốt', '2021-12-07 14:37:30', 75, 29),
(128, 'sản phẩm tốt', '2021-12-09 14:39:43', 75, 5),
(129, 'Sản phẩm chất lượng', '2021-12-09 16:54:05', 75, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` text NOT NULL,
  `total_price` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `create_at`, `user_id`, `address`, `phone_number`, `total_price`, `status`) VALUES
(1, '2021-12-01 12:33:02', 76, 'Hà Nội', '0962597441', 2030000, 1),
(2, '2021-12-01 14:42:33', 76, 'Hà Nội', '0526484988', 29330000, 1),
(3, '2021-12-02 15:36:08', 76, 'Chí Đám', '0962597441', 22530000, 1),
(4, '2021-12-03 12:12:52', 3, 'Đoan Hùng', '0962597441', 3330000, 1),
(5, '2021-12-04 21:09:46', 75, 'Hà Nội', '0526484988', 1030000, 1),
(6, '2021-12-04 21:16:39', 75, 'Phú Thọ', '0962597441', 20974000, 1),
(7, '2021-12-05 12:05:25', 85, 'Nam Từ Liêm', '0375230483', 5230000, 1),
(8, '2021-12-06 22:19:16', 75, 'Hà Nội', '0526484988', 8974000, 1),
(9, '2021-12-07 12:00:45', 87, 'Việt Trì', '0962597441', 3030000, 1),
(10, '2021-12-07 12:03:43', 85, 'Nam Từ Liêm', '0375230483', 1630000, 1),
(11, '2021-12-07 14:39:00', 75, 'Phú Thộ', '0962597441', 20130000, 1),
(12, '2021-12-09 14:40:06', 75, 'Hà Nội', '0526484988', 25930000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `price`, `quantity`, `discount`) VALUES
(1, 31, 2000000, 1, 0),
(2, 3, 2300000, 4, 0),
(2, 5, 3000000, 1, 0),
(2, 9, 4000000, 4, 0),
(2, 12, 1100000, 1, 0),
(3, 4, 1800000, 3, 0),
(3, 9, 4000000, 4, 0),
(3, 12, 1100000, 1, 0),
(4, 4, 1800000, 1, 0),
(4, 40, 1500000, 1, 0),
(5, 47, 200000, 5, 0),
(6, 5, 3000000, 4, 0),
(6, 7, 3500000, 2, 0),
(6, 8, 192000, 7, 0),
(6, 47, 200000, 3, 0),
(7, 41, 2000000, 1, 0),
(7, 44, 1600000, 2, 0),
(8, 5, 200000, 3, 0),
(8, 7, 192000, 7, 0),
(8, 47, 3500000, 2, 0),
(9, 5, 3000000, 1, 0),
(10, 44, 1600000, 1, 0),
(11, 7, 3500000, 3, 0),
(11, 29, 2250000, 4, 0),
(11, 47, 200000, 3, 0),
(12, 5, 3000000, 2, 0),
(12, 7, 3500000, 3, 0),
(12, 29, 2250000, 4, 0),
(12, 47, 200000, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(2500) DEFAULT NULL,
  `description` varchar(2500) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `model` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `view` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image`, `description`, `discount`, `model`, `quantity`, `status`, `view`, `create_at`, `update_at`, `cate_id`) VALUES
(3, 'Hublot Tourbillon Sapphie', 2300000, 'img/product_1.png', 'Đồng hồ Hublot Spirit Of Big Bang Tourbillon Sapphire Rainbow 42mm là sự hợp nhất giữa giá trị truyền thống và hiện đại, mang đến một trải nghiệm tuyệt vời đối với người đeo. Sự xuất hiện của đồng hồ trên cổ tay chủ sở hữu không chỉ cho những giá trị nhận biết thời gian, mà còn biểu tượng của một phong cách luôn hợp thời và là lời khẳng định cho đẳng cấp riêng.', 0, 0, 1000, 0, 19, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(4, 'Hublot Big Bang King gold', 2000000, 'img/product_2.png', 'Hublot Bigbang Unico King Gold 42mm sở hữu lớp vỏ bằng King Gold 18K (chất liệu độc quyền của Hublot) nổi bật, kết hợp phần bezel làm cùng chất liệu với vỏ làm cho chiếc đồng hồ Hublot Big Bang này càng trở lên sang trọng và cuốn hút.', 10, 0, 1000, 0, 7, '2021-11-18 09:07:18', '2021-11-19 20:13:17', 38),
(5, 'Big Bang DJ Snake', 3000000, 'img/product_3.png', 'Hublot Big Bang DJ Snake 45mm là thành quả của sự hợp tác giữa nghệ sĩ người Pháp DJ Snake và thương hiệu đồng hồ Hublot. Thiết kế sở hữu vô số khía cạnh đặc biệt giống như người nghệ sĩ tài năng đã truyền cảm hứng cho nó. Sự xuất hiện của chiếc đồng hồ Hublot Big Bang DJ Snake 45mm như một điểm nhấn, nhấn mạnh vào sự năng động, thể thao và khác biệt của chủ sở hữu.', 0, 0, 1000, 0, 120, '2021-11-18 09:07:18', '2021-11-19 20:11:51', 38),
(6, 'Hublot Spirit of Big Bang', 1800000, 'img/product_4.png', 'Hublot Spirit Of Big Bang Titanium Ceramic 45mm, 601.NM.0173.LR chiếc đồng hồ này sở hữu một kích thước thuộc hàng khủng: 45mm cùng với chất liệu titanium siêu bền nhẹ và cứng cỗ máy này lại không quá nặng nhưng vẫn đầm tay. ', 5, 0, 1000, 0, 4, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(7, 'Hublot Fusion Diamonds', 5000000, 'img/product_5.png', 'Hublot Big Bang One Click Steel Diamonds 39mm mang mã hiệu 465.SX.1170.RX.1204 thanh lịch và đầy tinh tế với tông màu đen chủ đạo. Đây sẽ là một món quà không thể tuyệt vời hơn dành tặng phái đẹp.', 30, 1, 10000, 0, 2, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(8, 'Big Bang Steel Full Pave', 320000, 'img/product_6.png', 'Hublot đã giới thiệu thêm một bộ sưu tập với thiết kế tương tự nhưng dành cho nữ. Chiếc đồng hồ Hublot Big Bang One Click 465.SX.9010.RX.1604 chính là một trong những thiết kế như vậy, mới được thương hiệu giới thiệu vào đầu năm 2021.', 40, 1, 1000, 0, 1, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(9, 'Rolex Oyster Perpetual', 5000000, 'img/product_7.png', 'Rolex Datejust vẫn là dòng sản phẩm thu hút đông đảo sự chú ý của khách hàng trên toàn thế giới. Trong công nghệ chế tác đồng hồ, vàng mang tính chất sang trọng, quý phái, thường được sử dụng cho những chiếc đồng hồ thiết kế cổ điển còn thép mang đặc tính bền bỉ với độ chống chịu áp lực cao, dành cho những mẫu có tính chất trẻ trung, hiện đại. Nhận ra những đặc điểm này, ngay từ những năm 1930, Rolex đã kết hợp hai chất liệu vàng và thép tạo thành những mẫu đồng hồ sang trọng. Rolex Datejust 41mm 126334 là một chiếc đồng hồ như vậy.', 20, 0, 1000, 0, 13, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 33),
(10, 'Rolex Yacht Master', 2000000, 'img/product_8.png', 'Yacht- Master là dòng đồng hồ lịch lãm nhưng mang đậm chất thời trang và thể thao, dòng sản phẩm nổi bật này của thương hiệu Rolex lừng danh sẽ mang đến cho người sở hữu sự nổi bật và tự tin tuyệt đối trước đám đông. Rolex Yacht-Master 268655 Pave chính là một cái tên không thể bỏ qua.', 30, 1, 1000, 0, 4, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 33),
(11, 'Hublot Orlinski White', 3000000, 'img/product_9.png', 'Chiếc đồng hồ sẽ khiến người khác phải ngưỡng mộ và ghen tỵ với bạn bởi sức hấp dẫn không thể cưỡng lại đến từ gam màu đen mạnh mẽ từ phần mặt số, nam tính. Thay vì lớp vỏ được làm từ vàng 18k King Gold ở phiên bản này Hublot mang tới chất liệu là Titanium với đường kính 45 mm.', 45, 1, 1000, 0, 1, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(12, 'Hublot Fusion Titanium', 2000000, 'img/product_10.png', 'Hublot Classic Fusion Titanium King Gold 45mm vẫn mang trong mình thiết kế sang trọng và mang nét đẹp cổ điển đặc trưng của dòng Classic Fusion. Lần này, thay vì bộ vỏ vàng hồng thì Hublot muốn mang tới một chất liệu khác đó chính là Titanium, vành bezel với chất liệu King Gold 18 quen thuộc. Được trang bị bộ máy Calibre HUB1112, hoạt động ổn định và có độ chính xác rất cao. Khả năng chống nước sâu 50mét/165feet. ', 45, 0, 1000, 0, 2, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(16, 'Hublot Spirit of Big Bang', 1800000, 'img/product_11.png', 'Hublot Spirit Of Big Bang Titanium Ceramic 45mm, 601.NM.0173.LR chiếc đồng hồ này sở hữu một kích thước thuộc hàng khủng: 45mm cùng với chất liệu titanium siêu bền nhẹ và cứng cỗ máy này lại không quá nặng nhưng vẫn đầm tay. ', 0, 0, 1000, 0, 6, '2021-11-18 09:07:18', '2021-11-18 09:07:18', 38),
(23, 'Hublot Classic Titanium', 3200000, 'img/product_12.png', 'Thương hiệu đồng hồ cao cấp Hublot dần trở thành một trong nhưng nhà sản xuất đồng hồ hàng đầu trong thế giới công nghiệp chế tác đồng hồ cơ học. Điều đáng nói, người chơi chỉ cần chi trả một mức giá rất vừa phải là có thể sở hữu một chiếc đồng hồ đẹp, sang trọng, sành điệu và năng động. Điều này đã khiến Hublot ngày càng là cái tên nổi tiếng và đáng gờm thuộc phân khúc cao cấp. Hôm nay, hãy cùng Boss Luxury khám phá về một trong những thiết kế \"kinh điển\" của thương hiệu: Hublot Classic Fusion Titanium Blue 42mm ', 0, 1, 1000, 0, 2, '2021-11-18 10:49:32', '2021-11-18 10:49:32', 38),
(24, 'Rolex Oyster Perpetual', 2000000, 'img/product_13.png', 'Rolex Datejust vẫn là dòng sản phẩm thu hút đông đảo sự chú ý của khách hàng trên toàn thế giới. Trong công nghệ chế tác đồng hồ, vàng mang tính chất sang trọng, quý phái, thường được sử dụng cho những chiếc đồng hồ thiết kế cổ điển còn thép mang đặc tính bền bỉ với độ chống chịu áp lực cao, dành cho những mẫu có tính chất trẻ trung, hiện đại. Nhận ra những đặc điểm này, ngay từ những năm 1930, Rolex đã kết hợp hai chất liệu vàng và thép tạo thành những mẫu đồng hồ sang trọng. Rolex Datejust 41mm 126334 là một chiếc đồng hồ như vậy.', 30, 0, 1000, 0, 2, '2021-11-18 10:49:32', '2021-11-18 10:49:32', 33),
(25, 'Big Bang Unico Magic', 3000000, 'img/product_14.png', 'Mặt số skeleton không đơn giản chỉ là lộ máy mà đó còn là cả một bức tranh nghệ thuật. Chiếc Hublot Big Bang Unico Black Magic nổi bật vô cùng ngầu với bộ vỏ ceramic đen toàn bộ từ vành bezel, thân vỏ cho tới bộ khóa. Chất liệu ceramic nổi bật là một chất liệu hiện đại, trọng lượng nhẹ và có độ cứng rất cao.', 10, 0, 1000, 0, 1, '2021-11-18 10:49:32', '2021-11-18 10:49:32', 38),
(27, 'Zenith DEFY Zero ', 3200000, 'img/product_17.png', 'Chiếc đồng hồ Zenith DEFY Zero G 95.9000.8812-78.R584 được thiết kế theo phong cách hiện đại với tông màu xám làm chủ đạo. Bộ vỏ titanium độ cứng cao có đường kính lên tới 44mm kết hợp dây đeo cao su màu xanh vô cùng sang trọng. Chiếc đồng hồ nổi bật với thiết kế skeleton bên trong toát lên vẻ đẹp của sự phức tạp cho cỗ máy', 40, 1, 1000, 0, 2, '2021-11-18 15:57:33', '2021-11-18 15:57:33', 35),
(28, 'Zenith Pilot Montre', 2000000, 'img/product_18.png', 'Chiếc đồng hồ ZENITH Pilot Montre D\'Aeronef Type 20 Tourbillon Chronograph Rose Gold 48mm được thiết kế theo phong cách đồng hồ phi công điển hình của hãng rất được yêu thích. Đồng hồ với tông màu đen, bộ vỏ vàng hồng , nổi bật với thiết kế skeleton bên trong toát lên vẻ đẹp của sự phức tạp cho cỗ máy.', 20, 1, 1000, 0, 78, '2021-11-18 15:57:33', '2021-11-18 15:57:33', 35),
(29, 'Zenith defty el Primero', 2500000, 'img/product_19.png', 'DEFY El Primero 21 có lẽ là mẫu đồng hồ thú vị nhất được ra mắt cùng thời điểm với những anh em của mình vào năm 2017. Phải là những bậc thầy trong chế tác đồng hồ, Zenith mới có thể chế tạo ra chiếc đồng hồ tuyệt phẩm như vậy.', 10, 0, 1000, 0, 5, '2021-11-18 15:57:33', '2021-11-18 15:57:33', 35),
(30, 'Zenith ELITE Lady ', 1500000, 'img/product_20.png', 'Vỏ vàng hồng 18kt với dây đeo bằng da cá sấu màu nâu. Cố định khung viền kim cương tông vàng. Mặt số trắng của mặt số ngọc trai với bàn tay mạ vàng hồng và vạch chỉ giờ. Kiểu quay số: Analog. Hai - tiểu phần thứ hai và mặt trăng giai đoạn. Zenith Calibre Elite 692 chuyển động tự động với khả năng dự trữ năng lượng trong 50 giờ. Tinh thể sapphire chống trầy xước. Kéo / đẩy vương miện. Trường hợp trong suốt trở lại. ', 0, 1, 1000, 0, 1, '2021-11-18 15:57:33', '2021-11-18 15:57:33', 35),
(31, '\r\nZenith ELITE Classic', 2000000, 'img/product_21.png', 'Zenith Elite Classic Ultra-Thin (18229067901c498), có vỏ bằng vàng hồng 39mm 18k bao quanh mặt số bằng bạc sunray trên dây đeo cá sấu màu nâu với khóa bằng vàng hồng 18k. Các chức năng bao gồm giờ, phút và giây', 0, 1, 1000, 0, 1, '2021-11-18 15:57:33', '2021-11-18 15:57:33', 35),
(37, 'Chanel J12', 3200000, 'img/product_22.png', 'Chanel J12 XS H5237 với thiết kế \"siêu nhỏ\" và chất liệu sứ công nghệ cao với đường kính mặt số chỉ 19mm, đính 32 viên kim cương cắt sáng chói góp phần tôn lên nét quyến rũ nơi cổ tay người đẹp. Sự khác lạ của chất liệu đối với nữ giới càng làm tăng thêm hiệu ứng của gốm công nghệ cao màu trắng.', 0, 1, 1000, 0, 173, '2021-11-18 16:10:43', '2021-11-18 16:10:43', 36),
(38, 'Chanel Premiere', 2200000, 'img/product_23.png', 'Mẫu đồng hồ Chanel Première mã hiệu H6126 với thiết kế đơn giản nhưng lại mang vẻ đẹp vô cùng sang trọng, đẳng cấp. Với vỏ từ 2 chất liệu vàng vàng 18k cùng dây cao su màu đen vừa mang lại cảm giác thoải mái, yên tâm vừa là một lời tuyên bố về phong cách đẳng cấp và quý phái của phái đẹp.', 0, 1, 1000, 0, 2, '2021-11-18 16:10:43', '2021-11-18 16:10:43', 36),
(39, 'Chanel Boy Friend Tweed', 2000000, 'img/product_24.png', 'Chanel Boy Friend Tweed H6127, một chiếc đồng hồ nữ với sức quyến rũ nam tính, được thiết kế với cùng một tinh thần táo bạo. Với size nhỏ 21,5 x 27,9 mm, đồng hồ được chế tác bằng thép với lớp tráng men mô phỏng mẫu vải Tweed trong các sắc thái khác nhau của màu xám. ', 10, 0, 1000, 0, 4, '2021-11-18 16:10:43', '2021-11-18 16:10:43', 36),
(40, 'Piaget Limelight Gala', 1500000, 'img/product_25.png', 'Chiếc đồng hồ Piaget Limelight Gala Watch Satin G0A38167 38mm với gam màu tươi sáng, đem lại sự năng động trong thiết kế cực kỳ đẹp và sang trọng, đi kèm chức năng hiển thị giờ cũng tương đối là dễ nhìn đối với nữ giới.', 0, 1, 1000, 0, 23, '2021-11-18 16:15:49', '2021-11-18 16:15:49', 37),
(41, 'Piaget Limelight Gala', 2000000, 'img/product_26.png', 'Chiếc đồng hồ Piaget Limelight Gala watch G0A44167 32mm được làm từ vàng hồng nguyên khối vô cùng sang trọng. Với màu xanh từ mặt số cùng dây đeo bằng chất liệu vàng hồng thanh lịch, cỗ máy thật hoàn hảo trên cổ tay phái đẹp. ', 0, 1, 1000, 0, 3, '2021-11-18 16:15:49', '2021-11-18 16:15:49', 37),
(42, 'Piaget Limelight Gala', 3000000, 'img/product_27.png', 'Chiếc đồng hồ Piaget Limelight Gala watch G0A41212 32mm được làm từ vàng trắng nguyên khối vô cùng sang trọng. Với màu trắng của dây và mặt số màu bạc thanh lịch, cỗ máy thật hoàn hảo trên cổ tay phái đẹp.', 0, 0, 1000, 0, 1, '2021-11-18 16:15:49', '2021-11-18 16:15:49', 37),
(43, 'Longines Presence', 2500000, 'img/product_28.png', 'Bộ sưu tập Presence đã tái hiện quá trình phát triển của di sản Longines và là một phần tạo nên truyền thống lâu đời. Mẫu đồng hồ Longines L47902112 dành cho nam giới sử dụng màu trắng sang trọng làm mặt số, được điêu khắc rất tinh xảo với chữ số La Mã và cửa sổ ngày trang nhã tại vị trí 3 giờ.', 0, 1, 1000, 0, 5, '2021-11-18 16:21:30', '2021-11-18 16:21:30', 39),
(44, 'Longines La Grande', 1600000, 'img/product_29.png', 'Bộ sưu tập đồng hồ Longines La grande classic que de Longines được vinh danh là bộ sưu tập của vẻ đẹp cổ điển vĩnh hằng. Mẫu đồng hồ Longines La Grande Classique L49084942 sử dụng màu xanh da trời sang trọng làm mặt số, được điêu khắc rất tinh xảo cùng số chỉ giờ La Mã.', 0, 0, 1000, 0, 4, '2021-11-18 16:21:30', '2021-11-18 16:21:30', 39),
(45, 'Longines Equestrian', 1100000, 'img/product_30.png', 'Tình yêu với môn thể thao đua ngựa luôn thấm đẫm trong Bộ sưu tập Longines EQUESTRIAN. Mẫu đồng hồ Longines Equestrian L61424876 sử dụng màu trắng xà cừ sang trọng làm mặt số, được điêu khắc rất tinh xảo với 12 viên kim cương lấp lánh chỉ giờ trên mô hình đồng hồ bầu dục.', 0, 1, 1000, 0, 1, '2021-11-18 16:21:30', '2021-11-18 16:21:30', 39),
(46, 'GraffStar Icon Automatic', 2000000, 'img/product_21.png', 'GraffStar Icon Automatic GSA38PGSLD không chỉ khoác trên mình lớp áo choàng là bộ vỏ vô cùng lông lẫy bằng vàng hồng 18k và kim cương lấp lánh với kích thước 38 mm mà còn sở hữu một cơ chế hoạt động bền bỉ bên trong với bộ máy tự động lên dây cót có khả năng dự trữ lên đến 42 giờ được cài đặt bên trong vỏ. ', 40, 1, 1000, 0, 33, '2021-11-18 16:29:35', '2021-11-18 16:29:35', 40),
(47, 'Graff Ultra Flat', 200000, 'img/product_32.png', 'Graff Ultra Flat Tourbillon 43mm fully set diamond sẽ là một phiên bản chứng minh sự sáng tạo đáng tự hào của Gaff, bất cứ ai khi ngắm nhìn cũng phải ấn tượng về nó.', 0, 0, 1000, 0, 27, '2021-11-18 16:29:35', '2021-11-18 16:29:35', 40),
(48, 'Graff Structural Tourbillon ', 2500000, 'img/product_33.png', 'Graff Structural Tourbillon Skeleton Automatic mang mã hiệu MGSTO46TB được nhà sản xuất chế tác rất công phu với bộ vỏ được chế tác bằng chất liệu Platinum, mặt số có thiết kế Skeleton đầy hấp dẫn.', 0, 0, 1000, 0, 5, '2021-11-18 16:29:35', '2021-11-18 16:29:35', 40);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `image` varchar(2500) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_name`, `image`, `create_at`, `update_at`, `product_id`) VALUES
(1, 'Bigbang Meca-10 King Gold', 'img/slider_1.png', '2021-11-19 19:00:54', '2021-11-19 19:05:52', 4),
(2, 'Big Bang DJ Snake', 'img/slider_2.png', '2021-11-19 19:00:54', '2021-12-07 14:26:46', 5),
(3, 'Hublot Spirit of Big Bang', 'img/slider_3.png', '2021-11-19 19:00:54', '2021-12-07 15:38:29', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(2500) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `phone_number` text DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `fullname`, `avatar`, `age`, `phone_number`, `gender`, `role`, `address`, `create_at`, `update_at`) VALUES
(3, 'khaidang', 'khaiddph15544@fpt.edu.vn', '76d80224611fc919a5d54f0ff9fba446', 'Đặng Đình Khải', '../../admin/user/avatar/PH15544 Đặng Đình Khải.jpg', 19, '0962597441', 0, 0, 'Chí Đám Đoan Hùng', '2021-11-26 19:59:12', '2021-12-03 23:57:47'),
(75, 'truongnn', 'truongnnph15584@fpt.edu.vn', '76d80224611fc919a5d54f0ff9fba446', 'Nguyễn Nhật Trường', '../../admin/user/avatar/myprofile.jpg', 19, '02106573899', 0, 1, 'Hà Nội', '2021-11-26 21:08:45', '2021-12-07 14:40:36'),
(76, 'Thành trà', 'traptph15606@fpt.edu.vn', '765fd28c30b08fdd81e59b60a08d6666', 'Phùng Thành Trà', 'avatar/244419465_396431702046596_2955440484817806120_n.jpg', 18, '0598746254', 0, 1, 'Hà Nội', '2021-11-26 21:10:22', '2021-12-04 13:21:16'),
(84, 'Mạnh Quân', 'quannn@gmail.com', '279e321378405cdd59664e5ba9c579f3', 'Phạm Văn Quân', '../../admin/user/avatar/couple.jpg', 16, '0526484988', 0, 0, 'Hà Nội', '2021-12-03 17:12:00', '2021-12-09 01:07:33'),
(85, 'Nguyễn Hạnh', 'hanhnt123@gmail.com', 'c112467e051dcc9d30863f20da5aad29', 'Nguyễn Thị Hạnh', '../../admin/user/avatar/SP1 (4).jpg', 22, '0594876256', 1, 0, 'Nam Từ Liêm - Hà Nội', '2021-12-04 00:00:05', '2021-12-09 01:25:29'),
(87, 'Nguyễn Thị Hà', 'hanguyen@gmail.com', '8a18310f124b57ceba1bde5b3382be71', 'Nguyễn Thị Hà', '../../admin/user/avatar/anh-hot-girl-lanh-lung-9.gif', 18, '0968297412', 1, 0, 'Văn Lang Việt Trì', '2021-12-04 21:41:44', '2021-12-09 01:25:18'),
(88, 'khaidang', 'khaidang1123@gmail.com', 'fac699df16e57f0cffe70a93c1cf0145', 'Đặng Đình Khải', 'avatar/SP1 (4).jpg', 21, '0962597441', 0, 1, 'Phú Thọ', '2021-12-07 14:42:05', '2021-12-07 14:42:17'),
(89, 'khaidang', 'dangkhai@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'Đặng Khải', '../../admin/user/avatar/PH15544 Đặng Đình Khải.jpg', 19, '0962597441', 0, 0, 'Phú Thọ', '2021-12-07 15:24:33', '2021-12-09 01:11:38'),
(92, 'nhattruong', 'nhattruong4jk@gmail.com', '912559fc96397c2f3b9bf3bbfcc94dab', '', 'avatar/default.jpg', 13, '', 0, 0, '', '2022-04-13 10:08:25', NULL),
(93, 'nhattruong', 'hanajhin38@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', 'avatar/default.jpg', 13, '', 0, 0, '', '2022-07-12 16:38:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warranties`
--

CREATE TABLE `warranties` (
  `warranty_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `reason` text NOT NULL,
  `phone_number` text NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warranties`
--

INSERT INTO `warranties` (`warranty_id`, `user_id`, `product_id`, `fullname`, `create_at`, `reason`, `phone_number`, `address`, `status`) VALUES
(27, 3, 3, 'Phùng Thành Trà', '2021-12-02 11:33:21', 'Bi xước mặt trước Bi xước mặt trước Bi xước mặt trước Bi xước mặt trước Bi xước mặt trước Bi xước mặt trước', '0526484988', 'Mê Linh Hà Nội', 1),
(28, 3, 4, 'Đặng Khải', '2021-12-02 16:05:20', 'Hỏng kim', '0962597441', 'Đoan Hùng Phú Thọ', 1),
(29, 75, 5, 'Nhật Trường', '2021-12-04 21:30:31', 'Bị sát ', '0962597441', 'Mê Linh Hà Nội', 1),
(30, 3, 37, 'đẶNG đÌNH kHẢI', '2021-12-06 18:44:01', 'Sát', '0962597441', 'Đoan Hùng Phú Thọ', 0),
(31, 75, 6, 'Phùng Thành Trà', '2021-12-07 14:39:55', 'Bị xước', '0526484988', 'Mê Linh Hà Nội', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `chat_content`
--
ALTER TABLE `chat_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`warranty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `chat_content`
--
ALTER TABLE `chat_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `warranties`
--
ALTER TABLE `warranties`
  MODIFY `warranty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_content`
--
ALTER TABLE `chat_content`
  ADD CONSTRAINT `chat_content_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chat` (`chat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
