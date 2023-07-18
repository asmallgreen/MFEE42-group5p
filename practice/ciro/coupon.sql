-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-18 10:57:16
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
-- 資料庫： `bow`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(6) UNSIGNED NOT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `discount` decimal(3,1) UNSIGNED NOT NULL,
  `level` tinyint(2) UNSIGNED NOT NULL,
  `startdate` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `valid` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `discount`, `level`, `startdate`, `deadline`, `valid`) VALUES
(1, 'VIP111', 0.9, 1, '2023-07-01', '2023-07-31', 1),
(2, 'VIP222', 0.8, 2, '2023-07-01', '2023-08-31', 1),
(3, 'VIP1010000', 0.7, 2, '2023-07-01', '2023-09-30', 1),
(4, 'VIP444', 0.6, 3, '2023-07-01', '2023-08-31', 1),
(5, 'vip777', 0.3, 8, '2023-07-01', '2023-07-31', 1),
(6, 'vip999', 0.1, 10, '2023-07-01', '2023-07-31', 0),
(7, 'VIP12334', 0.1, 10, '2023-07-01', '2023-07-30', 0),
(8, 'vip1234345', 0.0, 9, '2023-07-01', '2023-07-31', 0),
(9, 'vip9988898', 0.1, 10, '2023-07-01', '2023-07-31', 1),
(10, 'test01', 0.0, 10, '2023-07-01', '2023-07-31', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
