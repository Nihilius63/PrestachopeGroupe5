<?php
class produitDAO 
{
    public static function insertproduct($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.produit(nom, prix, description, stock,idCategorie) VALUES (?,?,?,?,1)');
    	$dbbb->execute(array($produitDTO->getNom(),$produitDTO->getPrix(),$produitDTO->getDescription(),$produitDTO->getStock()));
    }
}
?>