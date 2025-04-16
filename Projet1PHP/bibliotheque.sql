-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Avril 2025 à 10:19
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
  `ID_Auteur` varchar(60) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `Prenom` varchar(60) NOT NULL,
  `Date_naissance` date NOT NULL,
  PRIMARY KEY (`ID_Auteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acteurs`
--

INSERT INTO `acteurs` (`ID_Auteur`, `Nom`, `Prenom`, `Date_naissance`) VALUES
('Auteur1', 'Nom1', 'Prenom1', '1990-01-05'),
('Auteur2', 'Nom2', 'Prenom2', '1980-06-07'),
('Auteur3', 'Nom3', 'Prenom3', '1984-10-10');

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `ID_Adherent` varchar(60) NOT NULL,
  `Nom` varchar(60) NOT NULL,
  `Prenom` varchar(60) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Date_adhesion` date NOT NULL,
  `Adresse` varchar(60) NOT NULL,
  `Num_tel` varchar(60) NOT NULL,
  `Mail` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_Adherent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`ID_Adherent`, `Nom`, `Prenom`, `Date_naissance`, `Date_adhesion`, `Adresse`, `Num_tel`, `Mail`) VALUES
('Adherent1', 'Nom A', 'Prenom A', '1987-10-07', '2017-06-09', 'Adresse1', 'Numéro1', 'Mail1'),
('Adherent2', 'Nom B', 'Prenom B', '1994-10-07', '2022-06-08', 'Adresse2', 'Numéro2', 'Mail2'),
('Adherent3', 'Nom C', 'Prenom C', '1980-10-16', '2021-05-04', 'Adresse3', 'Numéro3', 'Mail3');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE IF NOT EXISTS `emprunts` (
  `ID_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `Date_emprunt` date NOT NULL,
  `Duree` int(11) NOT NULL,
  `#ID_Adherent` varchar(60) NOT NULL,
  `#Reference` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_emprunt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `emprunts`
--

INSERT INTO `emprunts` (`ID_emprunt`, `Date_emprunt`, `Duree`, `#ID_Adherent`, `#Reference`) VALUES
(1, '2018-06-08', 12, 'Adherent1', 'Livre1'),
(2, '2019-06-13', 47, 'Adherent2', 'Livre2'),
(3, '2015-02-11', 32, 'Adherent3', 'Livre3');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `Reference` varchar(60) NOT NULL,
  `Nbre_pages` int(11) NOT NULL,
  `#ID_Auteur` varchar(60) NOT NULL,
  `Date_publication` date NOT NULL,
  `Genre` varchar(60) NOT NULL,
  `Disponibilite` tinyint(1) NOT NULL,
  `Nbre_emprunts` int(11) NOT NULL,
  `Etat` varchar(60) NOT NULL,
  `Nbre_exemplaire` int(11) NOT NULL,
  PRIMARY KEY (`Reference`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`Reference`, `Nbre_pages`, `#ID_Auteur`, `Date_publication`, `Genre`, `Disponibilite`, `Nbre_emprunts`, `Etat`, `Nbre_exemplaire`) VALUES
('Livre1', 150, 'Auteur1', '2010-06-09', 'Roman', 1, 15, 'Bon état', 5),
('Livre2', 85, 'Auteur2', '2010-10-21', 'Policier', 1, 4, 'Neuf', 28),
('Livre3', 219, 'Auteur3', '1982-10-14', 'Roman', 1, 0, 'Neuf', 40),
('Test', 15, 'Auteur1', '2005-05-01', 'BD', 1, 50, 'Neuf', 100),
('Test2', 510, 'Auteur2', '1999-01-12', 'BD', 1, 50, 'Neuf', 40);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(60) NOT NULL,
  `mdp_user` varchar(60) NOT NULL,
  `fonction_user` varchar(60) NOT NULL,
  `ville_user` varchar(60) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `mdp_user`, `fonction_user`, `ville_user`) VALUES
(1, 'cdi1', 'cdi1', 'gestionnaire CDI', 'Paris'),
(2, 'ad1', 'ad1', 'adhérent', 'Paris');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
