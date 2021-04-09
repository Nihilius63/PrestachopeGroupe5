<?php
class delete_categoriecontrolleur 
{
    public function includeview() 
    {
        include_once 'delete_categorieview.php';
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
