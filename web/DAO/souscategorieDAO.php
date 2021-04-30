<?php
class souscategorieDAO 
{
    public static function insertsouscategorie($souscategorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.souscategorie(nomSousCategorie,idCategorie) VALUES (?,?)');
    	$dbbb->execute(array($souscategorieDTO->getNomSousCategorie(),$souscategorieDTO->getIdCategorie()));
    }            
    public static function selectsouscategories() 
    {
        include_once 'DTO/souscategorieDTO.php';
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM prestachope_bdd5.souscategorie');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $souscate= new souscategorieDTO();
            $souscate->setIdSousCategorie($db['idSousCategorie']);
            $souscate->setNomSousCategorie($db['nomSousCategorie']);
            $tab[]=$souscate;
    	}
        return $tab;
    }
    public static function deletetesouscategories($souscategorieDTO)
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('DELETE FROM prestachope_bdd5.souscategorie WHERE idSousCategorie=? ');
    	$dbbb->execute(array($souscategorieDTO->getIdSousCategorie()));
    }
        public static function selectsouscategoriesbycategories($categorieDTO) 
    {
        include_once 'DTO/souscategorieDTO.php';
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM prestachope_bdd5.souscategorie where idCategorie=?');
    	$dbbb->execute(array($categorieDTO->getIdCategorie()));
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $souscate= new souscategorieDTO();
            $souscate->setIdSousCategorie($db['idSousCategorie']);
            $souscate->setNomSousCategorie($db['nomSousCategorie']);
            $tab[]=$souscate;
    	}
        return $tab;
    }
}
?>