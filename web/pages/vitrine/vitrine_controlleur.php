<?php
class vitrine_controlleur {
      public function includeview() 
    {
        include_once 'vitrine_view.php';
    }
    
     public function IncludeProduit($id)
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        return produitDAO::selectproduitrandom($id);
    }
}
