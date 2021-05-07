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
                $tab[];
            }
        }
    }
}
