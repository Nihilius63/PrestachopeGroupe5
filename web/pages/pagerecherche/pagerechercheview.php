<?php
include_once 'PagerechercheControlleur.php';
$instance =new PagerechercheControlleur();
if (isset($_GET['categorie']))
{
    $contents=$instance->selectbycategorie($_GET['categorie']);
}
else if (isset ($_GET['souscate']))
{
    $contents=$instance->selectbysouscategorie($_GET['souscate']);
}
foreach ($contents as $content)
{
    echo $content->getId().'<br>';
    echo $content->getNom().'<br>';
    echo $content->getPrix().'<br>';
    echo $content->getDescription().'<br>';
    echo $content->getStock().'<br>';
    echo $content->getIdCategorie().'<br>';
    echo $content->getImage().'<br>';
    echo '<a href="index.php?produit='.$content->getId().'&page=detail">'.$content->getNom().'</a>';
}
