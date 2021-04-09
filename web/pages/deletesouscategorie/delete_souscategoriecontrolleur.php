<?php
class delete_souscategoriecontrolleur 
{
    public function includeview() 
    {
        include_once 'delete_souscategorieview.php';
    }
    public function deletesouscategorie($id) 
    {
        include_once 'DAO/souscategorieDAO.php';
        include_once 'DTO/souscategorieDTO.php';
        $souscategorie=new souscategorieDTO();
        $souscategorie->setidSousCategorie($id);
        souscategorieDAO::deletetesouscategories($souscategorie);
    }
}
?>
