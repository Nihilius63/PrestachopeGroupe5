DROP DATABASE IF EXISTS prestachope_bdd5;
CREATE DATABASE prestachope_bdd5;
USE prestachope_bdd5;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `categorieProduit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `categorie` (`idCategorie`, `categorieProduit`) VALUES
(1, 'Biere'),
(2, 'Futs'),
(3, 'Apéro'),
(5, 'Autres');


CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `facture` varchar(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `commande` (`idCommande`, `facture`, `idClient`) VALUES
(1, '28', 1),
(2, '28', 1),
(3, '28', 1),
(4, '28', 1),
(5, '28', 1),
(6, '28', 1),
(7, '28', 1),
(8, '28', 1),
(9, '28', 1),
(10, '4.99', 1),
(11, '4.99', 1),
(12, '4.99', 1),
(13, '4.99', 1),
(14, '7.98', 1),
(15, '3.99', 1),
(16, '3.99', 5),
(17, '19.95', 5),
(18, '201', 5);


CREATE TABLE `commande_produit` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `commande_produit` (`idCommande`, `idProduit`, `quantite`) VALUES
(1, 10, 7),
(9, 10, 7),
(10, 11, 1),
(11, 11, 1),
(12, 11, 1),
(13, 11, 1),
(14, 9, 1),
(14, 10, 1),
(15, 10, 1),
(16, 9, 1),
(17, 10, 5),
(18, 41, 1),
(18, 42, 1);


CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `message` text NOT NULL,
  `statuts` int(11) NOT NULL DEFAULT 0,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `contact` (`idContact`, `message`, `statuts`, `idClient`) VALUES
(1, 'slt', 1, 1),
(2, 'Ce site et vraiment génial! J\'adore!', 0, 5),
(5, 'Un site vraiment époustouflant! ', 0, 5);



CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idSousCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `produit` (`idProduit`, `nom`, `prix`, `description`, `stock`, `image`, `idCategorie`, `idSousCategorie`) VALUES
(9, 'Affligem Blonde', 3.99, 'Biere Blonde | 6,8%', 10, 'assets/img/affligem_blond.png', 1, 4),
(10, 'Cuvee Des Trolls', 3.99, 'Bière Blonde | 7.0% | 25cl', 6, 'assets/img/cuvee-des-trolls.png', 1, 4),
(11, 'Het Nest Pokerface', 4.99, 'Bière Blanche | 5,5 % | 33cl', 119, 'assets/img/het-nest-pokerface.png', 1, 5),
(12, 'Judas', 3, 'Bière Blonde | 8,6% | 33cl', 10, 'assets/img/judas.png', 1, 4),
(13, 'Delirium Tremens', 4, 'Bière Blonde | 8,5% | 33 cl', 30, 'assets/img/delirium-tremens.png', 1, 4),
(14, 'Paljas Blond', 3.99, 'Bière Blanche | 6,0 % | 33cl', 50, 'assets/img/paljas-blond.png', 1, 5),
(15, 'Affligem Blonde (5L)', 20, 'Bière Blonde | 6,8% | 5 Litres', 22, 'assets/img/affligem-blond-5l.png', 2, 3),
(16, 'Heineken (5L)', 18, 'Lager | 5,0% | 5 Litres', 45, 'assets/img/heineken-5l.png', 2, 3),
(17, 'Desperados Red (5L)', 18, 'Bière Fruitée | 5,9% | 5 Litres', 60, 'assets/img/desperados-red.png', 2, 3),
(18, 'Pelforth Blonde (5L)', 17, 'Lager | 5,8% | 5 Litres', 23, 'assets/img/pelforth-blonde.png', 2, 3),
(19, 'Affligem Blonde (2L)', 9, 'Bière Blonde | 6,8% | 2 Litres', 12, 'assets/img/affligemblonde.png', 2, 6),
(20, 'Delirium Tremens(2L)', 16, 'Bière Blonde | 8,5% | 2 Litres', 7, 'assets/img/delirium-tremens-2l.png', 2, 6),
(25, 'Lindemans Kriek', 3.5, 'Bière Fruitée | 3,5% | 25 cl', 500, 'assets/img/lindemans-kriek.25_1_1.png', 1, 9),
(26, 'Mort Subite Kriek Lambic', 4.5, 'Bière Fruitée | 4,0% | 25 cl', 150, 'assets/img/mort-subite-kriek-lambic.25_14867_0.png', 1, 9),
(27, 'Grisette Fruits des Bois', 5, 'Bière Fruitée | 3,5% | 25 cl', 1000, 'assets/img/grisette-fruits-des-bois.25_1_1.png', 1, 9),
(28, ' Ninkasi Blanche', 2.5, 'Bière Blanche | 4,8% | 33 cl', 600, 'assets/img/ninkasi-blanche.33_1_1.png', 1, 5),
(29, 'Limburgse Witte', 1.55, 'Bière Blanche | 5,0% | 25 cl', 500, 'assets/img/limburgse-witte.25_1_1.png', 1, 5),
(30, 'Birra Moretti L\'Autentica - Fût The SUB', 10, 'Lager | 4,6% | 2 Litres', 300, 'assets/img/birra-moretti-lautentica---sub-keg_beer_15747_02.png', 2, 6),
(32, 'Saucisson à l’âne', 1.5, 'Saucisson | Ane | Origine France', 400, 'assets/img/saucisson-a-l-ane.jpg', 3, 10),
(33, 'Saucisson enrobé poivre', 3.5, 'Saucisson Poivre | Porc | Origine France', 600, 'assets/img/saucisson-enrobe-poivre.jpg', 3, 10),
(34, 'Saucisson Nature', 6, 'Saucisson | Porc | Origine France', 800, 'assets/img/saucisson-nature.jpg', 3, 10),
(36, 'Bretzels d\'épeautre ', 20, 'Bretzels | Epeautre | 150g', 230, 'assets/img/moulin-des-moines-bretzels-petit-epeautre-a-l-huile-d-olive-150g.jpg', 3, 11),
(37, 'Chips à la truffe noir', 3.5, 'Chips | Truffe Noir | 100g', 300, 'assets/img/aperitivos-de-anavieja-chips-a-la-truffe-noir-100g.jpg', 3, 11),
(38, 'Fromage Aperitifs', 3.5, 'Fromage | Chèvre | 150g', 10, 'assets/img/3573064611507-1.jpg', 3, 12),
(41, 'Glacière Corona ', 200, 'Glacière Corona | 120l', 19, 'assets/img/61qtL5JUT3L._AC_SX425_.jpg', 5, 0),
(42, 'T Shirt Duff', 1, 'T Shirt | Coton | Made In China', 299, 'assets/img/duff-beer.jpg', 5, 0),
(43, 'T Shirt \"Humoristique\"', 3.5, 'T Shirt | Coton | Made In Taiwan', 600, 'assets/img/images.jpg', 5, 0),
(44, 'Décapsuleur en bois', 1.55, 'Décapsuleur | Bouleau | 40cm', 300, 'assets/img/PRE2-decapsuleur-en-bois-personnalisable-avec-un-marquage-pour-offrir.jpg', 5, 0);



CREATE TABLE `souscategorie` (
  `idSousCategorie` int(11) NOT NULL,
  `nomSousCategorie` varchar(20) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `souscategorie` (`idSousCategorie`, `nomSousCategorie`, `idCategorie`) VALUES
(3, 'Fûts 5 Litres', 2),
(4, 'Bières Blonde', 1),
(5, 'Bières Blanche', 1),
(6, 'Fûts 2 Litres', 2),
(9, 'Bières Fruitée', 1),
(10, 'Viande', 3),
(11, ' Biscuits apéritifs', 3),
(12, 'Fromage', 3);



CREATE TABLE `utilisateurs` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `cagnote` int(11) NOT NULL DEFAULT 10000,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `utilisateurs` (`idClient`, `nom`, `prenom`, `adresse`, `mail`, `motdepasse`, `cagnote`, `admin`) VALUES
(1, 'Burdin', 'Lucas', '20 rue des Balaies 66200 Vesoul', 'lucas.burdin63@gmail.com', sha1('Burdin'), 9990, 1),
(2, 'Richard', 'Nathim', '11 rue Supercool 21500 Quimper', 'nath.himxd@outlook.fr', sha1('Richard'), 10000, 0),
(4, 'Teamspeak', 'Patrick', '1 Rue des fleurs 63400 Saumur', 'test@gmail.com', sha1('Teamspeak'), 10000, 0),
(5, 'Jean', 'Paul', '1 rue des mimosas 52120 Paris', 'jeanpaul@gmail.com', sha1('Jean'), 9775, 0);


ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);


ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idClient` (`idClient`);


ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`idCommande`,`idProduit`),
  ADD KEY `Contenir_Produit0_FK` (`idProduit`);


ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`),
  ADD KEY `idClient` (`idClient`);


ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idSousCategorie` (`idSousCategorie`),
  ADD KEY `Produit_Categorie_FK` (`idCategorie`);


ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`idSousCategorie`),
  ADD KEY `idCategorie` (`idCategorie`);

ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idClient`);


ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;


ALTER TABLE `souscategorie`
  MODIFY `idSousCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `utilisateurs`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Utilisateurs_FK` FOREIGN KEY (`idClient`) REFERENCES `utilisateurs` (`idClient`) ON DELETE CASCADE;


ALTER TABLE `commande_produit`
  ADD CONSTRAINT `Contenir_Commande_FK` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE,
  ADD CONSTRAINT `Contenir_Produit0_FK` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE;


ALTER TABLE `contact`
  ADD CONSTRAINT `Contact_Utilisateurs_FK` FOREIGN KEY (`idClient`) REFERENCES `utilisateurs` (`idClient`) ON DELETE CASCADE;


ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE;


ALTER TABLE `souscategorie`
  ADD CONSTRAINT `SousCategorie_Categorie_FK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE;
COMMIT;

