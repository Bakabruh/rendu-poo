-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2020 at 12:42 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll-poo`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `reponse`, `votes`) VALUES
(8, 7, 'McDo', 20),
(9, 7, 'Salade', 1),
(10, 7, 'Tomate', 3),
(17, 10, 'Xbox', 11),
(18, 10, 'Play', 36),
(22, 12, 'Nisouc', 0),
(23, 12, 'Nisouc', 2),
(24, 13, 'de', 0),
(25, 13, 'dd', 0),
(26, 14, 'dede', 0),
(27, 14, 'ded', 0),
(28, 15, 'deded', 1),
(29, 15, 'eeeeee', 0),
(30, 16, 'cecece', 0),
(31, 16, 'cecececec', 1),
(32, 17, 'McDo', 1),
(33, 17, 'Salade', 0),
(34, 18, 'Xbox', 0),
(35, 18, 'Play', 1),
(36, 19, 'de', 0),
(37, 19, 'dd', 0),
(38, 20, 'de', 0),
(39, 20, 'dd', 0),
(40, 21, '1', 1),
(41, 21, '2', 2),
(42, 21, '3', 3),
(43, 21, '4', 4),
(44, 22, 'efef', 0),
(45, 22, 'efe', 0),
(46, 23, 'de', 0),
(47, 23, 'Play', 0),
(48, 24, 'dcd', 0),
(49, 24, 'dcdcd', 0),
(50, 25, 'cc', 0),
(51, 25, 'dd', 0),
(52, 26, 'z', 0),
(53, 26, 'z', 0),
(54, 27, 'dede', 0),
(55, 27, 'dedede', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bonds`
--

CREATE TABLE `bonds` (
  `bonds_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bonds`
--

INSERT INTO `bonds` (`bonds_id`, `user_id1`, `user_id2`) VALUES
(12, 28, 30),
(13, 28, 31);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `conv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_1_id`, `user_2_id`, `state`) VALUES
(8, 28, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `end` datetime NOT NULL,
  `creatorsId` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `question`, `end`, `creatorsId`, `status`) VALUES
(17, 'Quel repas ce soir ?', '2020-12-03 10:36:35', 28, 1),
(18, 'Meilleure console ?', '2020-12-03 06:52:36', 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_theme` varchar(255) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_status`, `user_theme`) VALUES
(28, 'Nisouc', '$2y$10$EkVmiwRVVN9T.v4zbewyDupSWweqTrO7iLTHaFMXJkbbz9k/.tiTa', 'Nisouc@outlook.com', 0, 'white'),
(29, 'test', '$2y$10$dsu1Uz0f3BvLnrPtAGIJ1upKw1xroQUc2p78ay3ZSzbldaaM0KyXO', 'test@test.fr', 0, 'white'),
(30, 'essai', '$2y$10$3BzdX.08GQTjVgL1DbejTuF1cUbXzwFCWAI2BjNLgFoyFkj.FaHDm', 'essai@essai.fr', 0, 'white'),
(31, 'ttt', '$2y$10$Y2LrEJ.QNDn0sY81sNFTZObbA3ZBxistiUCog4NT/hyuSvsVXcmGm', 'ttt@ttt.fr', 0, 'white'),
(35, 'bbb', '$2y$10$SwZ351r/.XTei5G/7V7LmOer/H/ZQM40rGZfMn0T/AND19Ji8U53G', 'bbb@bbb.fr', 0, 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`bonds_id`),
  ADD KEY `user_id2` (`user_id2`),
  ADD KEY `user_id1` (`user_id1`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `bonds`
--
ALTER TABLE `bonds`
  MODIFY `bonds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonds`
--
ALTER TABLE `bonds`
  ADD CONSTRAINT `bonds_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bonds_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
