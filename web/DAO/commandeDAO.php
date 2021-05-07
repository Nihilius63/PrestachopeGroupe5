<?php
class commandeDAO {
    public static function insertcommande($commandeDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.commande(facture, idClient) VALUES (?,?)');
    	$dbbb->execute(array($commandeDTO->getFacture(),$commandeDTO->getIdClient));
    }
}