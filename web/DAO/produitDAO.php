<?php
class produitDAO 
{
    public static function insertproduct($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.produit(nom, prix, description, stock,idCategorie,image) VALUES (?,?,?,?,?,?)');
    	$dbbb->execute(array($produitDTO->getNom(),$produitDTO->getPrix(),$produitDTO->getDescription(),$produitDTO->getStock(),$produitDTO->getIdCategorie(),$produitDTO->getImage()));
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
            $produit->setImage($db['Image']);
            $tab[]=$produit;
    	}
        return $tab;
    }
        public static function selectproduitbycategorie($categorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `produit` AS PRO INNER JOIN categorie as CAT ON CAT.idCategorie=PRO.idCategorie WHERE PRO.idCategorie=2');
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
            $produit->setImage($db['Image']);
            $tab[]=$produit;
    	}
        return $tab;
    }
}
?>