-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-27 09:31:10
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `web03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL,
  `length` int(11) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `director` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rank` int(11) UNSIGNED NOT NULL,
  `sh` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(1, '片名1', 1, 120, '2022-01-26', '發行商1', '導演1', '03B01v.mp4', '03B01.png', '劇情介紹1劇情介紹1劇情介紹1', 1, 1),
(2, '片名2', 1, 110, '2022-01-26', '發行商2', '導演2', '03B02v.mp4', '03B02.png', '劇情介紹2劇情介紹2劇情介紹2', 2, 1),
(3, '片名3', 1, 110, '2022-01-25', '發行商3', '導演3', '03B03v.mp4', '03B03.png', '劇情介紹3劇情介紹3劇情介紹3', 3, 1),
(4, '片名4', 1, 150, '2022-01-25', '發行商4', '導演4', '03B04v.mp4', '03B04.png', '劇情介紹4劇情介紹4劇情介紹4', 4, 1),
(5, '片名5', 1, 180, '2022-01-22', '發行商5', '導演5', '03B05v.mp4', '03B05.png', '劇情介紹5劇情介紹5劇情介紹5', 5, 1),
(6, '片名6', 1, 110, '2022-01-25', '發行商6', '導演6', '03B06v.mp4', '03B06.png', '劇情介紹6劇情介紹6劇情介紹6', 6, 1),
(7, '片名7', 1, 120, '2022-01-25', '發行商7', '導演7', '03B07v.mp4', '03B07.png', '劇情介紹7劇情介紹7劇情介紹7', 7, 1),
(9, '片名9', 1, 130, '2022-01-25', '發行商9', '導演9', '03B09v.mp4', '03B09.png', '劇情介紹9劇情介紹9劇情介紹9', 9, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(11) UNSIGNED NOT NULL,
  `no` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `qt` int(1) UNSIGNED NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rank` int(11) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `ani` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `path`, `name`, `rank`, `sh`, `ani`) VALUES
(1, '03A01.jpg', '預告片1', 1, 1, 1),
(2, '03A02.jpg', '預告片2', 2, 1, 2),
(3, '03A03.jpg', '預告片3', 3, 1, 3),
(4, '03A04.jpg', '預告片4', 4, 1, 1),
(5, '03A05.jpg', '預告片5', 5, 1, 2),
(6, '03A06.jpg', '預告片6', 6, 1, 3),
(7, '03A07.jpg', '預告片7', 7, 1, 1),
(8, '03A08.jpg', '預告片8', 8, 0, 2),
(10, '03A09.jpg', '預告片9', 9, 0, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
