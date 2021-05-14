<?php
class commandeDAO {
    public static function insertcommande($commandeDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.commande(facture, idClient) VALUES (?,?)');
    	$dbbb->execute(array($commandeDTO->getFacture(),$commandeDTO->getIdClient()));
        return $dbb->lastInsertId();
    }
        public static function gettresorie() 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT ROUND(SUM(facture)) FROM `commande`');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
        foreach ($d as $db) 
        {
            return $db['ROUND(SUM(facture))'];
        }
    }
}