-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Décembre 2016 à 16:06
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_label`) VALUES
(1, 'Aventure'),
(2, 'Science-fiction'),
(3, 'Action'),
(4, 'Comédie'),
(5, 'Romantique');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `language_label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `languages`
--

INSERT INTO `languages` (`language_id`, `language_label`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Espagnol'),
(4, 'Italien'),
(5, 'Allemand'),
(6, 'Danois'),
(7, 'Chinois'),
(8, 'Japonais'),
(9, 'Russe'),
(10, 'Créole');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_actors` text NOT NULL,
  `movie_director` varchar(100) NOT NULL,
  `movie_producer` int(11) NOT NULL,
  `movie_year_of_prod` smallint(4) NOT NULL,
  `movie_language` int(11) NOT NULL,
  `movie_category` int(11) NOT NULL,
  `movie_storyline` text NOT NULL,
  `movie_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_actors`, `movie_director`, `movie_producer`, `movie_year_of_prod`, `movie_language`, `movie_category`, `movie_storyline`, `movie_video`) VALUES
(1, 'star wars', 'han solo, cheewie, darth vador', 'Mickey', 2, 2016, 2, 2, 'blablabla', ''),
(2, 'asdfdsf', 'sdgdfsdf', 'sdffsdf', 0, 1902, 2, 2, 'sfdfsdfs', 'http://sdfsdfds'),
(3, 'qgqdfgd', 'aaaaaaaaaa', 'aaaaaaaaaaa', 0, 1902, 5, 2, 'aaaaaaaaaaa', 'http://www.fsdfsf.fr/?sdfsdf'),
(4, 'qgqdfgd', 'aaaaaaaaaa', 'aaaaaaaaaaa', 0, 1902, 5, 2, 'aaaaaaaaaaa', 'http://www.fsdfsf.fr/?sdfsdf'),
(5, 'qgqdfgd', 'aaaaaaaaaa', 'aaaaaaaaaaa', 0, 1902, 5, 2, 'aaaaaaaaaaa', 'http://www.fsdfsf.fr/?sdfsdf'),
(6, 'qgqdfgd', 'aaaaaaaaaa', 'aaaaaaaaaaa', 0, 1902, 5, 2, 'aaaaaaaaaaa', 'http://www.fsdfsf.fr/?sdfsdf'),
(7, 'qgqdfgd', 'aaaaaaaaaa', 'aaaaaaaaaaa', 0, 1902, 5, 2, 'aaaaaaaaaaa', 'http://www.fsdfsf.fr/?sdfsdf');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movie_title` (`movie_title`),
  ADD KEY `movie_year_of_prod` (`movie_year_of_prod`),
  ADD KEY `movie_language` (`movie_language`),
  ADD KEY `movie_category` (`movie_category`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
