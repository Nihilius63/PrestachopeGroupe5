<?php
class PagerechercheControlleur 
{
        public function includeview() 
    {
        include_once 'delete_produitview.php';
    }
        public function selectbycategorie($id) 
    {
        include_once 'DAO/categorieDAO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=newcategorieDTO();
        $categorie->setIdCategorie($id);
        produitDAO::deleteproduit($categorie);
    }
}
