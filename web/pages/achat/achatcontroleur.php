<?php
class achatcontroleur 
{
    public function includeview() 
    {
        include_once 'achatview.php';
    }
    public function includeinpanier($nom,$quantité)
    {
        if (isset($_SESSION['panier'][$nom]))
        {
            $_SESSION['panier'][$nom]=$_SESSION['panier'][$nom]+$quantité;
        }
        else
        {
            $_SESSION['panier'][$nom]=$quantité;
        }
    }
}
