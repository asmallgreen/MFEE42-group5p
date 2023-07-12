-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-07 18:43:53
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `bownet_db`;
USE `bownet_db`;

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(3) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `price` int(6) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `hours` int(6) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `teacher_id` int(6) NOT NULL,
  `discount_id` int(6) NOT NULL,
  `review_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `course`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

INSERT INTO `course` (`id`, `name`, `capacity`, `level`, `price`, `location`, `date`, `time`, `hours`, `schedule`, `qualification`, `target`, `intro`, `image`, `description`, `valid`, `teacher_id`, `discount_id`, `review_id`) VALUES
(1, '初探弓道(北)', 30, 1, 1600, '北道場', '2023-07-15', '09:00:00', 8, 'Schedule 1', '無', 'Target 1', 'Introduction 1', 'image1.jpg', 'Description 1', 1, 1, 1, 1),
(2, '初探弓道(中)', 30, 1, 1600, '中道場', '2023-07-20', '14:30:00', 8, 'Schedule 2', '無', 'Target 1', 'Introduction 1', 'image1.jpg', 'Description 1', 1, 2, 2, 2),
(3, '初探弓道(南)', 30, 1, 1600, '南道場', '2023-07-25', '18:00:00', 8, 'Schedule 3', '無', 'Target 1', 'Introduction 1', 'image1.jpg', 'Description 1', 1, 3, 3, 3),
(4, '弓道入門(北)', 15, 2, 8000, '北道場', '2023-07-30', '10:00:00', 36, 'Schedule 4', '學習過初探弓道者', 'Target 2', 'Introduction 2', 'image2.jpg', 'Description 2', 1, 4, 4, 4),
(5, '弓道入門(中)', 15, 2, 8000, '中道場', '2023-08-05', '15:30:00', 36, 'Schedule 5', '學習過初探弓道者', 'Target 2', 'Introduction 2', 'image2.jpg', 'Description 2', 1, 5, 5, 5),
(6, '弓道入門(南)', 15, 2, 8000, '南道場', '2023-08-10', '19:00:00', 36, 'Schedule 6', '學習過初探弓道者', 'Target 2', 'Introduction 2', 'image2.jpg', 'Description 2', 1, 6, 6, 6),
(7, '弓道進階(北)', 8, 3, 24000, '北道場', '2023-08-15', '11:00:00', 80, 'Schedule 7', '學習過弓道進階者', 'Target 3', 'Introduction 3', 'image3.jpg', 'Description 3', 1, 7, 7, 7),
(8, '弓道進階(中)', 8, 3, 24000, '中道場', '2023-08-20', '16:30:00', 80, 'Schedule 8', '學習過弓道進階者', 'Target 3', 'Introduction 3', 'image3.jpg', 'Description 3', 1, 8, 8, 8),
(9, '弓道進階(南)', 8, 3, 24000, '南道場', '2023-08-25', '20:00:00', 80, 'Schedule 9', '學習過弓道進階者', 'Target 3', 'Introduction 3', 'image3.jpg', 'Description 3', 1, 9, 9, 9);

COMMIT;
