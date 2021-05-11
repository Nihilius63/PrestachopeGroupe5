<?php
class commande_produitDAO {
    public static function insertcommande($commande_produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.commande_produit(idCommande, idProduit,quantite) VALUES (?,?,?)');
    	$dbbb->execute(array($commande_produitDTO->getIdCommande(),$commande_produitDTO->getIdProduit(),$commande_produitDTO->getQuantite()));
    }
}
?>