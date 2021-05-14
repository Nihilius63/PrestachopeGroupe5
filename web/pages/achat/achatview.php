<html>
    <head>
    <title></title>
    </head>
    <body>
        
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
                echo "<p>Vous avez ajouté".$_POST['quantite']." ".$_GET['nom']." </p>";
                $instanceController = new achatcontroleur();
                $instanceController->includeinpanier($_GET['nom'],$_POST['quantite']);
            }
            else
            {
                echo 'Vous ne pouver pas acheter en tant que administrateur';
            }
        }
        else 
        {
            echo 'veuillez vous <a href="index.php?page=connexion">connecter</a> pour acceder a cette fonctionnalité';
        }
        ?>
    </body>
</html>


