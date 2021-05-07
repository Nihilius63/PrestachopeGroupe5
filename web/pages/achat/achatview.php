<<html>
    <head>
    <title></title>
    </head>
    <body>
        
        <?php
            include_once 'achatcontroleur.php';
            echo "<p>Vous avez ajouté".$_POST['quantité']." ".$_GET['nom']." </p>";
            $instanceController = new achatcontroleur();
            $instanceController->includeinpanier($_GET['nom'],$_POST['quantité']);
        ?>
    </body>
</html>


