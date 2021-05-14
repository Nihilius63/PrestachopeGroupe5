<?php
class contactDAO
{
    public static function insertnewmsg($contactDTO) 
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('INSERT INTO prestachope_bdd5.contact(message,idClient) VALUES (?,?)');
    	$dbbb->execute(array($contactDTO->getMessage(),$contactDTO->getIdClient()));
    }
    public static function selectmsg()
    {
        include_once 'DTO/contactDTO.php';
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT * FROM prestachope_bdd5.contact WHERE statuts=0');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
        $tab=[];
    	foreach ($d as $db) 
    	{
            $contact= new contactDTO();
            $contact->setId($db['idContact']);
            $contact->setMessage($db['message']);
            $contact->setIdClient($db['idClient']);
            $tab[]=$contact;
    	}
        return $tab;
    }
        public static function modiflu($id) 
    {
        include_once 'DTO/utilisateursDTO.php';
        $bdd= databaselinker::getconnexion();
        $resultat=$bdd->prepare('UPDATE `contact` SET`statuts`=1 WHERE idContact=?');
        $resultat->execute(array($id));
    }
        public static function selecnbtmsg()
    {
        $dbb = databaselinker::getconnexion();
        $dbbb=$dbb->prepare('SELECT COUNT(*) FROM prestachope_bdd5.contact WHERE statuts=0');
    	$dbbb->execute();
        $d = $dbbb->fetchAll();
    	foreach ($d as $db) 
    	{
            return $db['COUNT(*)'];
    	}
    }
}
?>