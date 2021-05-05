<?php
class achatcontroleur 
{
    public function includeview() 
    {
        include_once 'achatview.php';
    }
    public function includeinpanier($nom,$quantité)
    {
        $_SESSION['panier'][$nom]=$quantité;
    }
}
