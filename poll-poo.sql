-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2020 at 11:16 AM
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
(32, 17, 'McDo', 2),
(33, 17, 'Salade', 0),
(34, 18, 'Xbox', 1),
(35, 18, 'Play', 1),
(56, 19, 'Rouge', 0),
(57, 19, 'Vert', 5),
(58, 19, 'Bleu', 0),
(59, 19, 'Jaune', 0),
(60, 20, 'Oui', 0),
(61, 20, 'Non', 4),
(62, 21, '1', 0),
(63, 21, '2', 0),
(64, 21, '3', 0),
(65, 21, '4', 0),
(66, 22, 'Test1', 7),
(67, 22, 'Test2', 0),
(68, 23, 'ddddd', 3),
(69, 23, 'ddddd', 0),
(70, 24, 'dede', 1),
(71, 24, 'ddddd', 1);

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
(13, 28, 31),
(14, 28, 29);

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `author`, `content`, `created_at`, `conv_id`) VALUES
(1, 'Nisouc', 'C\'Ã©tait pas loin', '2020-12-03 10:23:15', 18),
(14, 'Nisouc', 'ttt c\'est nisouc aussi d\'ailleurs', '2020-12-03 11:15:43', 18);

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
(17, 'Quel repas ce soir ?', '2020-12-03 10:36:35', 28, 0),
(18, 'Meilleure console ?', '2020-12-03 06:52:36', 31, 0),
(19, 'Meilleure couleur ?', '2020-12-03 11:26:33', 28, 0),
(20, 'Ce sondage va marcher ?', '2020-12-03 11:32:20', 28, 0),
(21, 'Combien de personnes ont aidÃ© sur ce site ?', '2020-12-03 11:40:05', 28, 0);

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
(29, 'test', '$2y$10$dsu1Uz0f3BvLnrPtAGIJ1upKw1xroQUc2p78ay3ZSzbldaaM0KyXO', 'test@test.fr', 0, 'bisque'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `bonds`
--
ALTER TABLE `bonds`
  MODIFY `bonds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
