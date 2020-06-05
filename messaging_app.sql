-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 05, 2020 at 02:34 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messaging_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sent_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `reciver_id`, `msg`, `sent_time`) VALUES
(1, 9, 4, 'hi', '2020:06:05 13:56:56'),
(2, 9, 2, 'hi', '2020:06:05 13:58:24'),
(3, 9, 2, 'hi', '2020:06:05 13:59:09'),
(4, 9, 4, 'hi', '2020:06:05 14:01:34'),
(5, 5, 9, 'hi', '2020:06:05 14:12:00'),
(6, 5, 9, 'hi', '2020:06:05 14:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, 'POOJA', 'DONDE', 'dondepooja@gmail.com', '$2y$10$yEXj81UOBBst9nVirCjUPOD.fnFk.3/G7kBvYyyYpB7BlMrb7pmiS', 0),
(2, 'Priyanka', 'DONDE', 'donde.komal18@gmail.com', '$2y$10$mXEzfviowYj2wj5MHB8myeGvYtlU2Qwf4aj.eMbjj.tOSBt24.2lK', 0),
(3, 'kriya', 'DONDE', 'donde.1komal18@gmail.com', '$2y$10$4i.RaQ5AkfPGTxrMdWiuU.7ImLCsWUK3A4KD/BHNfFw5CZMzkiffy', 0),
(4, 'POOJA', 'DONDE', 'priyanka@prdxn.com', '$2y$10$eLILlSd0dh6lwjeJMpDUtOfwEDNwL6yyMSrMGX3Ze9wuO6t.RWvD2', 0),
(5, 'POOJA', 'DONDE', 'donde.pooja@gmail.com', '$2y$10$i.lcdGVdiNtjFPL0d8yqW.LEi.RwbyaugFocAF7D8oAtVv56XRsO2', 1),
(9, 'POOJA', 'DONDE', 'dondepriyanka15@gmail.com', '$2y$10$fyPIWweuAdliqsAsHH8nzuCWQBQ/w3wW7JiQu555/t3zgjUZbdpYO', 0),
(10, 'SUREKHA', 'DONDE', 'priyankaad@prdxn.com', '$2y$10$Wdnde5hmT1dz3d8BCmrnbOk2XC88Au1iVdpnrj9fSpeZVMEHIOFY6', 0),
(11, 'SUREKHA', 'DONDE', 'dondekooja@gmail.com', '$2y$10$B07WPUL6VLMGg5zBgJRjtuV7Krh.ABBhiZbMhhUddQvwiaPjHgmCu', 0),
(12, 'SUREKHA', 'DONDE', 'donde.kolmal18@gmail.com', '$2y$10$LvwlWkuFa0/7wYL3v.YfG.mGY0HaGrKzLHZGFwf0ZJ3tQKCdGPjii', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
