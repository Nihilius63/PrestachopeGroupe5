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
                }
                    break;
                case "new_categorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/creationcategorie/Creation_categoriecontrolleur.php';
                    $instanceController = new Creation_categoriecontrolleur();
                    $instanceController->includeView();
                    break;
                }
                case "new_souscategorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/creationsouscategorie/Creation_souscategoriecontrolleur.php';
                    $instanceController = new Creation_souscategoriecontrolleur();
                    $instanceController->includeView();
                break;
                }
                case "delete_produit":
                {
                    include_once("pages/header.php");
                    include_once 'pages/deleteproduit/delete_produitcontrolleur.php';
                    $instanceController = new delete_produitcontrolleur();
                    $instanceController->includeView();
                break;
                }
                case "delete_categorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/deletecategorie/delete_categoriecontrolleur.php';
                    $instanceController = new delete_categoriecontrolleur();
                    $instanceController->includeView();
                break;
                }
                case "delete_souscategorie":
                {
                    include_once("pages/header.php");
                    include_once 'pages/deletesouscategorie/delete_souscategoriecontrolleur.php';
                    $instanceController = new delete_souscategoriecontrolleur();
                    $instanceController->includeView();
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
                    include_once 'pages/pagerecherche/PagerechercheControlleur.php';
                    $instanceController = new PagerechercheControlleur();
                    $instanceController->includeview();
                    break;
                }
                case "detail":
                {
                    include_once("pages/header.php");
                    include_once "pages/details/detailControlleur.php";
                    $instanceController = new detailControlleur();
                    $instanceController->includeview();
                    break;
                }
                case "achat":
                {
                    include_once("pages/header.php");
                    include_once"pages/achat/achatcontroleur.php";
                    $instanceController = new achatcontroleur();
                    $instanceController->includeview();
                    break;
                }
                case "panier":
                {
                    include_once("pages/header.php");
                    include_once"pages/panier/paniercontrolleur.php";
                    $instanceController = new paniercontrolleur();
                    $instanceController->includeview();
                    break;
                }
                case "commande":
                {
                    include_once("pages/header.php");
                    include_once"pages/commande/commandecontrolleurs.php";
                    $instanceController = new commandecontrolleurs();
                    $instanceController->includeview();
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