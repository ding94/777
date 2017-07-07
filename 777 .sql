-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 06:09 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `777`
--

-- --------------------------------------------------------

--
-- Table structure for table `chance`
--

CREATE TABLE `chance` (
  `id` int(11) NOT NULL,
  `chance` int(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `createtime` timestamp NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chance`
--

INSERT INTO `chance` (`id`, `chance`, `userid`, `createtime`, `updatetime`) VALUES
(31, 6, 9, '2017-07-07 02:42:10', '2017-07-07 02:42:10'),
(30, 6, 8, '2017-07-07 02:33:26', '2017-07-07 02:33:26'),
(29, 6, 8, '2017-07-06 03:35:31', '2017-07-06 03:35:31'),
(28, 4, 11, '2017-07-05 04:28:16', '2017-07-05 04:28:16'),
(27, 6, 8, '2017-07-05 03:37:51', '2017-07-05 03:37:51'),
(26, 6, 24, '2017-07-05 03:03:23', '2017-07-05 03:03:23'),
(25, 2, 24, '2017-07-04 01:39:23', '2017-07-04 01:39:24'),
(24, 6, 24, '2017-07-03 10:03:55', '2017-07-03 10:03:55'),
(23, 6, 13, '2017-07-03 02:01:51', '2017-07-03 02:01:51'),
(22, 6, 8, '2017-07-03 01:49:50', '2017-07-03 01:49:50'),
(21, 2, 15, '2017-06-30 08:17:34', '2017-06-30 07:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE `random` (
  `id` int(11) NOT NULL,
  `fnum` int(2) NOT NULL,
  `snum` int(2) NOT NULL,
  `tnum` int(2) NOT NULL,
  `userid` int(11) NOT NULL,
  `chance` int(11) NOT NULL,
  `token` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`id`, `fnum`, `snum`, `tnum`, `userid`, `chance`, `token`) VALUES
(119, 5, 2, 3, 9, 6, '1'),
(118, 7, 2, 7, 9, 5, '1'),
(117, 2, 5, 4, 9, 4, '1'),
(116, 1, 7, 5, 9, 3, '1'),
(115, 2, 2, 4, 9, 2, '1'),
(114, 2, 7, 3, 9, 1, '1'),
(113, 2, 3, 7, 11, 1, '0'),
(112, 5, 3, 1, 11, 2, '0'),
(111, 2, 3, 7, 11, 3, '0'),
(110, 5, 2, 1, 11, 4, '0'),
(109, 7, 7, 4, 11, 5, '0'),
(108, 2, 7, 5, 11, 6, '0'),
(107, 1, 3, 5, 24, 1, '0'),
(106, 2, 4, 3, 24, 2, '0'),
(105, 7, 2, 3, 24, 3, '0'),
(104, 1, 7, 2, 24, 4, '0'),
(103, 4, 7, 5, 24, 5, '0'),
(102, 2, 5, 1, 24, 6, '0'),
(101, 5, 5, 3, 13, 1, '0'),
(100, 1, 5, 5, 13, 2, '0'),
(99, 4, 4, 1, 13, 3, '0'),
(98, 3, 5, 2, 13, 4, '0'),
(97, 7, 5, 4, 13, 5, '0'),
(96, 7, 2, 5, 13, 6, '0'),
(95, 5, 2, 1, 8, 1, '1'),
(94, 4, 2, 7, 8, 2, '1'),
(93, 4, 7, 3, 8, 3, '1'),
(92, 2, 5, 4, 8, 4, '1'),
(91, 2, 4, 3, 8, 5, '1'),
(90, 5, 1, 4, 8, 6, '1'),
(89, 2, 2, 4, 15, 1, '0'),
(88, 2, 2, 2, 15, 2, '0'),
(87, 2, 2, 1, 15, 3, '0'),
(86, 7, 7, 7, 15, 4, '0'),
(85, 7, 4, 2, 15, 5, '0'),
(84, 2, 2, 2, 15, 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `price`, `status`, `userid`, `createtime`) VALUES
(82, 2, 1, 13, '2017-07-03 05:35:00'),
(81, 2, 1, 13, '2017-07-03 05:34:53'),
(83, 2, 1, 24, '2017-07-03 10:04:22'),
(80, 2, 1, 13, '2017-07-03 05:34:45'),
(79, 2, 1, 13, '2017-07-03 03:20:06'),
(78, 2, 1, 13, '2017-07-03 02:02:58'),
(77, 5, 2, 8, '2017-07-03 01:51:42'),
(76, 2, 1, 15, '2017-06-30 09:23:22'),
(84, 2, 1, 24, '2017-07-05 03:05:31'),
(85, 2, 1, 24, '2017-07-05 03:05:46'),
(86, 10, 1, 24, '2017-07-05 03:07:02'),
(87, 2, 1, 8, '2017-07-05 03:38:00'),
(88, 2, 1, 8, '2017-07-05 04:05:49'),
(89, 2, 1, 8, '2017-07-05 04:07:57'),
(90, 2, 1, 11, '2017-07-05 04:28:17'),
(91, 2, 1, 11, '2017-07-05 06:25:00'),
(92, 2, 1, 11, '2017-07-05 06:27:37'),
(93, 2, 1, 11, '2017-07-05 06:28:42'),
(94, 2, 1, 9, '2017-07-07 02:42:20'),
(95, 2, 1, 9, '2017-07-07 02:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `password_hash` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password_reset_token` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(8, 'aaa', 'koKSJ59GhrrbBZbxFLlaTrGHXpiaIxxQ', '$2y$13$S82OoQ5VX5xIJ5WZKP2Vr.3Rquvpao0xzgn7k/AaUO3FGYL6l3lOi', NULL, 'aaa@hotmail.com', 10, 1497942758, 1497942758),
(9, 'bbb', 'xbgjoKQf0dPN7PMj6sp2MWwqKkcz4mlB', '$2y$13$f5ydgkHTJyGdVJeklSlTm.6Gc3JIxnw7gTGvd6/6Uy9lRjhhzPoVu', NULL, 'bbb@hotmail.com', 10, 1498035547, 1498035547),
(10, 'ccc', 'sGvYHcJTGSkG0Z2yksI3uWbEjsy6Osc4', '$2y$13$8K/vfUXwPehyptgqhhAo0OQ5zxhRYlAqgvlLmLcIR4B64is/.e7z.', NULL, 'ccc@hotmail.com', 10, 1498035577, 1498035577),
(11, 'ddd', 'gfmqvRtlJSqFxaIH6cWQz7t5XsltsqOS', '$2y$13$gh.zX6o.PdgaxLCHoQ.nXeW7ySumy0gYAfnoGWrXOqgYSi4TFpYo6', NULL, 'ddd@hotmail.com', 10, 1498035601, 1498035601),
(12, 'eee', 'O2TaKlPw1BXg7Wsp0kQ4cPmEafNv76t2', '$2y$13$/cnTQbkwlRh5qh1mwu9FdujkUBqTm4HaKVN0d2u7Ww0A.9HXc.nJu', NULL, 'eee@hotmail.com', 10, 1498035620, 1498035620),
(13, 'fff', 'SJG5jQdb-g2O24McEH9L-ENUe0i_VVYE', '$2y$13$sk7/.iN9d2UT6OAw5zhApuumYQ.Z9IdrRL.IPP3KD0kisycV4NzlS', NULL, 'fff@hotmail.com', 10, 1498035632, 1498035632),
(14, 'ggg', 'FajeAJB9kjSv5KEHgWzwBhvmmJ0Kh65o', '$2y$13$IA7qLC8GUIULurw7XBseSOejvAEmCk2rqkDni2DbwojNJ0C1Jar2a', NULL, 'ggg@hotmail.com', 10, 1498035689, 1498035689),
(15, 'hhh', 'uGyRFw7SkuCJpuQlvVyOlvahCZ3rdGcQ', '$2y$13$WM2TXHsajVePR0guYW5Kl./LluCJ4Xk6JazXdgh09jnPUqJXZM71.', NULL, 'hhh@hotmail.com', 10, 1498035709, 1498035709),
(16, 'iii', '7RvZ4G42PIpL5AbVUrSxCFSKkVSgf2pY', '$2y$13$BIjHio/zAUuJ9NsYmGw.vOYunTvdyXf80lwd6Z4ahDjsN5aRQRsGe', NULL, 'iii@hotmail.com', 10, 1498035739, 1498035739),
(17, 'jjj', 'OiFcRhOrTxCP2CtUj4NBeZq4JtcKgESG', '$2y$13$Adyx6fUTUBP37UMO6ob3p.BYDGYjcxomx9Q6y5fYxaUXi/iiQQvIq', NULL, 'jjj@hotmail.com', 10, 1498035758, 1498035758),
(18, 'kkk', '8SifsuzPaI-MbdxwABG6zKM-8Dg_N-OG', '$2y$13$SFkKTmLjA64ovCDH/hDANed4z8sowpkwnMqojEqIE9Kqwa9fgDOuq', NULL, 'kkk@hotmail.com', 10, 1498035783, 1498035783),
(19, 'lll', 'tRdHypL3jjzUjcGqoztJSMBH9vPO3ubW', '$2y$13$FFUYrrGISrVN4opONplliuMttMqWEGDebLd5zjGGvZkvTDghcU1Jq', NULL, 'lll@hotmail.com', 10, 1498035806, 1498035806),
(20, 'mmm', '-CX3v5mIEWeIRIV1fm21yrybTaS6Xzpi', '$2y$13$Kd2cHNyIob3RyHMlQJnRKurE2GLcnR5hMoTti2pIE6lkLAm4zl3dO', NULL, 'mmm@hotmail.com', 10, 1498035857, 1498035857),
(21, 'nnn', 'EvfN2CEwlGOEjVfUgnl1qBkAZZZUHdxu', '$2y$13$gu718FdbNedsSExgx0f1N.nKf7qlVAbdQKgs7qAVRv92vqYRmKSJq', NULL, 'nnn@hotmail.com', 10, 1498035900, 1498035900),
(22, 'ooo', 'F39xhUZcrgWMv_CNBYmjDubPIqoX2UUD', '$2y$13$fZJXrE9dIsluc67a4xzBwuvqfeh29sFLpE1BixheOfbQV4KOj.8we', NULL, 'ooo@hotmail.com', 10, 1498036002, 1498036002),
(23, 'ppp', 'X8KTIpxDy9r2JoIRPnDQL8hohzcOnakV', '$2y$13$TUqC9xfZLBLssy9pKttULOsibNu9.UxsN99qnngPIv83wLZNDB2dC', NULL, 'ppp@hotmail.com', 10, 1498036033, 1498036033),
(24, 'qqq', 'AtMjVsUEytZZdMjy1Yapyj-eDG3zj6py', '$2y$13$pTiQfGatjWHgYSRPpDEMEOCzDfI6DhqP2Fc5/ofA3ylt/Z1M7hDdC', NULL, 'qqq@hotmail.com', 10, 1498529319, 1498529319);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chance`
--
ALTER TABLE `chance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `random`
--
ALTER TABLE `random`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `auth_key` (`auth_key`),
  ADD UNIQUE KEY `password_hash` (`password_hash`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chance`
--
ALTER TABLE `chance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `radom_0` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2017-07-04 09:38:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'update random to 0' DO UPDATE random SET token = '0'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;