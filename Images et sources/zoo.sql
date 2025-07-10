-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Avril 2025 à 10:28
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE IF NOT EXISTS `animaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_naissance` date DEFAULT NULL,
  `nom_animal` varchar(50) NOT NULL,
  `commentaire` text,
  `id_Especes` int(11) NOT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sexe` (`sexe`),
  KEY `fk_espece` (`id_Especes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `animaux`
--

INSERT INTO `animaux` (`id`, `date_de_naissance`, `nom_animal`, `commentaire`, `id_Especes`, `sexe`) VALUES
(1, '2018-05-23', 'Simba', 'Roi de la savane', 1, 'M'),
(2, '2010-09-12', 'Dumbo', 'Très intelligent', 2, 'M'),
(3, '2015-02-14', 'Flipper', 'Amusant et joueur', 3, 'F'),
(4, '2016-08-20', 'Bamboo', 'Gourmand de bambous', 4, 'F'),
(5, '2013-11-07', 'Baloo', 'Toujours de bonne humeur', 5, 'M');

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE IF NOT EXISTS `enclos` (
  `id` varchar(50) NOT NULL,
  `nom_enclos` varchar(50) NOT NULL,
  `capacite_max` int(11) NOT NULL,
  `taille` float DEFAULT NULL,
  `eau` tinyint(1) NOT NULL,
  `id_Personnels_Concerner` int(11) NOT NULL,
  `id_Personnels` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Personnels_Concerner` (`id_Personnels_Concerner`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enclos`
--

INSERT INTO `enclos` (`id`, `nom_enclos`, `capacite_max`, `taille`, `eau`, `id_Personnels_Concerner`, `id_Personnels`) VALUES
('A01', 'Enclos des lions', 5, 500, 0, 1, 0),
('A02', 'Enclos des éléphants', 3, 800, 0, 2, 0),
('A03', 'Bassin des dauphins', 10, 1200, 1, 1, 0),
('A04', 'Enclos des pandas', 4, 400, 0, 3, 0),
('A05', 'Enclos des ours', 3, 600, 0, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE IF NOT EXISTS `especes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_race` varchar(50) NOT NULL,
  `type_nourriture` varchar(50) NOT NULL,
  `duree_vie_moyenne` int(4) NOT NULL,
  `aquatique` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `especes`
--

INSERT INTO `especes` (`id`, `nom_race`, `type_nourriture`, `duree_vie_moyenne`, `aquatique`) VALUES
(1, 'Lion', 'Carnivore', 15, 0),
(2, 'Éléphant', 'Herbivore', 70, 0),
(3, 'Dauphin', 'Carnivore', 25, 1),
(4, 'Panda', 'Herbivore', 20, 0),
(5, 'Ours', 'Omnivore', 30, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE IF NOT EXISTS `fonctions` (
  `fonction` varchar(50) NOT NULL,
  PRIMARY KEY (`fonction`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`fonction`) VALUES
('Directeur'),
('Employé');

-- --------------------------------------------------------

--
-- Structure de la table `loc_animaux`
--

CREATE TABLE IF NOT EXISTS `loc_animaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Animaux` int(11) NOT NULL,
  `id_Enclos` varchar(50) DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Animaux` (`id_Animaux`),
  KEY `id_Enclos` (`id_Enclos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `loc_animaux`
--

INSERT INTO `loc_animaux` (`id`, `id_Animaux`, `id_Enclos`, `date_arrivee`, `date_sortie`) VALUES
(1, 1, 'A01', '2018-06-01', '2022-05-01'),
(2, 2, 'A02', '2010-10-01', '2020-12-31'),
(3, 3, 'A03', '2015-03-01', '2023-06-15'),
(4, 4, 'A04', '2016-09-01', '2024-02-20'),
(5, 5, 'A05', '2013-12-01', '2023-11-10');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE IF NOT EXISTS `personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salaire` decimal(15,3) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sexe` (`sexe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `prenom`, `date_de_naissance`, `sexe`, `login`, `password`, `salaire`, `fonction`) VALUES
(1, 'Dupont', 'Jean', '1985-04-12', 'M', 'jeand', 'aa', '2500.000', 'Directeur'),
(2, 'Martin', 'Sophie', '1990-07-18', 'F', 'sophiem', 'bb', '1800.500', 'Employé'),
(3, 'Durand', 'Paul', '1988-11-23', 'M', 'pauld', 'cc', '1900.000', 'Employé'),
(5, 'aa', 'aa', '1997-11-03', 'H', 'aa', 'aa', '2500.000', 'Directeur');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE IF NOT EXISTS `sexe` (
  `sexe` varchar(50) NOT NULL,
  PRIMARY KEY (`sexe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sexe`
--

INSERT INTO `sexe` (`sexe`) VALUES
('F'),
('M');

-- --------------------------------------------------------

--
-- Structure de la table `type_nourritures`
--

CREATE TABLE IF NOT EXISTS `type_nourritures` (
  `type_nourriture` varchar(50) NOT NULL,
  PRIMARY KEY (`type_nourriture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_nourritures`
--

INSERT INTO `type_nourritures` (`type_nourriture`) VALUES
('Carnivore'),
('Herbivore'),
('Omnivore');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
