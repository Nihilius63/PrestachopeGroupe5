<?php
include_once 'DTO/utilisateursDTO.php';
include_once 'DAO/utilisateursDAO.php';
class Inscription_controlleur 
{
    public function includeview() 
        {
            include_once 'Inscriptionview.php';
        }
        
    public function newUtilisateur($nom,$prenom,$email,$adresse,$motdepasse) {
        $utilisateur=new utilisateursDTO();
        $utilisateur->setNom($nom);
        $utilisateur->setPrenom($prenom);
        $utilisateur->setMail($email);
        $utilisateur->setAdresse($adresse);
        $utilisateur->setMotdepasse($motdepasse);
        $user=utilisateursDAO::verifUtilisateur($utilisateur);
        return $user;
    }
    public function redirectUser(){
        header ('location: index.php?page=connexion');
    }
}
?>
