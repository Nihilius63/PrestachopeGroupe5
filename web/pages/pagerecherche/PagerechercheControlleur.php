<?php
class PagerechercheControlleur 
{
        public function includeview() 
    {
        include_once 'delete_produitview.php';
    }
        public function deleteproduit($id) 
    {
        include_once 'DAO/categorieDAO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=newcategorieDTO();
        $categorie->setId($id);
        produitDAO::deleteproduit($categorie);
    }
}
