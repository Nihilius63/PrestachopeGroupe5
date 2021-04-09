<?php
class utilisateursDAO
{
    public static function verifUtilisateur($utilisateurDTO){
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('SELECT * FROM utilisateurs WHERE mail=?');
        $resultat->execute(array($utilisateurDTO->getMail()));
        $result=$resultat->fetch();
        $erreur=true;
        if ($result==true){
            $erreur=false;
        }
        else{
            $insert=$bdd->prepare('INSERT INTO prestachope_bdd5.utilisateurs(nom, prenom, adresse, mail,motdepasse) VALUES (?,?,?,?,?)');
            $insert->execute(array($utilisateurDTO->getNom(),$utilisateurDTO->getPrenom(),$utilisateurDTO->getAdresse(),$utilisateurDTO->getMail(),$utilisateurDTO->getMotdepasse()));
        }
        return $erreur;
    }
}