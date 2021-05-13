<?php
if (isset($_POST['categorie']))
{
    include_once 'DAO/categorieDAO.php';
    include_once 'DTO/categorieDTO.php';
    $categorie= new categorieDTO();
    $categorie->setCategorieProduit($_POST['categorie']);
    $categorie->setIdCategorie($_GET['categorie']);
    categorieDAO::updatecategorie($categorie);
}
if (isset($_POST['souscate']))
{
    include_once 'DAO/categorieDAO.php';
    include_once 'DTO/categorieDTO.php';
    $souscategorie= new souscategorieDTO();
    $souscategorie->setNomSousCategorie($_POST['souscate']);
    $souscategorie->setIdSousCategorie($_GET['souscate']);
    souscategorieDAO::updatesouscategorie($souscategorie);
}
if (isset($_GET['categorie']))
{
    echo '<form action="" method="POST">
    <input type="text" name="categorie" value="'.$_GET["nom"].'"required>
    <input type="submit" value="Valider">';
}
elseif (isset ($_GET['souscate'])) 
{
    echo '<form action="" method="POST">
    <input type="text" name="souscate" value="'.$_GET["nom"].'"required>
    <input type="submit" value="Valider">';
}

