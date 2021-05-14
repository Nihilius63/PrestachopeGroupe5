<?php
class gestionutilisateurscontrolleur 
{
    public function IncludeView() 
    {
        include_once 'gestionutilisateurview.php';
    }
    public function SelectAllUser() 
    {
        include_once 'DAO/utilisateursDAO.php';
        return utilisateursDAO::selectalluser();
    }
        public function deleteuser($nom) 
    {
        include_once 'DAO/utilisateursDAO.php';
        return utilisateursDAO::deleteuser($nom);
        header('Location: index.php?page=gestion');
    }
}
