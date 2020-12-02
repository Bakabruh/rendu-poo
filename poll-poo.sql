-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 02 déc. 2020 à 19:50
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poll-poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `reponse`, `votes`) VALUES
(8, 7, 'McDo', 0),
(9, 7, 'Salade', 0),
(10, 7, 'Tomate', 0),
(17, 10, 'Xbox', 0),
(18, 10, 'Play', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bonds`
--

CREATE TABLE `bonds` (
  `bonds_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bonds`
--

INSERT INTO `bonds` (`bonds_id`, `user_id1`, `user_id2`) VALUES
(12, 28, 30),
(13, 28, 31);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `conv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `author`, `content`, `created_at`, `conv_id`) VALUES
(1, 'Nisouc', 'dd', '2020-11-30 22:51:08', 1),
(2, 'Nisouc', 'oo', '2020-11-30 22:51:11', 1),
(3, 'Nisouc', 'oo', '2020-11-30 22:52:34', 1),
(4, 'Nisouc', 'oo', '2020-11-30 22:52:35', 1),
(5, 'Nisouc', 'oo', '2020-11-30 22:54:59', 1),
(6, 'Nisouc', 'oo', '2020-11-30 22:55:00', 1),
(17, 'Nisouc', 'oo', '2020-11-30 22:56:59', 1);

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `convo_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`request_id`, `user_1_id`, `user_2_id`, `state`) VALUES
(8, 28, 29, 0);

-- --------------------------------------------------------

--
-- Structure de la table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `creatorsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `surveys`
--

INSERT INTO `surveys` (`survey_id`, `question`, `end`, `creatorsId`) VALUES
(7, 'Quel repas ce soir ?', '04:20', 28),
(10, 'Meilleure console ?', '02:24', 28);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_theme` varchar(255) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `status`, `user_theme`) VALUES
(28, 'Nisouc', '$2y$10$EkVmiwRVVN9T.v4zbewyDupSWweqTrO7iLTHaFMXJkbbz9k/.tiTa', 'Nisouc@outlook.com', 0, 'dimgrey'),
(29, 'test', '$2y$10$dsu1Uz0f3BvLnrPtAGIJ1upKw1xroQUc2p78ay3ZSzbldaaM0KyXO', 'test@test.fr', 0, 'white'),
(30, 'essai', '$2y$10$3BzdX.08GQTjVgL1DbejTuF1cUbXzwFCWAI2BjNLgFoyFkj.FaHDm', 'essai@essai.fr', 0, 'white'),
(31, 'ttt', '$2y$10$Y2LrEJ.QNDn0sY81sNFTZObbA3ZBxistiUCog4NT/hyuSvsVXcmGm', 'ttt@ttt.fr', 0, 'white');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`bonds_id`),
  ADD KEY `user_id2` (`user_id2`),
  ADD KEY `user_id1` (`user_id1`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`convo_id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Index pour la table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `bonds`
--
ALTER TABLE `bonds`
  MODIFY `bonds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bonds`
--
ALTER TABLE `bonds`
  ADD CONSTRAINT `bonds_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bonds_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
