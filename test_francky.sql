-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 12 avr. 2025 à 07:24
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test_francky`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `reference` varchar(500) NOT NULL,
  `categorie` varchar(500) NOT NULL,
  `fournisseur` varchar(500) NOT NULL,
  `entrepot` varchar(500) NOT NULL,
  `codeBare` varchar(500) NOT NULL,
  `prix` varchar(500) NOT NULL,
  `lotSerie` varchar(500) DEFAULT NULL,
  `matierPremier` varchar(500) NOT NULL,
  `produitFini` varchar(500) NOT NULL,
  `zone` varchar(225) NOT NULL DEFAULT current_timestamp(),
  `datePeremption` varchar(500) DEFAULT NULL,
  `dateFabrication` varchar(225) DEFAULT NULL,
  `produit` varchar(225) DEFAULT NULL,
  `stock` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `reference`, `categorie`, `fournisseur`, `entrepot`, `codeBare`, `prix`, `lotSerie`, `matierPremier`, `produitFini`, `zone`, `datePeremption`, `dateFabrication`, `produit`, `stock`) VALUES
(28, 'ATODY', 'ATODY', 'Alimentaire', 'FastTrade International', 'Entrepôt Nord', '', '', '', '', '', 'zone_1', '', '', '', '100'),
(29, 'VOANJO', 'V1 MADA', 'Alimentaire', 'Eco Matériel SARL', 'Entrepôt Nord', 'Code 1', '5555 AR', 'JK', 'JK', 'PRODUITS 1', 'zone_2', '2025-04-23', '2025-04-23', 'VOANJO', 'STOCK 1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `nom` varchar(11) DEFAULT NULL,
  `prenom` varchar(500) DEFAULT NULL,
  `mdp` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contact` int(20) DEFAULT NULL,
  `adresse` varchar(500) DEFAULT NULL,
  `imag` varchar(500) DEFAULT NULL,
  `type` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `nom`, `prenom`, `mdp`, `email`, `contact`, `adresse`, `imag`, `type`) VALUES
(25, 'kennedy', 'lanto', '', 'kennedy@gmail.com', 341121569, 'UVO', 'uploads/ ', 1),
(26, 'CHARLY', 'LANTOTIANA', 'CHARLY', 'lantotianajosephc@gmail.com', 341121569, '67HA', 'uploads/67f9502427fcc_IMG_20230522_110952.jpg', 0),
(27, 'francky F', 'francky F', 'ffff', 'francky@gmail.com', 2147483647, '57h', 'uploads/67f966640f80f_bf21a94edf9c086f2756a3b4fd928068.0.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
