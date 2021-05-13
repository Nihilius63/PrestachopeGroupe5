<?php
include_once("tools/databaselinker.php");
class SuperController
{
	public static function callPage($page)
	{
            switch($page)
            {
                case "presentation":
                {
                   include_once 'pages/presentation/presentation_controlleur.php';
                   include_once 'DAO/produitDAO.php';
                   include_once 'DTO/produitDTO.php';
                   $instanceController = new presentation_controlleur();
                   $instanceController->includeView();
                   break; 
                }
                case "info":
                {
                    include_once 'pages/information/information_controlleur.php';
                    $instanceController = new information_controlleur();
                    $instanceController->includeView();
                    break;
                }
                 case "vitrine":
                {
                    include_once("pages/header.php");
                    include_once 'pages/vitrine/vitrine_controlleur.php';
                    $instanceController = new vitrine_controlleur();
                    $instanceController->includeView();
                    break;
                }
                case "new_product":
                {
                    include_once("pages/header.php");
                    include_once 'DAO/categorieDAO.php';
                    include_once 'DAO/souscategorieDAO.php';
                    include_once 'pages/creationproduit/Creation_produitcontrolleur.php';
                    $instanceController = new Creation_produitcontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie'],$_POST['souscategorie']))
                    {
                        $target_dir = "assets/img/";
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
                        if (file_exists($target_file)) 
                        {
                          echo "Sorry, file already exists.";
                          $uploadOk = 0;
                        }

                        if ($_FILES["fileToUpload"]["size"] > 500000) 
                        {
                          echo "Sorry, your file is too large.";
                          $uploadOk = 0;
                        }

                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) 
                        {
                          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                          $uploadOk = 0;
                        }

                        if ($uploadOk == 0) 
                        {
                          echo "Sorry, your file was not uploaded.";
                        } 
                        else 
                        {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                            {
                                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            } 
                            else 
                            {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                        $instanceController->newproduct($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie'],$target_file,$_POST['souscategorie']);
                    }
                        
                    }
                    break;
                case "new_categorie":
                {
                    include_once("pages/header.php");
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
                    include_once("pages/header.php");
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
                    include_once("pages/header.php");
                    include_once 'pages/deleteproduit/delete_produitcontrolleur.php';
                    $instanceController = new delete_produitcontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['produit']))
                    {
                        $instanceController->deleteproduit($_POST['produit']);
                    }
                break;
                }
                case "delete_categorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/deletecategorie/delete_categoriecontrolleur.php';
                    $instanceController = new delete_categoriecontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['categorie']))
                    {
                        $instanceController->deletecategorie($_POST['categorie']);
                    }
                break;
                }
                case "delete_souscategorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/deletesouscategorie/delete_souscategoriecontrolleur.php';
                    $instanceController = new delete_souscategoriecontrolleur();
                    $instanceController->includeView();
                    if (isset($_POST['souscategorie']))
                    {
                        $instanceController->deletesouscategorie($_POST['souscategorie']);
                    }
                break;
                }
                case "inscription":
                {
                    include_once("pages/header.php");
                    include_once 'pages/inscription/Inscription_controlleur.php';
                    $instanceController = new Inscription_controlleur();
                    $instanceController->includeview();
                    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['mdp'], $_POST['conf_mdp']))
                    {
                        if ($_POST['mdp']==$_POST['conf_mdp'])
                        {
                            if($instanceController->newUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['mdp']))
                            {
                               $instanceController->redirectUser(); 
                            }
                        }
                        else
                        {
                            echo "les deux mots de passe sont différents";
                        }
                    }   
                break;
                }
                case "connexion":
                {
                    include_once("pages/header.php");
                    include_once 'pages/connexion/Connexion_controller.php';
                    $instanceController = new Connexion_controller();
                    $instanceController->includeview();
                    break;
                }
                case "pagerecherche":
                {
                    include_once("pages/header.php");
                    include_once 'pages/pagerecherche/pagerechercheview.php';
                    break;
                }
                case "detail":
                {
                    include_once("pages/header.php");
                    include_once "pages/details/detailview.php";
                    break;
                }
                case "achat":
                {
                    include_once("pages/header.php");
                    include_once"pages/achat/achatview.php";
                    break;
                }
                case "panier":
                {
                    include_once("pages/header.php");
                    include_once"pages/panier/panierview.php";
                    break;
                }
                case "commande":
                {
                    include_once("pages/header.php");
                    include_once"pages/commande/commandeview.php";
                    break;
                }
                case "deco":
                    include_once("pages/header.php");
                    include_once 'pages/Deconnexion/DeconnexionControlleur.php';
                    $instanceController = new DeconnexionControlleur();
                    $instanceController->includeView();
                    break;
                case "contact":
                    include_once("pages/header.php");
                    include_once 'pages/contact/contactcontrolleur.php';
                    $instanceController = new contactcontrolleur();
                    $instanceController->includeView();
                    break;
                case "modif":
                    include_once("pages/header.php");
                    include_once 'pages/modif/modifcontrolleur.php';
                    $instanceController = new modifcontrolleur();
                    $instanceController->includeView();
                    break;
                    
            }
        }
}
?>