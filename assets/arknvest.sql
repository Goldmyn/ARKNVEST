-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 05:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taai`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `portfolio` varchar(255) NOT NULL DEFAULT '0.000',
  `countdown` varchar(255) NOT NULL DEFAULT '30',
  `profit` varchar(255) NOT NULL DEFAULT '0',
  `profit_amount` varchar(255) NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `created_at`, `portfolio`, `countdown`, `profit`, `profit_amount`) VALUES
(1, 'Asdafah', 'asda', '$2y$10$ZVI514IvzVLHrzDXgLcRlOJ7SQ.sA3ouW3FfdRNx6GIwEoPDJbjFO', '2022-08-30 01:54:19', '70,000', '20', '20%', '14,000'),
(2, 'Jay', 'jayecho', '$2y$10$Ao2ULAkLEdVuv9mALONS9.d.kgsnMfXV1aX/lz9J3tcPfxQhWJQmi', '2022-08-30 04:39:24', '200,000', '25', '30%', '60,000'),
(3, 'Taai', 'Admin', '$2y$10$uzeg3kyT30VQ5y4FbNU28ehlA1ZgH6V1L4IlvA16/j8Vst9nnUzn2', '2022-08-30 13:23:32', '1,000,000', '18', '40%', '400,000'),
(4, 'Wade ', 'wayne', '$2y$10$37prsB0ORhdKQyjroOqIM./Ae9h7JjdNqSfCvB7VegAUdjdPTAJM2', '2022-09-13 03:36:43', '2,020,999', '12', '50%', '1,010,450'),
(5, '', 'David', '$2y$10$7ogshcIwJ2hn.qdicWZNVOLQMQihH7hvqOYmP4p6pFf1f1rD5VW0O', '2022-09-14 23:29:08', '', '', '', ''),
(6, 'Jonny', 'Jonny', '$2y$10$nxdfoVz5DesVpJAc7OTVr.Ly814A2n/HdIEOlGGNRV/zS2L.Nf4nG', '2022-09-14 23:54:11', '', '', '', ''),
(7, 'don bon', 'don', '$2y$10$h7EU0/hjr.4RU9zfB3YQmOiuyTH9DOLyX0q8iTKBaT9p.2lmCj0aq', '2022-09-15 00:10:29', '', '', '', ''),
(8, 'Benny hana', 'benny', '$2y$10$EwdS.D4mgqyPxtyFkqUtHud6/zDVVxXMZEt2LFtMgQuhV46zdzTIG', '2022-09-15 00:58:13', '', '', '', ''),
(9, 'besti', 'besti', '$2y$10$H9Cl9SZzQOdMwzxHgbZItez09ZdbeguMFOl6NDXIMLIzJmdgHx62K', '2022-09-15 03:39:38', '', '', '', ''),
(10, 'jamei', 'jamie', '$2y$10$7NZjq/kNhcTAGu7mqkYubOVv4d409OnQCUDU8sL/Js12QYl7VNHcy', '2022-09-15 03:41:19', '', '', '', ''),
(11, 'user', 'user', '$2y$10$CuaHsbfG3VpzoqxIth1Q.eh.yCXB85TzODrG8FPZ754BfTJ7dQrg2', '2022-09-20 12:26:26', '0.000', '30', '0%', '0.000'),
(12, 'mynn', 'myn', '$2y$10$QGC/HY0ufdqWJGDKOMfNHe.3dGrH2V3IefHER7vqUM0kLTwLj2/hi', '2022-09-20 12:46:10', '0.000', '30', '0', '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `username` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`username`, `amount`, `address`) VALUES
('', '', 'tghbvgvuiououomu899'),
('', '', 'tghbvgvuiououomu899'),
('', '', 'tghbvgvuiououomu899'),
('', '', 'tghbvgvuiououomu899'),
('asda', '', 'tghbvgvuiououomu899'),
('asda', '', 'tghbvgvuiououomu899'),
('jayecho', '', 'tghbvgvuiououomu899'),
('asda', '1999000', 'tghbvgvuiououomu899'),
('admin', '3000', 'tghbvgvuiououomu899'),
('admin', '20000', 'tghbvgvuiououomu899'),
('wayne', '22333', 'tghbvgvuiououomu899'),
('myn', '200000000', 'ffghiojnm\'a;eiougPQ4GH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
