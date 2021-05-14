<?php
include_once 'gestionutilisateurscontrolleur.php';
$instanceController=new gestionutilisateurscontrolleur();
if(isset($_GET['nom']))
{
    $instanceController->deleteuser($_GET['nom']);
}
$content=$instanceController->SelectAlluser();
foreach ($content as $contents)
{
    echo $contents->getNom().'<br>';
    echo $contents->getPrenom().'<br>';
    echo $contents->getMail().'<br>';
    echo '<a href="index.php?page=gestion&nom='.$contents->getNom().'">Supprimer</a><br>';
}
