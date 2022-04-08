-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : maria_db:3306
-- Généré le : mar. 08 fév. 2022 à 14:48
-- Version du serveur :  10.6.5-MariaDB-1:10.6.5+maria~focal
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet2`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(10) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `groupe` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `groupe`) VALUES
(1, 'Syd Barrett', 'Pink Floyd'),
(2, 'David Bowie', NULL),
(3, 'Freddie Mercury', 'Queen'),
(4, 'Janis Joplin', NULL),
(5, 'Bob Marley', ''),
(7, 'Thomas Bangalter', 'Daft Punk'),
(8, 'Brian May', 'Queen'),
(9, 'Guy-Manuel de Homem-Christo', 'Daft Punk'),
(10, 'David Gilmour', 'Pink Floyd');

-- --------------------------------------------------------

--
-- Structure de la table `artiste_musique`
--

CREATE TABLE `artiste_musique` (
  `artiste_id` int(10) NOT NULL,
  `musique_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste_musique`
--

INSERT INTO `artiste_musique` (`artiste_id`, `musique_id`) VALUES
(8, 8),
(3, 8),
(2, 7),
(4, 4),
(10, 5),
(10, 6),
(1, 6),
(1, 5),
(9, 1),
(7, 1),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `id` int(10) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `durée` time NOT NULL,
  `album` varchar(64) NOT NULL,
  `style_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `nom`, `durée`, `album`, `style_id`) VALUES
(1, 'Human After all', '05:19:00', 'Human After all', 3),
(2, 'Mr. Brown', '04:13:00', 'Volume II One Love', 1),
(3, 'Three Little Birds', '03:03:00', 'Exodus', 1),
(4, 'Cry Baby', '03:59:00', 'Pearl', 4),
(5, 'Lucifer Sam', '03:07:00', 'The Piper at the Gates of Dawn', 2),
(6, 'Arnold Layne', '02:52:00', 'Relics', 2),
(7, 'Space Oddity', '05:13:00', 'Space Oddity', 4),
(8, 'Bohemian Rhapsody', '06:00:00', 'A Night at the Opera', 4);

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `style`
--

INSERT INTO `style` (`id`, `nom`, `type`) VALUES
(1, 'Reggae', ''),
(2, 'Rock', 'psychédélique'),
(3, 'Electronique', 'Techno'),
(4, 'Rock', 'Pop');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artiste_musique`
--
ALTER TABLE `artiste_musique`
  ADD KEY `lien_artiste` (`artiste_id`),
  ADD KEY `lien_musique` (`musique_id`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musique_style` (`style_id`);

--
-- Index pour la table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artiste_musique`
--
ALTER TABLE `artiste_musique`
  ADD CONSTRAINT `lien_artiste` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `lien_musique` FOREIGN KEY (`musique_id`) REFERENCES `musique` (`id`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `musique_style` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
