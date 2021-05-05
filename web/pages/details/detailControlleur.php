<?php
class detailControlleur 
{
    public function includeview() 
    {
        include_once 'detailView.php';
    }
    public function IncludeProduit($id)
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        return produitDAO::selectproduitbyid($id);
    }
}
