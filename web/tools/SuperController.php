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
                case "new":
                {
                    include_once("pages/header.php");
                    include_once 'pages/creation/Creation_controlleur.php';
                    $instanceController = new Creation_controlleur();
                    $instanceController->includeView();
                    break;
                }
                case "delete":
                {
                    include_once("pages/header.php");
                    include_once 'pages/delete/delete_controlleur.php';
                    $instanceController = new delete_controlleur();
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
                case "gestion":
                    include_once("pages/header.php");
                    include_once 'pages/gestionutilisateurs/gestionutilisateurscontrolleur.php';
                    $instanceController = new gestionutilisateurscontrolleur();
                    $instanceController->includeView();
                    break;
            }
        }
}
?>