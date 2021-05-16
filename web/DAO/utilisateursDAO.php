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
            $uti->setCagnote($results['cagnote']);
            $uti->setAdmin($results['admin']);
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
        public static function selectalluser() 
    {
        include_once 'DTO/utilisateursDTO.php';
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('SELECT * FROM prestachope_bdd5.utilisateurs WHERE admin=0 ');
        $resultat->execute();
        $result=$resultat->fetchAll();
        $tab=[];
        foreach ($result as $results) 
        {
            $uti= new utilisateursDTO();
            $uti->setIdClient($results['idClient']);
            $uti->setNom($results['nom']);
            $uti->setPrenom($results['prenom']);
            $uti->setAdresse($results['adresse']);
            $uti->setMail($results['mail']);
            $uti->setCagnote($results['cagnote']);
            $uti->setAdmin($results['admin']);
            $tab[]=$uti;
        }
        return $tab;
    }
    public static function deleteuser($nom) 
    {
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('DELETE FROM `utilisateurs` WHERE nom=?');
        $resultat->execute(array($nom));
    }
        public static function debitercagnotte($commandeDTO) 
    {
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('UPDATE `utilisateurs` SET cagnote=cagnote-? WHERE idClient=?');
        $resultat->execute(array($commandeDTO->getFacture(),$commandeDTO->getIdClient()));
    }
    public static function testmail($utilisateurDTO) 
    {
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('Select * from utilisateurs Where mail=?');
        return $resultat->execute(array($utilisateurDTO->getMail()));
    }
}