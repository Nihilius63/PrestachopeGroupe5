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
                    if (isset($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock']))
                    {
                        $newproduct=$instanceController->newproduct($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock']);
                        echo 'je marche';
                    }
                }
            }
  	}
}
?>