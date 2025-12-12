-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 déc. 2025 à 10:49
-- Version du serveur : 8.0.41
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `resa`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `USER` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `MDP` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMCPTE` char(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRENOMCPTE` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPECOMPTE` char(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ADRMAILCPTE` char(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOTELCPTE` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NOPORTCPTE` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCPTE`, `PRENOMCPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPECOMPTE`, `ADRMAILCPTE`, `NOTELCPTE`, `NOPORTCPTE`) VALUES
('User1', '$2y$10$9Z.wDqyAwIZNaQU3TstcceE5tfUimMcAmPfVvTRCeZuM./klIL1ja', 'User1', 'User1', '2025-09-17', NULL, 'GES', 'user1@gmail.com', '0602020202', '0602020202'),
('User2', '$2y$10$Di60Gi5MV.NRTSz9WMQR5uBnhIVyG2ihcBpg/XrASRzJQgWAJnfaK', 'User2', 'User2', '2025-09-17', NULL, 'USG', 'user2@gmail.com', '0602020202', '0602020202');

-- --------------------------------------------------------

--
-- Structure de la table `etat_resa`
--

CREATE TABLE `etat_resa` (
  `CODEETATRESA` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMETATRESA` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etat_resa`
--

INSERT INTO `etat_resa` (`CODEETATRESA`, `NOMETATRESA`) VALUES
('AN', 'Annulée'),
('EN', 'En attente'),
('PA', 'Payée');

-- --------------------------------------------------------

--
-- Structure de la table `hebergement`
--

CREATE TABLE `hebergement` (
  `NOHEB` int NOT NULL,
  `CODETYPEHEB` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMHEB` char(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NBPLACEHEB` int DEFAULT NULL,
  `SURFACEHEB` int DEFAULT NULL,
  `INTERNET` tinyint(1) DEFAULT NULL,
  `ANNEEHEB` int DEFAULT NULL,
  `SECTEURHEB` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ORIENTATIONHEB` char(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ETATHEB` char(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DESCRIHEB` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PHOTOHEB` char(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TARIFSEMHEB` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hebergement`
--

INSERT INTO `hebergement` (`NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES
(1, 'MAI01', 'Maison du Lac', 6, 120, 1, 2015, 'Nord', 'N', 'Disponible', 'Maison confortable avec vue sur le lac.', 'maison.jpg', 175.00),
(2, 'MAI02', 'Maison des Fleurs', 4, 85, 1, 2018, 'Sud', 'S', 'Disponible', 'Maison charmante avec jardin et terrasse.', 'maison3.webp', 150.00),
(3, 'MAI03', 'Maison Panorama', 4, 80, 1, 2018, 'Est', 'E', 'Disponible', 'Maison charmante avec jardin et terrasse.', 'maison4.webp', 195.00),
(4, 'APT02', 'Appartement Village', 3, 70, 1, 2022, 'Ouest', 'O', 'Disponible', 'Beau appartement avec terrasse.', 'maison8.jpg', 170.00),
(5, 'MOB02', 'Mobil Home', 2, 50, 1, 2023, 'Nord', 'N', 'Disponible', 'Petit mobil home conford.', 'maison5.jpg', 140.00),
(6, 'APT03', 'Appartement Ville', 4, 80, 1, 2015, 'Est', 'E', 'Disponible', 'Grand appartement 5 pièces avec cuisine ouverte et baie vitrée coulissante.\r\n', 'maison9.png', 185.00),
(7, 'MAI02', 'Maison Village', 5, 120, 1, 2007, 'Est', 'E', 'Disponible', 'Maison fleuries au centre du village avec 5 chambres.', 'maison7.jpg', 195.00),
(8, 'MAI01', 'Maison Pavillonnaire', 4, 90, 0, 2005, 'Sud', 'S', 'Disponible', 'Petite maison pavillonnaire avec grand jardin.', 'maison10.jpg', 170.00);

-- --------------------------------------------------------

--
-- Structure de la table `resa`
--

CREATE TABLE `resa` (
  `NORESA` int NOT NULL,
  `USER` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `DATEDEBSEM` date NOT NULL,
  `NOHEB` int NOT NULL,
  `CODEETATRESA` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `DATERESA` date DEFAULT NULL,
  `DATEARRHES` date DEFAULT NULL,
  `MONTANTARRHES` decimal(7,2) DEFAULT NULL,
  `NBOCCUPANT` int DEFAULT NULL,
  `TARIFSEMRESA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `resa`
--

INSERT INTO `resa` (`NORESA`, `USER`, `DATEDEBSEM`, `NOHEB`, `CODEETATRESA`, `DATERESA`, `DATEARRHES`, `MONTANTARRHES`, `NBOCCUPANT`, `TARIFSEMRESA`) VALUES
(1, 'User2', '2025-09-17', 1, 'PA', '2025-09-17', '2025-09-17', 225.00, 5, 750.00),
(2, 'User2', '2025-10-15', 3, 'PA', '2025-09-26', '2025-10-15', 58.50, 1, 195.00);

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE `semaine` (
  `DATEDEBSEM` date NOT NULL,
  `DATEFINSEM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`DATEDEBSEM`, `DATEFINSEM`) VALUES
('2025-09-17', '2025-09-23'),
('2025-09-24', '2025-09-30'),
('2025-10-01', '2025-10-07'),
('2025-10-08', '2025-10-14'),
('2025-10-15', '2025-10-21');

-- --------------------------------------------------------

--
-- Structure de la table `type_heb`
--

CREATE TABLE `type_heb` (
  `CODETYPEHEB` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMTYPEHEB` char(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_heb`
--

INSERT INTO `type_heb` (`CODETYPEHEB`, `NOMTYPEHEB`) VALUES
('APT01', 'Appartement Vue Lac'),
('APT02', 'Appartement Centre Village'),
('APT03', 'Appartement Prestige'),
('BUN01', 'Bungalow Plage'),
('BUN02', 'Bungalow Jardin'),
('CHA01', 'Chalet Montagne'),
('CHA02', 'Chalet Forêt'),
('CHA03', 'Chalet Luxe'),
('MAI01', 'Maison du Lac'),
('MAI02', 'Maison des Fleurs'),
('MAI03', 'Maison Panorama'),
('MOB01', 'Mobil Home Standard'),
('MOB02', 'Mobil Home Confort'),
('STU01', 'Studio Compact'),
('STU02', 'Studio Familial');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`USER`);

--
-- Index pour la table `etat_resa`
--
ALTER TABLE `etat_resa`
  ADD PRIMARY KEY (`CODEETATRESA`);

--
-- Index pour la table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`NOHEB`),
  ADD KEY `I_FK_HEBERGEMENT_TYPE_HEB` (`CODETYPEHEB`);

--
-- Index pour la table `resa`
--
ALTER TABLE `resa`
  ADD PRIMARY KEY (`NORESA`),
  ADD KEY `I_FK_RESA_COMPTE` (`USER`),
  ADD KEY `I_FK_RESA_SEMAINE` (`DATEDEBSEM`),
  ADD KEY `I_FK_RESA_HEBERGEMENT` (`NOHEB`),
  ADD KEY `I_FK_RESA_ETAT_RESA` (`CODEETATRESA`);

--
-- Index pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`DATEDEBSEM`);

--
-- Index pour la table `type_heb`
--
ALTER TABLE `type_heb`
  ADD PRIMARY KEY (`CODETYPEHEB`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hebergement`
--
ALTER TABLE `hebergement`
  ADD CONSTRAINT `hebergement_ibfk_1` FOREIGN KEY (`CODETYPEHEB`) REFERENCES `type_heb` (`CODETYPEHEB`);

--
-- Contraintes pour la table `resa`
--
ALTER TABLE `resa`
  ADD CONSTRAINT `resa_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `compte` (`USER`),
  ADD CONSTRAINT `resa_ibfk_2` FOREIGN KEY (`DATEDEBSEM`) REFERENCES `semaine` (`DATEDEBSEM`),
  ADD CONSTRAINT `resa_ibfk_3` FOREIGN KEY (`NOHEB`) REFERENCES `hebergement` (`NOHEB`),
  ADD CONSTRAINT `resa_ibfk_4` FOREIGN KEY (`CODEETATRESA`) REFERENCES `etat_resa` (`CODEETATRESA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
