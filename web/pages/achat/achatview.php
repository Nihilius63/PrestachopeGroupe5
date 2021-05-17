<?php
        if (isset ($_SESSION['admin']))
        {
            if ($_SESSION['admin']==0)
            {
                if(!isset($_POST['quantite']))
                {
                    $_POST['quantite']=1;
                }
                include_once 'achatcontroleur.php';
                $instanceController = new achatcontroleur();
                $instanceController->includeinpanier($_GET['nom'],$_POST['quantite']);
                header('Location: index.php?page=vitrine');
            }
        }
        ?>

