-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Décembre 2016 à 19:14
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
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(32) NOT NULL,
  `niveau` int(32) NOT NULL,
  `filiere` varchar(32) NOT NULL DEFAULT 'lgi',
  PRIMARY KEY (`idCours`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`idCours`, `libelle`, `niveau`, `filiere`) VALUES
(1, 'Algo', 1, 'lgi'),
(2, 'Algo', 2, 'lgi'),
(3, 'Analyse', 1, 'lgi'),
(4, 'Analyse', 2, 'lgi'),
(5, 'Algebre', 1, 'lgi'),
(6, 'Systeme d''exploitation', 1, 'lgi'),
(7, 'Systeme d''exploitation', 2, 'lgi'),
(8, 'Physique', 1, 'lgi'),
(9, 'Anglais', 1, 'lgi'),
(10, 'Anglais', 2, 'lgi'),
(11, 'teleinformatique', 1, 'lgi'),
(12, 'teleinformatique', 2, 'lgi'),
(13, 'Java 2E', 3, 'lgi'),
(14, 'Biologie', 1, 'lsee');

-- --------------------------------------------------------

--
-- Structure de la table `deptchef`
--

CREATE TABLE IF NOT EXISTS `deptchef` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `filiere` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `deptchef`
--

INSERT INTO `deptchef` (`id`, `nom`, `password`, `filiere`) VALUES
(1, 'kane', 'kane', 'lgi'),
(2, 'sow', 'sow', 'lmi'),
(3, 'sene', 'sene', 'lsee'),
(4, 'sy', 'sy', 'pc');

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
(2, '15-17', 4, 1, 0, 0),
(3, '10-12', 1, 14, 4, 1),
(5, '8-10', 4, 0, 1, 0),
(6, '8-10', 5, 1, 1, 0),
(7, '8-10', 6, 0, 1, 0),
(8, '8-10', 2, 1, 1, 1),
(9, '8-10', 3, 1, 1, 0),
(10, '10-12', 1, 0, 1, 0),
(11, '10-12', 2, 0, 1, 0),
(12, '10-12', 3, 0, 1, 0),
(13, '10-12', 4, 0, 1, 0),
(14, '10-12', 5, 0, 1, 0),
(15, '10-12', 6, 0, 1, 0),
(16, '15-17', 1, 0, 1, 0),
(17, '15-17', 2, 0, 1, 0),
(18, '15-17', 3, 0, 1, 0),
(19, '15-17', 5, 0, 1, 0),
(20, '15-17', 6, 0, 1, 0),
(21, '17-19', 1, 0, 1, 0),
(22, '17-19', 2, 0, 1, 0),
(23, '17-19', 3, 0, 1, 0),
(24, '17-19', 4, 0, 1, 0),
(25, '17-19', 5, 0, 1, 0),
(26, '17-19', 6, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE IF NOT EXISTS `enseigne` (
  `idEnseigne` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) NOT NULL,
  `idProfesseur` int(11) NOT NULL,
  PRIMARY KEY (`idEnseigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `enseigne`
--

INSERT INTO `enseigne` (`idEnseigne`, `idCours`, `idProfesseur`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 8, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE IF NOT EXISTS `professeur` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nomProf` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`matricule`, `nomProf`, `username`, `pass`) VALUES
(1, 'Mouhamadou thiam', 'thiam', 'thiam'),
(2, 'Idrissa Gaye', 'gaye', 'gaye'),
(3, ' Papa diop', 'diop', 'diop'),
(4, 'Fallou diagne', 'fall', 'fall');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE IF NOT EXISTS `salles` (
  `numSalle` int(11) NOT NULL AUTO_INCREMENT,
  `capacite` int(11) NOT NULL DEFAULT '100',
  `nom` varchar(32) NOT NULL,
  PRIMARY KEY (`numSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`numSalle`, `capacite`, `nom`) VALUES
(1, 100, 'A1'),
(2, 100, 'A2'),
(3, 100, 'A3'),
(4, 100, 'A4'),
(5, 100, 'A5'),
(6, 100, 'B1'),
(7, 100, 'B2'),
(8, 100, 'B3'),
(9, 100, 'B4'),
(10, 100, 'B5'),
(11, 200, 'Amphi1'),
(12, 200, 'Amphi2');

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE IF NOT EXISTS `semaine` (
  `idDay` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(32) NOT NULL,
  PRIMARY KEY (`idDay`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `semaine`
--

INSERT INTO `semaine` (`idDay`, `jour`) VALUES
(1, 'lundi'),
(2, 'mardi'),
(3, 'mercredi'),
(4, 'jeudi'),
(5, 'vendredi'),
(6, 'samedi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
