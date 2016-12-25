-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-22 10:31:35
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `se`
--

-- --------------------------------------------------------

--
-- 資料表結構 `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'free',
  `expired_date` datetime DEFAULT NULL,
  `product` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_cost` bigint(20) DEFAULT NULL,
  `machine_num` int(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `machine`
--

INSERT INTO `machine` (`machine_id`, `user_id`, `status`, `expired_date`, `product`, `product_cost`, `machine_num`) VALUES
(1, 5, 'free', '2016-12-16 20:26:55', '', NULL, 1),
(2, 45545, 'free', '2016-12-02 07:12:32', NULL, NULL, 1),
(3, 5, 'free', '2016-12-18 16:04:49', '', NULL, 2),
(5, 0, 'free', '2016-12-02 13:58:24', NULL, NULL, 1),
(6, 9, 'free', '2016-12-02 14:06:55', NULL, NULL, 1),
(7, 5, 'free', '2016-12-20 21:26:50', '', NULL, 3),
(8, 5, 'free', '2016-12-18 15:46:39', '', NULL, 4),
(9, 5, 'free', '2016-12-18 15:46:44', '', NULL, 5),
(10, 5, 'free', '2016-12-16 09:17:18', NULL, NULL, 6),
(11, 10, 'free', '2016-12-16 13:43:33', NULL, NULL, 1),
(12, 9, 'free', '2016-12-17 07:14:13', NULL, NULL, 1),
(13, 12, 'free', '2016-12-17 14:27:47', '', NULL, 1),
(14, 12, 'free', '2016-12-17 14:29:04', '', NULL, 2),
(15, 5, 'free', '2016-12-18 09:05:44', NULL, NULL, 7),
(16, 5, 'free', '2016-12-18 09:05:48', NULL, NULL, 8),
(17, 5, 'free', '2016-12-18 09:16:21', NULL, NULL, 9),
(18, 5, 'free', '2016-12-18 09:22:10', NULL, NULL, 10),
(19, 12, 'free', '2016-12-20 12:43:43', NULL, NULL, 1),
(20, 12, 'free', '2016-12-20 12:44:48', NULL, NULL, 1),
(21, 15, 'free', '2016-12-20 12:50:07', NULL, NULL, 1),
(22, 16, 'free', '2016-12-20 12:50:39', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_ingredient`
--

CREATE TABLE `user_ingredient` (
  `ing_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `egg` bigint(20) NOT NULL DEFAULT '10',
  `flour` bigint(20) NOT NULL DEFAULT '100',
  `cheese` bigint(20) NOT NULL DEFAULT '10',
  `cream` bigint(20) NOT NULL DEFAULT '100',
  `sugar` bigint(20) NOT NULL DEFAULT '10',
  `milk` bigint(20) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user_ingredient`
--

INSERT INTO `user_ingredient` (`ing_id`, `user_id`, `egg`, `flour`, `cheese`, `cream`, `sugar`, `milk`) VALUES
(10, 5, 41, 350, 100, 600, 30, 550),
(11, 9, 10, 100, 10, 100, 10, 100),
(12, 12, 3, 350, 20, 600, 10, 50),
(13, 12, 10, 100, 10, 100, 10, 100),
(14, 12, 10, 100, 10, 100, 10, 100),
(15, 15, 10, 100, 10, 100, 10, 100),
(16, 16, 10, 100, 10, 100, 10, 100);

-- --------------------------------------------------------

--
-- 資料表結構 `user_list`
--

CREATE TABLE `user_list` (
  `uid` int(11) NOT NULL,
  `id_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` int(100) NOT NULL,
  `level` int(100) NOT NULL,
  `money` bigint(20) NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `exp_limit` bigint(20) NOT NULL DEFAULT '3',
  `exp_now` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user_list`
--

INSERT INTO `user_list` (`uid`, `id_name`, `password`, `level`, `money`, `nickname`, `picture`, `exp_limit`, `exp_now`) VALUES
(5, 'cheaw0723', 1234, 11, 1752, '崇浩', NULL, 30, 21),
(12, 'test', 1234, 3, 779, 'hi', NULL, 9, 2),
(13, 'test', 1234, 1, 1000, '1234', NULL, 3, 0),
(14, 'test', 1234, 1, 1000, '1234', NULL, 3, 0),
(15, 'cheaw0724', 1234, 1, 1000, '1234', NULL, 3, 0),
(16, 'cheaw', 1111, 1, 1000, '1111', NULL, 3, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- 資料表索引 `user_ingredient`
--
ALTER TABLE `user_ingredient`
  ADD PRIMARY KEY (`ing_id`);

--
-- 資料表索引 `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`uid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用資料表 AUTO_INCREMENT `user_ingredient`
--
ALTER TABLE `user_ingredient`
  MODIFY `ing_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用資料表 AUTO_INCREMENT `user_list`
--
ALTER TABLE `user_list`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
