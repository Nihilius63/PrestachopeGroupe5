<?php
class delete_controlleur
{
    public function includeview() 
    {
        include_once 'delete_view.php';
    }
    public function deleteproduit($id) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        $produit=new produitDTO();
        $produit->setId($id);
        produitDAO::deleteproduit($produit);
    }
    public function deletesouscategorie($id) 
    {
        include_once 'DAO/souscategorieDAO.php';
        include_once 'DTO/souscategorieDTO.php';
        $souscategorie=new souscategorieDTO();
        $souscategorie->setidSousCategorie($id);
        souscategorieDAO::deletetesouscategories($souscategorie);
    }
    public function deletecategorie($id) 
    {
        include_once 'DAO/categorieDAO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=new categorieDTO();
        $categorie->setidCategorie($id);
        categorieDAO::deletecategorie($categorie);
    }
}
?>

