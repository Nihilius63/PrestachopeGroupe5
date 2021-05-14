<?php
class produitDAO 
{
    public static function insertproduct($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.produit(nom, prix, description, stock,idCategorie,image,idSousCategorie) VALUES (?,?,?,?,?,?,?)');
    	$dbbb->execute(array($produitDTO->getNom(),$produitDTO->getPrix(),$produitDTO->getDescription(),$produitDTO->getStock(),$produitDTO->getIdCategorie(),$produitDTO->getImage(),$produitDTO->getIdsousCategorie()));
    }
        public static function selectallproduit() 
    {
        include_once 'DTO/produitDTO.php';
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM prestachope_bdd5.produit');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit-> setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $tab[]=$produit;
    	}
        return $tab;
    }
        public static function deleteproduit($produitDTO)
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('DELETE FROM prestachope_bdd5.produit WHERE idProduit=? ');
    	$dbbb->execute(array($produitDTO->getId()));
    }
    public static function selectproduitrandom($id) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM produit WHERE idCategorie=? ORDER BY RAND() LIMIT 4');
    	$dbbb->execute(array($id));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit->setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $produit->setImage($db['image']);
            $tab[]=$produit;
    	}
        return $tab;
    }
        public static function selectproduitbycategorie($categorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `produit` AS PRO INNER JOIN categorie as CAT ON CAT.idCategorie=PRO.idCategorie WHERE PRO.idCategorie=?');
    	$dbbb->execute(array($categorieDTO->getIdCategorie()));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit->setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $produit->setImage($db['image']);
            $tab[]=$produit;
    	}
        return $tab;
    }
        public static function selectproduitbysouscategorie($souscategorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `produit` AS PRO INNER JOIN souscategorie as SO ON SO.idSousCategorie=PRO.idSousCategorie WHERE PRO.idSousCategorie=?');
    	$dbbb->execute(array($souscategorieDTO->getIdSousCategorie()));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit->setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $produit->setImage($db['image']);
            $tab[]=$produit;
    	}
        return $tab;
    }
    public static function selectproduitbyid($id) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `produit` WHERE idProduit=?');
    	$dbbb->execute(array($id));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit->setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $produit->setIdsouscategorie($db['idSousCategorie']);
            $produit->setImage($db['image']);
            return $produit;
    	}
    }
        public static function selectproduitbynom($nom) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `produit` WHERE nom=?');
    	$dbbb->execute(array($nom));
        $d = $dbbb->fetchAll();
    	foreach ($d as $db) 
    	{
            $produit= new produitDTO();
            $produit->setId($db['idProduit']);
            $produit->setNom($db['nom']);
            $produit->setPrix($db['prix']);
            $produit->setDescription($db['description']);
            $produit->setStock($db['stock']);
            $produit->setIdCategorie($db['idCategorie']);
            $produit->setImage($db['image']);
            return $produit;
    	}
    }
    public static function updateproduit($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('UPDATE `produit` SET `nom`=?,`prix`=?,`description`=?,`stock`=?,`idCategorie`=?,`idSousCategorie`=? WHERE idProduit=?');
    	$dbbb->execute(array($produitDTO->getNom(),$produitDTO->getPrix(),$produitDTO->getDescription(),$produitDTO->getStock(),$produitDTO->getIdCategorie(),$produitDTO->getIdsouscategorie(),$produitDTO->getId()));
    }
        public static function updatestock($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('UPDATE `produit` SET stock=stock-? where idProduit=?');
    	$dbbb->execute(array($produitDTO->getQuantite(),$produitDTO->getIdProduit()));
    }
    
}
?>