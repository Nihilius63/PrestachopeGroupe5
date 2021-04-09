<?php
class Inscription_controlleur 
{
    public function includeview() 
        {
            include_once 'Inscriptionview.php';
        }
        
    public function newUtilisateur($nom,$prenom,$email,$adresse,$motdepasse) {
        include_once 'DTO/utilisateursDTO.php';
        include_once 'DAO/utilisateursDAO.php';
        $utilisateur=new utilisateursDTO();
        $utilisateur->setNom($nom);
        $utilisateur->setPrenom($prenom);
        $utilisateur->setMail($email);
        $utilisateur->setAdresse($adresse);
        $utilisateur->setMotdepasse($motdepasse);
        utilisateursDAO::verifUtilisateur($utilisateur);
    }
}
?>
