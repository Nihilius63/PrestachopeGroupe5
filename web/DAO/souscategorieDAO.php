<?php
class souscategorieDAO 
{
    public static function insertsouscategorie($souscategorieDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.souscategorie(nomSousCategorie,idCategorie) VALUES (?,?)');
    	$dbbb->execute(array($souscategorieDTO->getNomSousCategorie(),$souscategorieDTO->getIdCategorie()));
    }
}
?>