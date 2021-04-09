<?php
class produitDAO 
{
    public static function insertproduct($produitDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.produit(nom, prix, description, stock,idCategorie) VALUES (?,?,?,?,?)');
    	$dbbb->execute(array($produitDTO->getNom(),$produitDTO->getPrix(),$produitDTO->getDescription(),$produitDTO->getStock(),$produitDTO->getIdCategorie()));
    }
            public static function selectproduit() 
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
}
?>