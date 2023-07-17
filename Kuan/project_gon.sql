-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-17 12:06:23
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project_gon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, '弓'),
(2, '箭'),
(3, '弦'),
(4, '衣著'),
(5, '配件');

-- --------------------------------------------------------

--
-- 資料表結構 `gon_order`
--

CREATE TABLE `gon_order` (
  `id` int(6) UNSIGNED NOT NULL,
  `product` int(3) NOT NULL COMMENT 'product_id',
  `user` int(6) UNSIGNED NOT NULL COMMENT 'user_id',
  `coupon` int(5) NOT NULL COMMENT 'coupon_id',
  `subtotal` int(9) UNSIGNED NOT NULL COMMENT 'price',
  `time` datetime NOT NULL,
  `valid` tinyint(2) NOT NULL COMMENT 'order_valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `inventory`
--

CREATE TABLE `inventory` (
  `id` int(6) UNSIGNED NOT NULL,
  `category` int(6) NOT NULL COMMENT 'product_category',
  `amount` int(5) UNSIGNED NOT NULL,
  `min_amount` int(4) UNSIGNED NOT NULL,
  `valid` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `inventory`
--

INSERT INTO `inventory` (`id`, `category`, `amount`, `min_amount`, `valid`) VALUES
(1, 3, 99, 50, 1),
(2, 1, 60, 5, 0),
(3, 1, 50, 10, 1),
(4, 2, 888, 100, 1),
(5, 4, 20, 1, 1),
(6, 4, 10, 1, 1),
(7, 5, 50, 2, 1),
(8, 5, 87, 64, 1),
(9, 5, 89, 64, 1),
(10, 1, 50, 15, 1),
(11, 2, 54, 18, 1),
(12, 2, 29, 7, 1),
(13, 1, 49, 16, 1),
(14, 1, 78, 59, 1),
(15, 1, 88, 13, 1),
(16, 1, 22, 0, 1),
(17, 3, 63, 0, 1),
(18, 3, 56, 0, 1),
(19, 2, 49, 0, 1),
(20, 2, 46, 15, 1),
(21, 4, 62, 15, 1),
(22, 5, 11, 1, 1),
(23, 5, 58, 1, 1),
(24, 5, 46, 4, 1),
(25, 5, 18, 0, 1),
(26, 1, 23, 3, 1),
(27, 1, 46, 12, 1),
(28, 2, 498, 20, 1),
(29, 2, 567, 123, 1),
(30, 5, 456, 154, 1),
(31, 5, 165, 16, 1),
(32, 5, 185, 56, 1),
(33, 5, 568, 26, 1),
(34, 5, 1568, 168, 1),
(35, 5, 1658, 59, 1),
(36, 2, 189, 25, 1),
(37, 1, 50, 5, 1),
(38, 1, 3, 1, 1),
(39, 1, 20, 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `category_id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `valid` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `valid`) VALUES
(1, 3, '&lt;script&gt;alert(&#039;雞雞攻擊&#039;);&lt;/script&', 1),
(2, 1, '反曲弓', 1),
(3, 1, '碳纖弓', 1),
(4, 2, '火雞毛箭', 1),
(5, 4, '黑色大衣', 1),
(6, 4, 'T-shirt', 1),
(7, 5, '石灰粉', 1),
(8, 5, '黑色石灰粉', 1),
(9, 5, '腰帶', 1),
(10, 1, '複合弓', 1),
(11, 2, '鴨毛箭', 1),
(12, 2, '鵝毛箭', 1),
(13, 1, '太弓', 1),
(14, 1, '小太弓', 1),
(15, 1, '大太弓', 1),
(16, 1, '白色弓', 1),
(17, 3, '鋼琴弦', 1),
(18, 3, '弓箭的弦', 1),
(19, 2, '鳥毛箭', 1),
(20, 2, '孔雀羽毛箭', 1),
(21, 4, '馬褂', 1),
(22, 5, '皮帶', 1),
(23, 5, '綁帶', 1),
(24, 5, '力量藥水', 1),
(25, 5, '速度藥水', 1),
(26, 1, '超級大弓弓', 1),
(27, 1, '弓三小', 1),
(28, 2, '范箭', 1),
(29, 2, '好大的箭', 1),
(30, 5, '大象腰帶', 1),
(31, 5, '箭袋', 1),
(32, 5, '螞蟻腰帶', 1),
(33, 5, '裝箭的袋', 1),
(34, 5, '好用的腰帶', 1),
(35, 5, '94配件', 1),
(36, 2, '拿著雞毛當令箭', 1),
(37, 1, '&lt;script&gt;alert(&#039;雞雞攻擊&#039;);&lt;/script&', 1),
(38, 1, '弓尛', 1),
(39, 1, '弓G人', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `gon_order`
--
ALTER TABLE `gon_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `gon_order`
--
ALTER TABLE `gon_order`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
