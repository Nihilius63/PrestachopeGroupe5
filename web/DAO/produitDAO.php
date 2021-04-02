<?php
class produitDAO 
{
    public static function insertproduct($Productdto) 
    {
        $dbb = Databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO produit(nom, prix, description, stock) VALUES (?,CURRENT_TIMESTAMP,?,?)');
    	$dbbb->execute(array($commentaireDTO->getpseudo(),$commentaireDTO->getcontent(),$commentaireDTO->getidarticle()));
    }
}
?>