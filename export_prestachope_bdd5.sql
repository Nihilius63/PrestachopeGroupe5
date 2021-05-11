-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 mai 2021 à 17:13
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3
DROP DATABASE IF EXISTS prestachope_bdd5;
CREATE DATABASE prestachope_bdd5;
USE prestachope_bdd5;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prestachope_bdd5`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `categorieProduit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `categorieProduit`) VALUES
(1, 'Biere'),
(2, 'Futs'),
(3, 'Apéro'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `facture` varchar(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `facture`, `idClient`) VALUES
(1, '28', 1),
(2, '28', 1),
(3, '28', 1),
(4, '28', 1),
(5, '28', 1),
(6, '28', 1),
(7, '28', 1),
(8, '28', 1),
(9, '28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`idCommande`, `idProduit`, `quantite`) VALUES
(1, 10, 7),
(9, 10, 7);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `message` text NOT NULL,
  `statuts` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prix` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idSousCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `prix`, `description`, `stock`, `image`, `idCategorie`, `idSousCategorie`) VALUES
(8, 'Futs Desperados 50l', '1.50', 'Slt a tous c moi la bierre', 789, 'assets/img/desperados-red.png', 2, 4),
(9, 'Affligem Blonde', '3.99', 'Biere Blonde | 6,8%', 12, 'assets/img/affligem_blond.png', 1, 3),
(10, 'Cuvee Des Trolls', '3.99', 'Bière Blonde | 7.0% | 25cl', 13, 'assets/img/cuvee-des-trolls.png', 1, 3),
(11, 'Het Nest Pokerface', '4,99', 'Bière Blanche | 5,5 % | 33cl', 2, 'assets/img/het-nest-pokerface.png', 1, 5),
(12, 'Judas', '3.99', 'Bière Blonde | 8,6% | 33cl', 12, 'assets/img/judas.png', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `idSousCategorie` int(11) NOT NULL,
  `nomSousCategorie` varchar(20) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `souscategorie`
--

INSERT INTO `souscategorie` (`idSousCategorie`, `nomSousCategorie`, `idCategorie`) VALUES
(3, '5L', 2),
(4, 'Blonde', 1),
(5, 'Blanche', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `cagnote` int(11) NOT NULL DEFAULT 10000,
  `admin` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  `timeBan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idClient`, `nom`, `prenom`, `adresse`, `mail`, `motdepasse`, `cagnote`, `admin`, `ban`, `timeBan`) VALUES
(1, 'Burdin', 'Lucas', 'Non', 'lucas.burdin63@gmail.com', '1234', 10000, 0, 0, '2021-05-11 15:13:08');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`idCommande`,`idProduit`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idSousCategorie` (`idSousCategorie`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`idSousCategorie`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idClient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Utilisateurs_FK` FOREIGN KEY (`idClient`) REFERENCES `utilisateurs` (`idClient`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `Contact_Utilisateurs_FK` FOREIGN KEY (`idClient`) REFERENCES `utilisateurs` (`idClient`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE,
  ADD CONSTRAINT `Produit_SousCategorie_FK` FOREIGN KEY (`idSousCategorie`) REFERENCES `souscategorie` (`idSousCategorie`) ON DELETE CASCADE;

ALTER TABLE `Commande_Produit`
  ADD CONSTRAINT `Contenir_Commande_FK` FOREIGN KEY (`idCommande`) REFERENCES `Commande`(`idCommande`)ON DELETE CASCADE,
  ADD CONSTRAINT `Contenir_Produit0_FK` FOREIGN KEY (`idProduit`) REFERENCES `Produit`(`idProduit`)ON DELETE CASCADE;
--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `SousCategorie_Categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
