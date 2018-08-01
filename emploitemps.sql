-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 01 Janvier 2012 à 11:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `adminsco`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploitemps`
--

CREATE TABLE IF NOT EXISTS `emploitemps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure` varchar(32) NOT NULL,
  `idjour` int(11) NOT NULL,
  `idCour` int(11) NOT NULL DEFAULT '0',
  `idProfesseur` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `emploitemps`
--

INSERT INTO `emploitemps` (`id`, `heure`, `idjour`, `idCour`, `idProfesseur`, `idSalle`) VALUES
(1, '8-10', 1, 1, 0, 1),
(2, '15-17', 4, 1, 1, 1),
(3, '10-12', 1, 14, 4, 1),
(5, '8-10', 4, 0, 1, 0),
(6, '8-10', 5, 1, 1, 0),
(7, '8-10', 6, 0, 1, 0),
(8, '8-10', 2, 1, 1, 1),
(9, '8-10', 3, 1, 1, 0),
(10, '10-12', 1, 0, 1, 0),
(11, '10-12', 2, 2, 1, 0),
(12, '10-12', 3, 0, 1, 0),
(13, '10-12', 4, 5, 8, 0),
(14, '10-12', 5, 0, 1, 0),
(15, '10-12', 6, 0, 1, 0),
(16, '15-17', 1, 0, 1, 0),
(17, '15-17', 2, 0, 1, 0),
(18, '15-17', 3, 0, 1, 0),
(19, '15-17', 5, 0, 1, 0),
(20, '15-17', 6, 0, 1, 0),
(21, '17-19', 1, 2, 1, 0),
(22, '17-19', 2, 0, 1, 0),
(23, '17-19', 3, 0, 1, 0),
(24, '17-19', 4, 0, 1, 0),
(25, '17-19', 5, 0, 1, 0),
(26, '17-19', 6, 6, 5, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
