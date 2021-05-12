<?php
class contactcontrolleur 
{
    public function includeView() 
    {
        include_once 'contactview.php';
    }
    public function insertmsg($msg) 
    {
        include_once 'DAO/contactDAO.php';
        include_once 'DTO/contactDTO.php';
        $contact=new contactDTO();
        $contact->setMessage($msg);
        $contact->setIdClient($_SESSION['id']);
        contactDAO::insertnewmsg($contact);
    }
    public function selectmsg() 
    {
        include_once 'DAO/contactDAO.php';
        return contactDAO::selectmsg();
    }
}
