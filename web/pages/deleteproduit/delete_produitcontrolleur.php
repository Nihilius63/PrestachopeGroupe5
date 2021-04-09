<?php
class delete_produitcontrolleur
{
    public function includeview() 
    {
        include_once 'delete_produitview.php';
    }
    public function deleteproduit($id) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        $produit=new produitDTO();
        $produit->setId($id);
        produitDAO::deleteproduit($produit);
    }
}
?>

