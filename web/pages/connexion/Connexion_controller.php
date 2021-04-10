<?php
    include_once 'DTO/utilisateursDTO.php';
    include_once 'DAO/utilisateursDAO.php';
    
class Connexion_controller {
        public function includeview() 
            {
                include_once 'Connexion_view.php';
            }

        public function connectUtilisateur($email,$motdepasse) {
            $utilisateur=new utilisateursDTO();
            $utilisateur->setMail($email);
            $utilisateur->setMotdepasse($motdepasse);
            utilisateursDAO::connexUtilisateur($utilisateur);
        }
        /*public function redirectUser(){
            header ('location: index.php?page=presentation');
        }*/
    }
