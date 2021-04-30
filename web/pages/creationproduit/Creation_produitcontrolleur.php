<?php
class Creation_produitcontrolleur
{
    public function includeview() 
    {
        include_once 'Creation_produitview.php';
    }
    public function newproduct($nom,$description,$prix,$stock,$categorie,$image,$idsouscategorie) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        $produit=new produitDTO();
        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix($prix);
        $produit->setStock($stock);
        $produit->setIdCategorie($categorie);
        $produit->setImage($image);
        $produit->setIdsouscategorie($idsouscategorie);
        produitDAO::insertproduct($produit);
    }
}
?>

