<html>
    <head>
    <title></title>
    </head>
    <body>
        
        <?php
            include_once 'achatcontroleur.php';
            echo "<p>Vous avez ajouté".$_POST['quantite']." ".$_GET['nom']." </p>";
            $instanceController = new achatcontroleur();
            $instanceController->includeinpanier($_GET['nom'],$_POST['quantite']);
        ?>
    </body>
</html>


