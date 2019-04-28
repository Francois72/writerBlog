-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 avr. 2019 à 06:13
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `writerblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `creation_date`, `report`) VALUES
(4, 1, 1, 'Belle histoire.', '2019-03-04 11:39:00', 0),
(3, 2, 1, 'Moi aussi.', '2019-03-04 11:39:20', 0),
(5, 1, 3, 'Je trouve aussi.', '2019-04-05 17:48:46', 0),
(18, 5, 3, 'Commentaire de Marie', '2019-04-25 18:02:32', 0),
(10, 2, 3, 'C\'&eacute;tait une belle histoire.', '2019-04-12 18:23:47', 0),
(12, 1, 3, 'On est jeudi.', '2019-04-18 17:45:49', 0),
(19, 5, 2, 'feazf', '2019-04-25 18:02:59', 0);

-- --------------------------------------------------------

--
-- Structure de la table `postswriter`
--

DROP TABLE IF EXISTS `postswriter`;
CREATE TABLE IF NOT EXISTS `postswriter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `postswriter`
--

INSERT INTO `postswriter` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1', 'D&eacute;but d\'une histoire et ce n\'est pas bien long.', '2019-02-01 00:00:00'),
(2, 'Chapitre 2: l\'inconnu', 'La suite.', '2019-02-08 00:00:00'),
(5, 'Chapitre 3: le vent se lève.', 'Le vent s\'&eacute;tait lev&eacute;.', '2019-04-24 18:53:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rights` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `creation_date`, `rights`) VALUES
(1, 'Mathieu', '$2y$10$fzC46YMG.r4bYmcNTiT5qOR7q415YX/GbuEdfIV3H2lkEZL3QtPIy', 'mathieu@mail.fr', '2019-02-04 10:37:49', 0),
(2, 'Francois', '$2y$10$6LJZE.A5g6awXoREKZGaMutjYQsM9iWp2rtmfFOa.jBP5yc4rdedq', 'francois@mail.com', '2019-02-25 10:02:57', 1),
(3, 'Marie', '$2y$10$voh3cYjRV8ixbKkp1.TZyuVHFc3gCFVHbeJ80vTHso9eJKgkUCLU6', 'marie@live.fr', '2019-03-11 11:35:35', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
