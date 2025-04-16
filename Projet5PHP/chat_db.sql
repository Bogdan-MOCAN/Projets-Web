-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Avril 2025 à 10:26
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `chat_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `connecte`
--

CREATE TABLE IF NOT EXISTS `connecte` (
  `username` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `connectid` int(11) NOT NULL,
  PRIMARY KEY (`connectid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connecte`
--

INSERT INTO `connecte` (`username`, `ip`, `connectid`) VALUES
('bb', '79.95.86.38', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg` text NOT NULL,
  `senderid` int(11) NOT NULL,
  `msgor` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`msgor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`msg`, `senderid`, `msgor`) VALUES
('Test2', 7, 8),
('Test1', 6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `identifiant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`identifiant`, `password`, `iduser`) VALUES
('bb', 'bb', 7),
('aa', 'aa', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
