-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-19 13:09:56
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
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(3) UNSIGNED NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `price` int(6) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time NOT NULL,
  `endTime` time DEFAULT NULL,
  `hours` int(6) UNSIGNED NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `valid` enum('0','1') NOT NULL,
  `is_deleted` enum('0','1') NOT NULL,
  `teacher_id` int(6) NOT NULL,
  `discount_id` int(6) NOT NULL,
  `review_id` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`id`, `name`, `capacity`, `level`, `price`, `location`, `startDate`, `endDate`, `startTime`, `endTime`, `hours`, `schedule`, `qualification`, `target`, `intro`, `image`, `description`, `valid`, `is_deleted`, `teacher_id`, `discount_id`, `review_id`, `created_at`) VALUES
(1, '初探弓道(北)', 30, '1', 1600, '北道場', '2023-07-15', '2023-07-18', '12:30:00', '14:30:00', 8, '', '', '', '', NULL, '', '', '0', 0, 0, 0, '2023-07-18 21:33:22'),
(2, '初探弓道(中)', 30, '1', 1600, '中道場', '2023-07-20', '2023-07-23', '14:30:00', '16:30:00', 8, '', '', '', '', '../images/course-image1.png', 'Description 1', '0', '0', 1, 0, 2, '2023-07-14 11:21:07'),
(3, '初探弓道(南)', 30, '1', 1600, '南道場', '2023-07-25', '2023-07-28', '18:00:00', '20:00:00', 8, '', '', '', '', '../images/tw.sonet.princessconnect_Screenshot_2021.11.03_18.22.03.png', 'Description 1', '0', '0', 3, 0, 3, '2023-07-14 11:21:07'),
(4, '弓道入門(北)', 15, '2', 8000, '北道場', '2023-07-30', '2023-08-29', '10:00:00', '12:00:00', 36, '', '', '', '', '../images/course-image2.jpg', 'Description 2', '0', '0', 4, 0, 4, '2023-07-14 11:21:07'),
(5, '弓道入門(中)', 15, '2', 8000, '中道場', '2023-08-05', '2023-09-04', '15:30:00', '17:30:00', 36, '', '', '', '', '../images/course-image2.jpg', 'Description 2', '0', '0', 5, 0, 5, '2023-07-14 11:21:07'),
(6, '弓道入門(南)', 15, '3', 8000, '南道場', '2023-08-10', '2023-09-09', '19:00:00', '21:00:00', 36, 'Schedule 6', '學習過初探弓道者', 'Target 2', 'Introduction 2', '../images/course-image2.jpg', 'Description 2', '0', '0', 6, 6, 6, '2023-07-14 11:21:07'),
(7, '弓道進階(北)', 8, '3', 24000, '北道場', '2023-08-15', '2024-02-11', '11:00:00', '13:00:00', 80, 'Schedule 7', '學習過弓道進階者', 'Target 3', 'Introduction 3', '../images/course-image3.jpg', 'Description 3', '0', '0', 7, 7, 7, '2023-07-14 11:21:07'),
(8, '弓道進階(中)', 8, '3', 24000, '中道場', '2023-08-20', '2024-02-19', '16:30:00', '18:30:00', 80, 'Schedule 8', '學習過弓道進階者', 'Target 3', 'Introduction 3', '../images/course-image3.jpg', 'Description 3', '0', '0', 8, 8, 8, '2023-07-14 11:21:07'),
(9, '弓道進階(南)', 8, '1', 24000, '南道場', '2023-08-25', '2024-02-14', '20:00:00', '22:00:00', 80, '', '', '', '', '../images/course-image3.jpg', 'Description 3', '0', '0', 0, 0, 9, '2023-07-14 11:21:07'),
(74, '共學弓坊(北)', 16, '3', 4000, '北道場', '2023-07-20', '2023-10-19', '09:00:00', '11:59:00', 24, '', '', '', '', '../images/tw.sonet.princessconnect_Screenshot_2021.11.03_18.22.03.png', 'description-ex', '0', '0', 0, 0, 0, '2023-07-18 18:27:20'),
(76, '', 0, '', 0, '', '0000-00-00', NULL, '00:00:00', NULL, 0, '', '', '', '', NULL, '', '', '', 0, 0, 0, '2023-07-18 21:41:14');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
