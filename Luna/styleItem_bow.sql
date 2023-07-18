-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 18 日 15:06
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
-- 資料庫： `my_test_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `styleItem_bow`
--

CREATE TABLE `styleItem_bow` (
  `id` int(3) NOT NULL,
  `style` int(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `styleItem_bow`
--

INSERT INTO `styleItem_bow` (`id`, `style`, `name`) VALUES
(1, 1, '並寸'),
(2, 1, '二寸伸'),
(3, 1, '四寸伸'),
(4, 1, '六寸伸'),
(5, 2, '23'),
(6, 2, '24'),
(7, 2, '25'),
(8, 2, '26'),
(9, 2, '27'),
(10, 2, '28'),
(11, 4, '一號'),
(12, 4, '二號'),
(13, 4, '三號'),
(14, 5, '1913'),
(15, 5, '2014'),
(16, 5, '2015'),
(17, 5, '2115'),
(18, 5, '2117'),
(19, 6, '黑色'),
(20, 6, '白色'),
(21, 3, '21'),
(22, 3, '22'),
(23, 3, '23'),
(24, 3, '24'),
(25, 3, '25'),
(26, 3, '26'),
(27, 3, '27'),
(28, 3, '28'),
(29, 7, '木'),
(30, 7, '竹'),
(31, 7, '塑膠'),
(32, 8, '3'),
(33, 8, '4'),
(34, 8, '5'),
(35, 8, '6'),
(36, 8, '7'),
(37, 8, '8');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `styleItem_bow`
--
ALTER TABLE `styleItem_bow`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `styleItem_bow`
--
ALTER TABLE `styleItem_bow`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
