-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `page_id`, `user_id`, `comment_date`, `comment`) VALUES
(1, 10, 1, NULL, 'This is comment number 1 from admin 1'),
(3, 10, 2, NULL, 'This is comment 1 from regular user'),
(8, 10, 2, NULL, 'this is comment 2 from regular user'),
(9, 10, 2, NULL, 'this comment 3 from the regular user'),
(10, 10, 1, NULL, 'this is comment number 2 from the admin'),
(11, 10, 1, '2024-03-28 06:33:37', 'Add your comment hereTEST!!!!'),
(12, 10, 1, '2024-03-28 06:34:10', 'Add your comment hereTEST!!!!'),
(13, 18, 1, '2024-03-28 06:34:26', 'First comment for this!'),
(14, 18, 1, '2024-03-28 06:34:51', 'First comment for this!'),
(15, 18, 1, '2024-03-28 06:35:16', 'Test again'),
(17, 10, 1, '2024-03-28 06:56:29', 'This will be deleted'),
(26, 25, 2, '2024-03-28 07:45:34', 'asdasdas'),
(34, 25, 2, '2024-03-28 18:35:22', 'I will be postinnnn'),
(35, 25, 1, '2024-03-28 19:29:42', 'jasldjasd'),
(37, 25, 1, '2024-04-03 22:40:39', 'I wanna test this!'),
(38, 25, 1, '2024-04-03 22:40:52', 'I wanna test this!'),
(39, 25, 1, '2024-04-03 22:42:37', 'I wanna test this!'),
(40, 25, 1, '2024-04-03 22:42:59', 'I wanna test this!'),
(41, 25, 1, '2024-04-03 22:44:10', 'I wanna test this!'),
(42, 25, 1, '2024-04-03 22:44:17', 'redirect to the same page, please!'),
(43, 25, 1, '2024-04-03 22:44:51', 'redirect to the same page, please!'),
(44, 25, 1, '2024-04-03 22:45:16', 'now, it is sorted right?'),
(45, 25, 1, '2024-04-03 22:45:21', 'YES!'),
(46, 25, 1, '2024-04-03 22:50:53', 'YES!'),
(47, 25, 1, '2024-04-03 22:50:59', 'YES!'),
(48, 11, 17, '2025-02-26 00:57:53', 'dasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_data_id` int(11) NOT NULL,
  `game_name` varchar(64) DEFAULT NULL,
  `game_type` varchar(64) DEFAULT NULL,
  `game_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `user_id`, `game_data_id`, `game_name`, `game_type`, `game_description`) VALUES
(1, 1, 1, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(2, 1, 2, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(3, 1, 3, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(4, 1, 4, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(5, 1, 5, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(6, 1, 6, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(7, 1, 7, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(8, 1, 8, 'Minha pica asass', 'sadasdsadas', 'dasdasasads'),
(9, 1, 9, 'Speed 4', 'speed', 'This game trains the ability of handling multiple targets at once.'),
(10, 1, 10, 'Speed reaction', 'speed', 'This game trains the ability of handling one target that appears on the screen rapidly.'),
(11, 1, 11, 'Double shots', 'speed', 'This game trains the ability of shooting two targets in a the smallest amount of time.'),
(12, 1, 12, 'Precision 1', 'precision', 'This game trains the ability of precision. The player needs to click on a small target within 4 seconds.'),
(13, 1, 13, 'Double shots precision', 'precision', 'This game trains the precision of a player while handling two targets.'),
(14, 1, 14, 'Frenzy Insane', 'speed', 'This will take the player&#39;s abilities to the next level. They will need to handle 5 small targets that will appear on the screen in a span of 1 second.'),
(15, 1, 15, 'Speed Precision Easy', 'precision', 'The player will need to handle only 2 small targets that will appear every 2 seconds'),
(16, 1, 16, 'Begginer', 'normal', 'Just starting with aim training? Try this mode, you&#39;ll have to handle 5 big targets that will expire within 10 seconds each.'),
(17, 1, 17, 'Easy precision', 'precision', 'The player will need to handle 3 small targets that will expire within 5 seconds each.'),
(18, 1, 18, 'Super easy', 'normal', 'The player will handle 2 of the biggest targets that will expire 5 seconds each.'),
(19, 1, 19, 'Test1', 'test2', 'I am just testing again'),
(20, 1, 20, 'Test1', 'test2', 'I am just testing again'),
(21, 1, 21, 'asdasdas', 'asdasdas', 'asdasdas'),
(22, 1, 22, 'Test', 'test comment deletion', 'Just a page created to handle comment deletion'),
(23, 1, 23, 'test', 'test', 'hand.e comment deletion'),
(24, 1, 24, 'asdsadasd', 'asadasd', 'asdasdasd'),
(25, 1, 25, 'deleting', 'comments', 'im about to go crazy'),
(26, 1, 26, 'test a test u know', 'idk', 'JUSTA TEXT LIKE ALWAYS :)'),
(27, 1, 27, 'test', 'test', 'helooo'),
(28, 1, 46, 'test', 'test', 'test'),
(29, 1, 47, 'testson', 'test', 'test'),
(30, 1, 48, 'I LIKE POTATOES', '``111', '1'),
(31, 1, 49, 'test', 'test', 'tetst'),
(32, 1, 50, 'sasadsa', 'asdasdasd', 'asdasasasd'),
(33, 1, 51, 'asadasdas', 'asdasdas', 'asdasdasddasd'),
(34, 1, 52, 'ttdt', 'tt', 'tetttd'),
(35, 1, 53, 'tstasda', 'test', 'asdasda'),
(36, 1, 54, 'asdasdasd', 'asdasd', 'asdasdasd'),
(37, 1, 55, 'test', 'test', 'test'),
(38, 1, 56, 'test', 'test', 'test'),
(39, 1, 57, 'test', 'test', 'test'),
(40, 1, 59, 'test', 'test', 'test'),
(41, 1, 64, 'test', 'test', 'test'),
(42, 1, 65, 'test', 'test', 'asdasdasd'),
(43, 1, 66, 'test', 'test', 'asdasdas'),
(44, 1, 67, 'test', 'test', 'test'),
(45, 1, 68, 'test', 'test', 'test'),
(46, 1, 69, 'tes', 'test', 'test'),
(47, 1, 70, 'test', 'test', 'aaddasd'),
(48, 1, 71, 'test', 'test', 'test'),
(49, 1, 72, 'test a test', 'test', 'test'),
(50, 1, 73, 'test a test', 'test', 'test'),
(51, 1, 74, 'test a test', 'asdsad', 'asdasd'),
(52, 8, 75, 'test a test', 'adasd', 'asdasd'),
(53, 8, 76, 'Eu nao sei', 'Testando', 'so um teste pra ver os slugs tlg'),
(54, 8, 77, 'Eu nao sei', 'Testando', 'so um teste pra ver os slugs tlg'),
(55, 8, 78, 'asdasd', 'asdasd', 'asdasdasd'),
(56, 8, 79, 'asdasd', 'asdasd', 'asdasdasd'),
(57, 8, 80, 'asdasd adas asdasd', 'asdsd', 'dasdasd'),
(58, 17, 81, 'Game Test For Search', 'test', 'This is just a test u know'),
(59, 17, 82, 'Game Test For Search', 'test', 'cczxcdasda'),
(60, 17, 83, 'Game Test For Search', 'test', 'asadasd'),
(61, 17, 84, 'Game Test For Search', 'test', 'test'),
(62, 17, 85, 'Game Test For Search', 'test', 'test'),
(63, 17, 86, 'Game Test For Search', 'test', 'test'),
(64, 17, 87, 'Game Test For Search', 'test', 'asdasdsa'),
(65, 17, 88, 'Game Test For Search', 'test', 'rerewr'),
(66, 17, 89, 'Game Test For Search', 'test', 'adqdqwd'),
(67, 17, 90, 'Game Test For Search', 'test', 'dadasd'),
(68, 17, 91, 'Game Test For Searchq', 'test', 'qweqwe'),
(69, 17, 92, 'Game Test For Search', 'test', 'sfsfs'),
(70, 17, 93, 'Game Test For Search', 'test', 'assdasdasd'),
(71, 17, 94, 'Game Test For Search', 'test', 'weqweqweqe'),
(72, 17, 95, 'Game Test For Search', 'test', 'asdadasd'),
(73, 17, 96, 'Game Test For Search', 'test', 'asdasd'),
(74, 17, 97, 'Game Test For Search', 'test', 'asdasda'),
(75, 17, 98, 'Game Test For Search', 'test', 'asdasda'),
(76, 17, 99, 'Game Test For Search', 'test', 'asdasda'),
(77, 17, 100, 'Game Test For Search', 'test', 'asdasda'),
(78, 17, 102, 'Game Test For Search', 'test', 'asdasda'),
(79, 17, 103, 'Game Test For Search', 'test', 'asdasda'),
(80, 17, 104, 'Game Test For Search', 'test', 'asdasda'),
(81, 17, 105, 'Game Test For Search', 'test', 'asdasda'),
(82, 17, 106, 'Game Test For Search', 'test', 'asdasda'),
(83, 17, 107, 'Game Test For Search', 'test', 'asdasda'),
(84, 17, 108, 'Game Test For Search', 'test', 'asdasda'),
(85, 17, 110, 'Game Test For Search', 'test', 'asdasda'),
(86, 17, 111, 'Game Test For Search', 'test', 'asdasd'),
(87, 17, 112, 'Game Test For Search', 'test', 'sadasd'),
(88, 17, 113, 'Game Test For Search', 'test', 'asdasd'),
(89, 17, 114, 'Game Test For Search', 'test', 'asdasdasd'),
(90, 17, 115, 'Game Test For Search', 'test', 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `game_data`
--

CREATE TABLE `game_data` (
  `game_data_id` int(11) NOT NULL,
  `number_of_targets` int(11) NOT NULL DEFAULT 1,
  `multiple_targets` tinyint(1) NOT NULL DEFAULT 0,
  `duration_time` decimal(5,1) DEFAULT NULL,
  `time_alive` decimal(5,1) DEFAULT NULL,
  `target_size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_data`
--

INSERT INTO `game_data` (`game_data_id`, `number_of_targets`, `multiple_targets`, `duration_time`, `time_alive`, `target_size`) VALUES
(1, 1, 0, 9999.9, 9999.9, 30),
(2, 1, 0, 9999.9, 9999.9, 30),
(3, 1, 0, 9999.9, 9999.9, 30),
(4, 1, 0, 9999.9, 9999.9, 30),
(5, 1, 0, 9999.9, 9999.9, 30),
(6, 1, 0, 9999.9, 9999.9, 30),
(7, 1, 0, 9999.9, 9999.9, 30),
(8, 1, 0, 9999.9, 9999.9, 30),
(9, 4, 1, 4000.0, 1000.0, 30),
(10, 1, 0, 1000.0, 1000.0, 30),
(11, 2, 1, 1000.0, 1000.0, 30),
(12, 1, 0, 4000.0, 1000.0, 15),
(13, 2, 1, 1000.0, 1000.0, 15),
(14, 5, 1, 1000.0, 1000.0, 15),
(15, 2, 1, 2000.0, 1000.0, 15),
(16, 5, 1, 9999.9, 1000.0, 60),
(17, 1, 0, 5000.0, 1000.0, 15),
(18, 2, 1, 5000.0, 1000.0, 75),
(19, 4, 1, 1000.0, 1000.0, 30),
(20, 4, 1, 1000.0, 1000.0, 30),
(21, 1, 0, 1000.0, 1000.0, 30),
(22, 2, 1, 1000.0, 1000.0, 30),
(23, 1, 0, 1000.0, 1000.0, 30),
(24, 1, 0, 1000.0, 1000.0, 30),
(25, 2, 1, 1000.0, 1000.0, 30),
(26, 1, 0, 1000.0, 1000.0, 30),
(27, 1, 0, 1000.0, 1000.0, 30),
(28, 2, 1, 1000.0, 1000.0, 30),
(29, 1, 0, 1000.0, 1000.0, 30),
(30, 1, 0, 1000.0, 1000.0, 30),
(31, 1, 0, 1000.0, 1000.0, 30),
(32, 1, 0, 1000.0, 1000.0, 30),
(33, 1, 0, 1000.0, 1000.0, 30),
(34, 1, 0, 1000.0, 1000.0, 30),
(35, 1, 0, 1000.0, 1000.0, 30),
(36, 1, 0, 1000.0, 1000.0, 30),
(37, 1, 0, 1000.0, 1000.0, 30),
(38, 1, 0, 1000.0, 1000.0, 30),
(39, 1, 0, 1000.0, 1000.0, 30),
(40, 1, 0, 1000.0, 1000.0, 30),
(41, 1, 0, 1000.0, 1000.0, 30),
(42, 1, 0, 1000.0, 1000.0, 30),
(43, 1, 0, 1000.0, 1000.0, 30),
(44, 1, 0, 1000.0, 1000.0, 30),
(45, 1, 0, 1000.0, 1000.0, 30),
(46, 1, 0, 1000.0, 1000.0, 30),
(47, 1, 0, 1000.0, 1000.0, 30),
(48, 1, 0, 1000.0, 1000.0, 30),
(49, 1, 0, 1000.0, 1000.0, 30),
(50, 1, 0, 999.0, 1000.0, 30),
(51, 1, 0, 1000.0, 1000.0, 30),
(52, 2, 1, 1000.0, 1000.0, 30),
(53, 2, 1, 1000.0, 1000.0, 30),
(54, 1, 0, 1000.0, 1000.0, 30),
(55, 1, 0, 1000.0, 1000.0, 30),
(56, 1, 0, 1000.0, 1000.0, 30),
(57, 2, 1, 1000.0, 1000.0, 30),
(58, 1, 0, 1000.0, 1000.0, 30),
(59, 1, 0, 1000.0, 1000.0, 30),
(60, 1, 0, 1000.0, 1000.0, 30),
(61, 1, 0, 1000.0, 1000.0, 30),
(62, 1, 0, 1000.0, 1000.0, 30),
(63, 1, 0, 1000.0, 1000.0, 30),
(64, 2, 1, 1000.0, 1000.0, 30),
(65, 1, 0, 1000.0, 1000.0, 30),
(66, 1, 0, 1000.0, 1000.0, 30),
(67, 1, 0, 1000.0, 1000.0, 30),
(68, 1, 0, 1000.0, 1000.0, 30),
(69, 1, 0, 1000.0, 1000.0, 30),
(70, 1, 0, 1000.0, 1000.0, 30),
(71, 1, 0, 1000.0, 1000.0, 30),
(72, 1, 0, 1000.0, 1000.0, 30),
(73, 1, 0, 1000.0, 1000.0, 30),
(74, 1, 0, 1000.0, 1000.0, 30),
(75, 1, 0, 1000.0, 1000.0, 30),
(76, 1, 0, 1000.0, 1000.0, 30),
(77, 1, 0, 1000.0, 1000.0, 30),
(78, 1, 0, 1000.0, 1000.0, 30),
(79, 1, 0, 1000.0, 1000.0, 30),
(80, 1, 0, 1000.0, 1000.0, 30),
(81, 1, 0, 1000.0, 1000.0, 30),
(82, 1, 0, 1000.0, 1000.0, 30),
(83, 1, 0, 1000.0, 1000.0, 30),
(84, 1, 0, 1000.0, 1000.0, 30),
(85, 2, 1, 1000.0, 1000.0, 30),
(86, 1, 0, 1000.0, 1000.0, 30),
(87, 1, 0, 1000.0, 1000.0, 30),
(88, 1, 0, 1000.0, 1000.0, 30),
(89, 1, 0, 1000.0, 1000.0, 30),
(90, 1, 0, 1000.0, 1000.0, 30),
(91, 1, 0, 1000.0, 1000.0, 30),
(92, 1, 0, 1000.0, 1000.0, 30),
(93, 1, 0, 1000.0, 1000.0, 30),
(94, 1, 0, 1000.0, 1000.0, 30),
(95, 1, 0, 1000.0, 1000.0, 30),
(96, 1, 0, 1000.0, 1000.0, 30),
(97, 1, 0, 1000.0, 1000.0, 30),
(98, 1, 0, 1000.0, 1000.0, 30),
(99, 1, 0, 1000.0, 1000.0, 30),
(100, 1, 0, 1000.0, 1000.0, 30),
(101, 1, 0, 1000.0, 1000.0, 30),
(102, 1, 0, 1000.0, 1000.0, 30),
(103, 1, 0, 1000.0, 1000.0, 30),
(104, 1, 0, 1000.0, 1000.0, 30),
(105, 1, 0, 1000.0, 1000.0, 30),
(106, 1, 0, 1000.0, 1000.0, 30),
(107, 1, 0, 1000.0, 1000.0, 30),
(108, 1, 0, 1000.0, 1000.0, 30),
(109, 1, 0, 1000.0, 1000.0, 30),
(110, 1, 0, 1000.0, 1000.0, 30),
(111, 1, 0, 1000.0, 1000.0, 30),
(112, 1, 0, 1000.0, 1000.0, 30),
(113, 1, 0, 1000.0, 1000.0, 30),
(114, 1, 0, 1000.0, 1000.0, 30),
(115, 1, 0, 1000.0, 1000.0, 30);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `game_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `slug` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `tag_id`, `game_id`, `date`, `slug`) VALUES
(10, 1, NULL, 10, '2024-03-21 12:00:08', ''),
(11, 1, NULL, 11, '2024-03-21 12:00:54', ''),
(12, 1, NULL, 12, '2024-03-21 12:01:33', ''),
(13, 1, NULL, 13, '2024-03-21 12:02:06', ''),
(14, 1, NULL, 14, '2024-03-21 12:03:48', ''),
(15, 1, NULL, 15, '2024-03-21 12:50:00', ''),
(17, 1, NULL, 17, '2024-03-21 12:53:41', ''),
(18, 1, NULL, 18, '2024-03-21 12:54:29', ''),
(25, 1, NULL, 25, '2024-03-28 07:23:34', ''),
(88, 17, NULL, 88, '2024-04-11 20:59:35', 'game-test-for-search'),
(90, 17, NULL, 90, '2024-04-11 21:01:24', 'game-test-for-search1');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_title`) VALUES
(1, 'speed'),
(2, 'precision'),
(3, 'double');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(128) NOT NULL,
  `profile_picture` blob DEFAULT NULL,
  `usertype` varchar(64) NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `profile_picture`, `usertype`) VALUES
(1, 'admin', '', '$2y$10$Ef40twQZTgIEGnrKo1zfP.wDBD1xTCon1N9XgZyghpQvcafK5ih0q', '', 'admin'),
(2, 'regular', '', '$2y$10$IzyU3Sp0.isVoT/apZUaV.bI2dyW0lTOl6laDmz.9Yypigqon3Fh2', '', 'regular'),
(8, 'admin2', '', '$2y$10$25OliZijoAYk4mkAifv.VuuKhVC4KBTvZg2r.uMbAWgZw03p1Rz/G', '', 'admin'),
(9, 'regularUser', '', '$2y$10$8NJ25IudKAFHahZ0jBB8puChHmolux8I5GjOYb.Gs8nMY9nveN3XS', '', 'regular'),
(10, 'ralph', '', '$2y$10$ehYpupkt9IQHOK3s7lb80OZHAeRQ00nZMv9Vp/r8wxriPCcwlKI6i', '', 'regular'),
(17, 'joao', 'joao@joao.com', '$2y$10$RDi4mJV42oifpniY3QkIVObohmGeuSOoMZz240UrzOv2h9Tg/sUyy', 0x707269766174655c696d616765735c706670735c53637265656e73686f7420323032332d31322d3037203138323733382e706e67, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `comment_id` (`comment_id`),
  ADD KEY `fk_comments_user_id` (`user_id`),
  ADD KEY `fk_comments_page_id` (`page_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_id` (`game_id`),
  ADD KEY `fk_game_user_id` (`user_id`),
  ADD KEY `fk_game_data_id` (`game_data_id`);

--
-- Indexes for table `game_data`
--
ALTER TABLE `game_data`
  ADD PRIMARY KEY (`game_data_id`),
  ADD UNIQUE KEY `game_data_id` (`game_data_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `page_id` (`page_id`),
  ADD KEY `fk_page_user_id` (`user_id`),
  ADD KEY `fk_page_tag_id` (`tag_id`),
  ADD KEY `fk_page_game_id` (`game_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_id` (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `game_data`
--
ALTER TABLE `game_data`
  MODIFY `game_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_page_id` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_game_data_id` FOREIGN KEY (`game_data_id`) REFERENCES `game_data` (`game_data_id`),
  ADD CONSTRAINT `fk_game_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_page_game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_page_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `fk_page_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
