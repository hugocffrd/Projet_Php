-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 12:12
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbroot`
--

-- --------------------------------------------------------

--
-- Structure de la table `listetache`
--

DROP TABLE IF EXISTS `listetache`;
CREATE TABLE IF NOT EXISTS `listetache` (
  `IdL` int NOT NULL,
  `Nom` varchar(200) NOT NULL,
  `privee` tinyint(1) NOT NULL,
  `mailU` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdL`),
  KEY `fkMailU` (`mailU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listetache`
--

INSERT INTO `listetache` (`IdL`, `Nom`, `privee`, `mailU`) VALUES
(4, 'Activités maison', 0, NULL),
(1, 'ListeDeJack1', 1, 'jack@gmail.com'),
(3, 'Liste 2', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `IdT` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Texte` text,
  `DateFin` date DEFAULT NULL,
  `IdL` int DEFAULT NULL,
  `Checked` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdT`),
  KEY `fkIdL` (`IdL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`IdT`, `Nom`, `Texte`, `DateFin`, `IdL`, `Checked`) VALUES
(3, 'Tache 2', '', '2022-01-20', 3, 1),
(4, 'Nettoyer le salon', 'C\'est sale', '2022-01-07', 4, 1),
(1, 'TacheDeJack1', 'la première tache de jack', '2022-01-05', 1, 0),
(5, 'Sortir le chien', 'Il faut le promener', '2022-01-05', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Mail` varchar(100) NOT NULL,
  `Nom` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Prenom` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Pwd` text NOT NULL,
  PRIMARY KEY (`Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Mail`, `Nom`, `Prenom`, `Pwd`) VALUES
('jack@gmail.com', 'Dupont', 'Jack', 'password'),
('julien@free.fr', 'Dupuis', 'Julien', 'juju'),
('james@hotmail.com', 'James', 'Cassey', 'azerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
