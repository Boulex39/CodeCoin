-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 août 2025 à 20:38
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `codecoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `categorie_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user_id`),
  KEY `id_categorie` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `description`, `prix`, `created_at`, `user_id`, `categorie_id`, `image`) VALUES
(1, 'PC Gamer', 'Tour gaming avec RTX 3060', 1200.00, '2025-08-18 14:45:05', 1, 1, NULL),
(2, 'Canapé 3 places', 'Canapé en tissu gris bon état', 250.00, '2025-08-18 14:45:05', 2, 2, NULL),
(3, 'Peugeot 208', 'Voiture 2018, 80.000 km', 8900.00, '2025-08-18 14:45:05', 2, 3, NULL),
(4, 'developpeur couché', 'chercher développeur couché 150kg', 2500.00, '2025-08-21 21:05:45', 5, 4, NULL),
(8, 'Maison', 'Maison pour grande famille', 250000.00, '2025-08-22 14:49:03', 5, 1, NULL),
(7, 'ps5', 'Vends ps5 500 jeux cracker parce que j\'ai craqué', 500.00, '2025-08-22 14:47:00', 5, 3, NULL),
(9, 'Audi A3', 'Audi A3 2017 2.0tdi quattro 150000km', 20000.00, '2025-08-22 14:57:05', 4, 2, NULL),
(10, 'lit', 'lit 180 X 200', 200.00, '2025-08-22 14:59:13', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Informatique'),
(2, 'Maison'),
(3, 'Véhicule'),
(4, 'Emploi');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `password`, `created_at`) VALUES
(1, 'Alice', 'alice@mail.com', 'hash123', '2025-08-18 14:45:05'),
(2, 'Bob', 'bob@mail.com', 'hash456', '2025-08-18 14:45:05'),
(3, 'boulex', 'boulex39200@gmail.com', '$2y$10$n4RoXgROJm2OjzIflVcU.emWrztYQ1xHsZohsw/ZO2XA3wEAVywqq', '2025-08-21 16:24:28'),
(4, 'rebecca', 'rebecca@gmail.com', '$2y$10$v61qfld7ppSemrLPO.V6cegkgHsNzISh62FVYX4bNbsgffohLHaqm', '2025-08-21 19:36:53'),
(5, 'ali', 'ali@gmail.com', '$2y$10$xMeRveAYus.ex3J7uXM/ROaGPsLqO/R7/VH1kGgVRb1.vFGawsU0.', '2025-08-21 20:04:19'),
(6, 'Kassim', 'kassim@gmail.com', '$2y$10$BhF15h7aZboa/xc.IWNi9OcTE8XbgbBEz71b4K923gnYXahm9RKkC', '2025-08-24 21:17:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
