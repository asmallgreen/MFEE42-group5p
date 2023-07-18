-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-18 15:20:14
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
-- 資料庫： `kyudo_teacher`
--

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `info` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `designation`, `info`, `phone`, `email`, `img`, `gender`, `valid`) VALUES
(1, '蔡理臣', '教士七段', '正射必中', '0956206862', 'chester40505@gmail.com', 'S__463052831.jpg', 'male', 1),
(2, '劉秉政', '鍊士五段', '大家好 我是劉老師', '0965154756', 'peter@test.com', 'dtd_prism_advent_of_thrones.jpg', 'male', 1),
(3, '翁孟晴', '鍊士五段', '大家好 我是猛禽學姊', '0936562856', 'ccs9431777@gmail.com', 'S__463052832.jpg', 'female', 1),
(4, '黃博堯', '四段', '真  善  美', '0958478623', 'chester40505@gmail.com', 'S__463052831.jpg', 'male', 1),
(5, '小花', '三段', '嗨 我是小花', '0977548623', 'test@test.com', '49948560_2282086838470111_4768964340667645952_n.jpg', 'female', 1),
(6, '冰淇淋', '初段', '我愛冰淇淋', '0966325684', 'test@test.com', '49694585_777097729323119_341524602398179328_n.jpg', 'male', 1),
(7, '戴俊倫', '鍊士五段', '日本修行中！', '0933567865', 'cjejdkd@gmail.com', '5b87c47871161.jpg', 'male', 1),
(8, '徐芊芊', '四段', '安安', '0956206862', 'chester40505@gmail.com', 'DrdsvzNU8AEU7Gp.jpg', 'female', 1),
(9, '佐佐木三郎', '四段', '安安', '0956206862', 'chester40505@gmail.com', '光嚼.gif', 'male', 1),
(10, '里見左伯子', '四段', '安安', '0956206862', 'chester40505@gmail.com', '21738149224834_567_m.jpg', 'female', 1),
(11, '藤原孝也', '四段', '安安', '0956206862', 'chester40505@gmail.com', '47997.jpg', 'male', 1),
(12, '北城理世', '四段', '安安', '0956206862', 'peter@test.com', '', 'male', 1),
(13, '武見妙', '四段', '安安', '0956206862', 'ccs9431777@gmail.com', '', 'female', 1),
(14, '飯島一二三', '四段', '安安', '0956206862', 'ccs9431777@gmail.com', '', 'male', 1),
(15, '生田花子', '鍊士五段', '安安', '0956206862', 'ccs9431777@gmail.com', '', 'female', 1),
(16, 'Li-Chan Tasi', '四段', '大帥哥', '0956206862', 'ccs9431777@gmail.com', '', 'male', 1),
(17, 'May', '教士七段', '安安', '0956206862', 'lyon911017@gmail.com', '', 'female', 1),
(18, 'Amilia', '四段', '安安', '0956206862', 'lyon911017@gmail.com', '', 'female', 1),
(19, 'Cindy', '四段', '安安', '0956206862', 'lyon911017@gmail.com', '', 'female', 1),
(20, 'Denny', '四段', '安安', '0956206862', 'chester40505@gmail.com', '', 'male', 1),
(21, '暖暖', '三段', '我愛暖暖', '0951225486', 'test@test.com', '', 'male', 1),
(22, '小菊', '初段', '弓道初心者', '0978452612', 'test@test.com', '', 'female', 1),
(23, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(24, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(25, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(26, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(27, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(28, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(29, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(30, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(31, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(32, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(33, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(34, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(35, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(36, '', '', '', '', '', 'S__463052832.jpg', 'male', 0),
(37, 'Chester', '二段', '新手', '0985456258', 'test@test.com', '', 'male', 1),
(38, 'Li-Chan Tasi', '四段', '123', '0586', 'peter@test.com', '', 'male', 0),
(39, 'Li-Chan Tasi', '初段', '123', '0956206862', 'ccs9431777@gmail.com', '', 'female', 1),
(40, 'Li-Chan Tasi', '三段', '123', '0956206862', 'peter@test.com', '', 'female', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
