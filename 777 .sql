-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 02:47 AM
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
(29, 6, 9, '2017-07-10 06:39:38', '2017-07-10 06:39:38'),
(30, 6, 8, '2017-07-10 06:45:58', '2017-07-10 06:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `game_1_data`
--

CREATE TABLE `game_1_data` (
  `id` int(11) NOT NULL,
  `recordID` int(11) NOT NULL,
  `record_1` int(11) DEFAULT '0',
  `record_2` int(11) DEFAULT '0',
  `record_3` int(11) DEFAULT '0',
  `record_4` int(11) DEFAULT '0',
  `record_5` int(11) DEFAULT '0',
  `success` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_1_data`
--

INSERT INTO `game_1_data` (`id`, `recordID`, `record_1`, `record_2`, `record_3`, `record_4`, `record_5`, `success`) VALUES
(2, 17, 41, 42, 43, 50, 0, 1),
(6, 21, 50, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_1_record`
--

CREATE TABLE `game_1_record` (
  `recordID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `playDate` date NOT NULL,
  `playTime` time NOT NULL,
  `token` int(11) NOT NULL DEFAULT '1',
  `min_value` int(11) NOT NULL DEFAULT '1',
  `max_value` int(11) NOT NULL DEFAULT '99',
  `playingNow` int(11) NOT NULL DEFAULT '0',
  `ans` int(11) NOT NULL,
  `usedTime` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_1_record`
--

INSERT INTO `game_1_record` (`recordID`, `userID`, `playDate`, `playTime`, `token`, `min_value`, `max_value`, `playingNow`, `ans`, `usedTime`) VALUES
(17, 8, '2017-07-10', '16:38:57', 0, 43, 99, 50, 50, 4),
(21, 8, '2017-07-11', '10:28:02', 0, 1, 99, 50, 50, 1);

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
(114, 1, 7, 5, 9, 1, '1'),
(115, 1, 2, 3, 9, 2, '1'),
(116, 1, 7, 2, 9, 3, '1'),
(117, 4, 2, 3, 9, 4, '1'),
(118, 3, 3, 5, 9, 5, '1'),
(119, 7, 1, 3, 9, 6, '1'),
(120, 1, 2, 3, 8, 1, '1'),
(121, 5, 1, 7, 8, 2, '1'),
(122, 1, 4, 3, 8, 3, '1'),
(123, 1, 3, 5, 8, 4, '1'),
(124, 4, 4, 5, 8, 5, '1'),
(125, 2, 1, 1, 8, 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `game_id` varchar(10) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `price`, `game_id`, `status`, `userid`, `createtime`) VALUES
(86, 2, 'A1', 3, 9, '2017-07-10 06:40:08'),
(87, 2, 'A1', 3, 8, '2017-07-10 06:46:31'),
(92, 10, 'B1', 1, 8, '2017-07-11 02:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `sg_game_reward_balance`
--

CREATE TABLE `sg_game_reward_balance` (
  `sg_reward_id` int(11) NOT NULL,
  `sg_reward_name` varchar(50) NOT NULL,
  `sg_balance` int(10) NOT NULL,
  `sg_positive_balance` int(10) NOT NULL,
  `sg_negative_balance` int(10) NOT NULL,
  `in_charge_admin_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sg_game_reward_balance`
--

INSERT INTO `sg_game_reward_balance` (`sg_reward_id`, `sg_reward_name`, `sg_balance`, `sg_positive_balance`, `sg_negative_balance`, `in_charge_admin_id`) VALUES
(1, 'Guessing Real Number(in between 1 - 99)', 2590, 2600, 10, 1);

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
-- Indexes for table `game_1_data`
--
ALTER TABLE `game_1_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_1_record`
--
ALTER TABLE `game_1_record`
  ADD PRIMARY KEY (`recordID`);

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
-- Indexes for table `sg_game_reward_balance`
--
ALTER TABLE `sg_game_reward_balance`
  ADD PRIMARY KEY (`sg_reward_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `game_1_data`
--
ALTER TABLE `game_1_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `game_1_record`
--
ALTER TABLE `game_1_record`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `sg_game_reward_balance`
--
ALTER TABLE `sg_game_reward_balance`
  MODIFY `sg_reward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `radom_0` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2017-06-30 00:00:00' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'update random to 0' DO UPDATE random SET token = '0'$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
