<?php
class paniercontrolleur 
{
    public function includeview() 
    {
        include_once "panierview.php";
    }
    public function content() 
    {
        if (isset($_SESSION['panier']))
        {
            $tab=[];
            foreach ($_SESSION['panier'] as $panier =>$value)
            {
                $tab[$panier]=$value;
            }
            return $tab;
        }
    }
    public function testclear() 
    {
        if (isset($_GET['panier']))
        {
            unset($_SESSION['panier']);
            $_SESSION['panier']=array();
            header('Location: index.php?page=vitrine');
        }
    }
    public function testnom() 
    {
        if (isset($_GET['nom']))
        {
            unset($_SESSION['panier'][$_GET['nom']]);
        }
    }
}
