<?php

class DeconnexionControlleur 
{
    public function includeview() 
    {
        include_once 'Deconnexionview.php';
    }
    public function Deco() 
    {
        session_destroy();
        header('Location: index.php?page=vitrine');
    }
}
