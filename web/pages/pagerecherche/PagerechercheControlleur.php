<?php
class PagerechercheControlleur 
{
        public function includeview() 
    {
        include_once 'pagerechercheview.php';
    }
        public function selectbycategorie($id) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=new categorieDTO();
        $categorie->setIdCategorie($id);
        $content=produitDAO::selectproduitbycategorie($categorie);
        return $content;
    }
            public function selectbysouscategorie($id) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        include_once 'DTO/categorieDTO.php';
        $souscategorie=new souscategorieDTO();
        $souscategorie->setIdSousCategorie($id);
        $content=produitDAO::selectproduitbysouscategorie($souscategorie);
        return $content;
    }
    
   public function selectnamecategorie($id) 
    {
        include_once 'DAO/categorieDAO.php';
        $categorie=categorieDAO::selectcategoriebyid($id);
        return $categorie;
    } 
    public function selectnamesouscategorie($id) 
    {
        include_once 'DAO/souscategorieDAO.php';
        $souscategorie= souscategorieDAO::selectsouscategoriebyid($id);
        return $souscategorie;
    }
}
