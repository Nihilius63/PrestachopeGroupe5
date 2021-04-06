<?php
class Creation_souscategoriecontrolleur 
{
    public function includeview() 
    {
        include_once 'Creation_souscategorieview.php';
    }
    public function newsouscategorie($nom,$id) 
    {
        include_once 'DAO/souscategorieDAO.php';
        include_once 'DTO/souscategorieDTO.php';
        $souscategorie=new souscategorieDTO();
        $souscategorie->setNomSousCategorie($nom);
        $souscategorie->setidCategorie($id);
        souscategorieDAO::insertsouscategorie($souscategorie);
    }
}
?>
