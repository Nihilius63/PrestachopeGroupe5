<?php
class categorieDAO 
{
    public static function insertcategorie($categorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.categorie(categorieProduit) VALUES (?)');
    	$dbbb->execute(array($categorieDTO->getCategorieProduit()));
    }
        public static function selectcategorie() 
    {
        include_once 'DTO/categorieDTO.php';
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM prestachope_bdd5.categorie');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $categorie= new categorieDTO();
            $categorie->setCategorieProduit($db['categorieProduit']);
            $categorie->setIdCategorie($db['idCategorie']);
            $tab[]=$categorie;
    	}
        return $tab;
    }
     public static function selectcategoriebyid($id) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM `categorie` WHERE idCategorie=?');
    	$dbbb->execute(array($id));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $categorie= new categorieDTO();
            $categorie->setIdCategorie($db['idCategorie']);
            $categorie->setCategorieProduit($db['categorieProduit']);
            $tab[]=$categorie;
    	}
        return $tab;
    }
    public static function deletecategorie($categorieDTO)
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('DELETE FROM prestachope_bdd5.produit WHERE idCategorie=? ');
    	$dbbb->execute(array($categorieDTO->getIdCategorie()));
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('DELETE FROM prestachope_bdd5.souscategorie WHERE idCategorie=? ');
    	$dbbb->execute(array($categorieDTO->getIdCategorie()));
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('DELETE FROM prestachope_bdd5.categorie WHERE idCategorie=? ');
    	$dbbb->execute(array($categorieDTO->getIdCategorie()));
    }
    public static function updatecategorie($categorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('UPDATE `categorie` SET `categorieProduit`=? WHERE idCategorie=?');
    	$dbbb->execute(array($categorieDTO->getCategorieProduit(),$categorieDTO->getIdCategorie()));
    }
}
?>