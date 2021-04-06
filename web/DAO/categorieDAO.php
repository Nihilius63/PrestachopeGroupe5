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
}
?>