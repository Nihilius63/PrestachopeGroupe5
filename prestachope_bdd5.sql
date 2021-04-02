#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE IF EXISTS prestachope_bdd5;
CREATE DATABASE prestachope_bdd5;
USE prestachope_bdd5;

#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        idClient   Int  Auto_increment  NOT NULL ,
        nom        Varchar (40) NOT NULL ,
        prenom     Varchar (40) NOT NULL ,
        adresse    Varchar (40) NOT NULL ,
        mail       Varchar (40) NOT NULL ,
        motdepasse Varchar (40) NOT NULL ,
        admin      Int NOT NULL ,
        ban        Int NOT NULL ,
        timeBan    TimeStamp NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        idCategorie      Int  Auto_increment  NOT NULL ,
        categorieProduit Varchar (20) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produit
#------------------------------------------------------------

CREATE TABLE Produit(
        idProduit   Int  Auto_increment  NOT NULL ,
        nom         Varchar (20) NOT NULL ,
        prix        Varchar (20) NOT NULL ,
        description Text Not NULL ,
        stock       Int NOT NULL ,
        idCategorie Int NOT NULL
	,CONSTRAINT Produit_PK PRIMARY KEY (idProduit)

	,CONSTRAINT Produit_Categorie_FK FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contact
#------------------------------------------------------------

CREATE TABLE Contact(
        idContact Int  Auto_increment  NOT NULL ,
        message   Text NOT NULL ,
        statuts   Int NOT NULL ,
        idClient  Int NOT NULL
	,CONSTRAINT Contact_PK PRIMARY KEY (idContact)

	,CONSTRAINT Contact_Utilisateurs_FK FOREIGN KEY (idClient) REFERENCES Utilisateurs(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        idCommande Int  Auto_increment  NOT NULL ,
        facture    Int NOT NULL ,
        idClient   Int NOT NULL
	,CONSTRAINT Commande_PK PRIMARY KEY (idCommande)

	,CONSTRAINT Commande_Utilisateurs_FK FOREIGN KEY (idClient) REFERENCES Utilisateurs(idClient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SousCategorie
#------------------------------------------------------------

CREATE TABLE SousCategorie(
        idSousCategorie  Int  Auto_increment  NOT NULL ,
        nomSousCategorie Varchar (20) NOT NULL ,
        idCategorie      Int NOT NULL
	,CONSTRAINT SousCategorie_PK PRIMARY KEY (idSousCategorie)

	,CONSTRAINT SousCategorie_Categorie_FK FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Commande_Produit(
        idCommande Int NOT NULL ,
        idProduit  Int NOT NULL ,
        quantite   Int NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (idCommande,idProduit)

	,CONSTRAINT Contenir_Commande_FK FOREIGN KEY (idCommande) REFERENCES Commande(idCommande)
	,CONSTRAINT Contenir_Produit0_FK FOREIGN KEY (idProduit) REFERENCES Produit(idProduit)
)ENGINE=InnoDB;

