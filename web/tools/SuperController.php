<?php
include_once("tools/databaselinker.php");
class SuperController
{
	public static function callPage($page)
	{
            include_once("pages/header.php");
            switch($page)
            {
                case "new_product":
                {
                    include_once 'pages/creationproduit/Creation_produitcontrolleur.php';
                    $instanceController = new Creation_produitcontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie']))
                    {
                        $instanceController->newproduct($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie']);
                    }
                    break;
                }             
                case "new_categorie":
                {
                    include_once 'pages/creationcategorie/Creation_categoriecontrolleur.php';
                    $instanceController = new Creation_categoriecontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['Nom']))
                    {
                        $instanceController->newcategorie($_POST['Nom']);
                    }
                    break;
                }
                case "new_souscategorie":
                {
                include_once 'pages/creationsouscategorie/Creation_souscategoriecontrolleur.php';
                $instanceController = new Creation_souscategoriecontrolleur();
                $instanceController->includeView();
                if (isset($_POST['Nom'],$_POST['categorie']))
                {
                    $instanceController->newsouscategorie($_POST['Nom'],$_POST['categorie']);
                }
                break;
                }
            }
  	}
}
?>