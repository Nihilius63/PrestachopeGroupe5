<?php
class Creation_categoriecontrolleur 
{
    public function includeview() 
    {
        include_once 'Creation_categorieview.php';
    }
    public function newcategorie($nom) 
    {
        include_once 'DAO/categorieDAO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=new categorieDTO();
        $categorie->setCategorieProduit($nom);
        categorieDAO::insertcategorie($categorie);
    }
}
