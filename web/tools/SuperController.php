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
                    include_once '/xampp/htdocs/PrestachopeGroupe5/web/DAO/categorieDAO.php';
                    include_once 'pages/creationproduit/Creation_produitcontrolleur.php';
                    $instanceController = new Creation_produitcontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie']))
                    {
                        $target_dir = "PrestachopeGroupe5/assets/images";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if(isset($_POST["submit"])) 
                        {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) 
                            {
                                echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            }
                            else 
                            {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }
                        }
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
                case "delete_produit":
                {
                    include_once 'pages/deleteproduit/delete_produitcontrolleur.php';
                    $instanceController = new delete_produitcontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['categorie']))
                    {
                        $instanceController->deleteproduit($_POST['categorie']);
                    }
                break;
                }
                case "delete_categorie":
                {
                    include_once 'pages/deleteproduit/delete_produitcontrolleur.php';
                    $instanceController = new delete_categoriecontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['produit']))
                    {
                        $instanceController->deletecategorie($_POST['produit']);
                    }
                break;
                }
                case "delete_souscategorie":
                {
                    include_once 'pages/deletesouscategorie/delete_souscategoriecontrolleur.php';
                    $instanceController = new delete_souscategoriecontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['souscategorie']))
                    {
                        $instanceController->deletesouscategorie($_POST['souscategorie']);
                    }
                break;
                }
            }
  	}
}
?>