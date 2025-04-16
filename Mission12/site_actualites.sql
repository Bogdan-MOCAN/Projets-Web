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
-- Base de données :  `site_actualites`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `Identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Nationalite` varchar(50) NOT NULL,
  `Adresse_email` varchar(50) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`Identifiant`, `Nom`, `Prenom`, `Age`, `Nationalite`, `Adresse_email`, `Mdp`) VALUES
(1, 'Dupont', 'Jean', 35, 'Français', 'jean.dupont@example.com', 'motdepasse123'),
(4, 'Durand', 'Marc', 30, 'Français', 'durant@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Aa', 'Aa', 20, 'Français', 'aa@aa.com', '4124bc0a9335c27f086f24ba207a4912');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `Identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) NOT NULL,
  `Contenu` text NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Date_publication` date NOT NULL,
  `Identifiant_Administrateur` int(11) NOT NULL,
  `Identifiant_Categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`),
  KEY `Article_Administrateur_FK` (`Identifiant_Administrateur`),
  KEY `Article_Categorie0_FK` (`Identifiant_Categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`Identifiant`, `Titre`, `Contenu`, `Image`, `Date_publication`, `Identifiant_Administrateur`, `Identifiant_Categorie`) VALUES
(49, 'Intel dévoile son processeur', 'Intel présente un CPU encore plus rapide et économique...', 'Images/1743185285_1743178012_1743175980_Image3.png', '2025-03-28', 1, NULL),
(50, 'Microsoft annonce Windows 12', 'Windows 12 apporte une refonte totale de l’interfa...', 'Images/1743176011_Image4.png', '2025-03-28', 1, NULL),
(51, 'Apple prépare une mise à jour majeure pour macOS', 'Les nouvelles fonctionnalités de la prochaine vers...', 'Images/1743176047_Image7.png', '2025-03-28', 1, NULL),
(52, 'Bitcoin dépasse les 100 000 $', 'Le Bitcoin atteint un record historique en bourse.', 'Images/1743176073_Image9.png', '2025-03-28', 1, NULL),
(53, 'La 6G en développement', 'Les chercheurs avancent rapidement sur la prochain...', 'Images/1743176102_Image5.png', '2025-03-28', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `Identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`Identifiant`, `Nom`, `Description`) VALUES
(1, 'Intelligence Artificielle', ''),
(2, 'Cybersécurité', ''),
(3, 'Matériel Informatique', ''),
(4, 'Logiciels & Applications', ''),
(5, 'Cryptomonnaies', ''),
(6, 'Télécommunications', ''),
(7, 'Réalité Virtuelle & Augmentée', '');

-- --------------------------------------------------------

--
-- Structure de la table `message_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `message_utilisateurs` (
  `Identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `Identifiant_Administrateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`),
  KEY `Message_utilisateurs_Administrateur_FK` (`Identifiant_Administrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `message_utilisateurs`
--

INSERT INTO `message_utilisateurs` (`Identifiant`, `Nom`, `E_mail`, `Message`, `Identifiant_Administrateur`) VALUES
(1, 'Test1', 'Test1@gmail.com', 'Test, merci', NULL),
(2, 'Test2', 'Test2@gmail.com', 'Merci, ceci est un test', NULL),
(3, 'Test2', 'Test2@gmail.com', 'Test', NULL),
(4, 'Test3', 'Test3@gmail.com', 'Ok, test', NULL),
(5, 'Test4', 'Test4@gmail.com', 'Ok', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Article_Administrateur_FK` FOREIGN KEY (`Identifiant_Administrateur`) REFERENCES `administrateur` (`Identifiant`),
  ADD CONSTRAINT `Article_Categorie0_FK` FOREIGN KEY (`Identifiant_Categorie`) REFERENCES `categorie` (`Identifiant`);

--
-- Contraintes pour la table `message_utilisateurs`
--
ALTER TABLE `message_utilisateurs`
  ADD CONSTRAINT `Message_utilisateurs_Administrateur_FK` FOREIGN KEY (`Identifiant_Administrateur`) REFERENCES `administrateur` (`Identifiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
