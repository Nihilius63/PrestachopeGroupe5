-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 mai 2021 à 13:19
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

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
(1, 'Bières'),
(2, 'Fûts'),
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
(9, 'Affligem Blonde', '3.99', 'Biere Blonde | 6,8%', 12, 'assets/img/affligem_blond.png', 1, 4),
(10, 'Cuvee Des Trolls', '3.99', 'Bière Blonde | 7.0% | 25cl', 13, 'assets/img/cuvee-des-trolls.png', 1, 4),
(11, 'Het Nest Pokerface', '4.99', 'Bière Blanche | 5,5 % | 33cl', 2, 'assets/img/het-nest-pokerface.png', 1, 5),
(12, 'Judas', '3.99', 'Bière Blonde | 8,6% | 33cl', 12, 'assets/img/judas.png', 1, 4),
(13, 'Delirium Tremens', '4,99', 'Bière Blonde | 8,5% | 33 cl', 30, 'assets/img/delirium-tremens.png', 1, 4),
(14, 'Paljas Blond', '3.99', 'Bière Blanche | 6,0 % | 33cl', 50, 'assets/img/paljas-blond.png', 1, 4),
(15, 'Affligem Blonde (5L)', '20,99', 'Bière Blonde | 6,8% | 5 Litres', 22, 'assets/img/affligem-blond-5l.png', 2, 3),
(16, 'Heineken (5L)', '18,99', 'Lager | 5,0% | 5 Litres', 45, 'assets/img/heineken-5l.png', 2, 3),
(17, 'Desperados Red (5L)', '18,99', 'Bière Fruitée | 5,9% | 5 Litres', 60, 'assets/img/desperados-red.png', 2, 3),
(18, 'Pelforth Blonde (5L)', '17,99', 'Lager | 5,8% | 5 Litres', 23, 'assets/img/pelforth-blonde.png', 2, 3),
(19, 'Affligem Blonde (2L)', '9,89', 'Bière Blonde | 6,8% | 2 Litres', 12, 'assets/img/affligemblonde.png', 2, 6),
(20, 'Delirium Tremens(2L)', '16,88', 'Bière Blonde | 8,5% | 2 Litres', 7, 'assets/img/delirium-tremens-2l.png', 2, 6);

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
(3, 'Fûts 5 Litres', 2),
(4, 'Bières Blonde', 1),
(5, 'Bières Blanche', 1),
(6, 'Fûts 2 Litres', 2);

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
(1, 'Burdin', 'Lucas', 'Non', 'lucas.burdin63@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 10000, 1, 0, '2021-05-13 16:17:52'),
(2, 'Nathim', 'Richard', '11 rue Supercool', 'nath.himxd@outlook.fr', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 10000, 0, 0, '2021-05-14 15:54:27');

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
  ADD PRIMARY KEY (`idCommande`,`idProduit`),
  ADD KEY `Contenir_Produit0_FK` (`idProduit`);

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
  ADD KEY `idSousCategorie` (`idSousCategorie`),
  ADD KEY `Produit_Categorie_FK` (`idCategorie`);

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
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Utilisateurs_FK` FOREIGN KEY (`idClient`) REFERENCES `utilisateurs` (`idClient`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `Contenir_Commande_FK` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE,
  ADD CONSTRAINT `Contenir_Produit0_FK` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE;

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

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `SousCategorie_Categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
