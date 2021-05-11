<?php
class paniercontrolleur 
{
    public function incluview() 
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
            die();
        }
    }
}
