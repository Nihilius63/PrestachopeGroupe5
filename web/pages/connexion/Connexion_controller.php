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
            $result=utilisateursDAO::connexUtilisateur($utilisateur);
            return $result;
        }
        public function createUtilisateur($email,$nom,$prenom,$motdepasse,$adresse) {
            $utilisateur=new utilisateursDTO();
            $utilisateur->setMail($email);
            $utilisateur->setMotdepasse($motdepasse);
            $utilisateur->setAdresse($adresse);
            $utilisateur->setNom($nom);
            $utilisateur->setPrenom($prenom);
            $result=utilisateursDAO::createUtilisateur($utilisateur);
            return $result;
        }
        /*public function redirectUser(){
            header ('location: index.php?page=presentation');
        }*/
    }
