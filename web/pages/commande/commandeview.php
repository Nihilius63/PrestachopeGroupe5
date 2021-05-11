<html>
    <head>
        <title></title>
    </head>
    <body>
    <?php
        include_once 'commandecontrolleurs.php';
            $instanceController = new commandecontrolleurs();
            $content=$instanceController->insertnewcommande();
    ?>
    </body>
</html>


