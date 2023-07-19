-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 07 月 19 日 09:38
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
-- 資料表結構 `item_bow`
--

CREATE TABLE `item_bow` (
  `id` int(3) NOT NULL,
  `category` int(3) NOT NULL,
  `style` int(3) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `item_bow`
--

INSERT INTO `item_bow` (`id`, `category`, `style`, `name`) VALUES
(1, 1, 1, '竹弓'),
(2, 1, 1, '合成弓'),
(3, 2, 5, '竹箭'),
(4, 2, 5, '合成箭'),
(5, 3, 4, '麻弦'),
(6, 3, 4, '合成弦'),
(7, 4, 8, '手套'),
(8, 4, 6, '道服'),
(9, 4, 6, '胸擋'),
(10, 4, 6, '和服'),
(11, 4, 6, '腰帶'),
(12, 4, 3, '褲子'),
(13, 4, 2, '襪子'),
(14, 5, 6, '矢尻'),
(15, 5, 7, '箭筒'),
(16, 5, 6, '弦卷'),
(17, 5, 7, '粉末容器');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `item_bow`
--
ALTER TABLE `item_bow`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item_bow`
--
ALTER TABLE `item_bow`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
