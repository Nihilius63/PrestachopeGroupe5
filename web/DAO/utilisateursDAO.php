<?php
class utilisateursDAO
{
    public static function verifUtilisateur($utilisateurDTO){
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('SELECT * FROM prestachope_bdd5.utilisateurs WHERE mail=?');
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
    
    public static function connexUtilisateur($utilisateurDTO) 
    {
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('SELECT * FROM prestachope_bdd5.utilisateurs WHERE mail=? and motdepasse=?');
        $resultat->execute(array($utilisateurDTO->getMail(), sha1($utilisateurDTO->getMotdepasse())));
        $result=$resultat->fetchAll();
        foreach ($result as $results) 
        {
            $uti= new utilisateursDTO();
            $uti->setIdClient($results['idClient']);
            $uti->setNom($results['nom']);
            $uti->setPrenom($results['prenom']);
            $uti->setAdresse($results['adresse']);
            $uti->setMail($results['motdepasse']);
            $uti->setCagnote($results['cagnote']);
            $uti->setAdmin($results['admin']);
            $uti->setBan($results['ban']);
            $uti->setTimeBan($results['timeBan']);
            return $uti;
        }
    }
        public static function createUtilisateur($utilisateurDTO) 
    {
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('INSERT INTO prestachope_bdd5.utilisateurs(`nom`, `prenom`, `adresse`, `mail`, `motdepasse`) VALUES (?,?,?,?,SHA1(?))');
        $resultat->execute(array($utilisateurDTO->getNom(), $utilisateurDTO->getPrenom(),$utilisateurDTO->getAdresse(),$utilisateurDTO->getMail(),$utilisateurDTO->getMotdepasse()));
    }
        public static function selectutilisateursbyId($id) 
    {
            include_once 'DTO/utilisateursDTO.php';
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('SELECT * FROM prestachope_bdd5.utilisateurs WHERE idClient=?');
        $resultat->execute(array($id));
        $result=$resultat->fetchAll();
        foreach ($result as $results) 
        {
            $uti= new utilisateursDTO();
            $uti->setMail($results['mail']);
            $uti->setNom($results['nom']);
            $uti->setPrenom($results['prenom']);
            return $uti;
        }
    }
    public static function modiflu($id) 
    {
        include_once 'DTO/utilisateursDTO.php';
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('UPDATE `contact` SET`statuts`=1 WHERE idContact=?');
        $resultat->execute(array($id));
    }
}