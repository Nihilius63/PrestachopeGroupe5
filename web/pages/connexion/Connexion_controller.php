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
            $connexion=utilisateursDAO::connexUtilisateur($utilisateur);
            foreach ($connexion as $co)
            {
                if($co['mail']==$email && $co['motdepasse']==$motdepasse)
                {
                    $_SESSION['nom']=$co['nom'];
                    $_SESSION['prenom']=$co['prenom'];
                    $_SESSION['panier']=array();
                }
            }
            $_SESSION['panier']=array();
        }
        /*public function redirectUser(){
            header ('location: index.php?page=presentation');
        }*/
    }
