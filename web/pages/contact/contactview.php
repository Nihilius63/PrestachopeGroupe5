<?php
if ($_SESSION['admin'])
{
    if (isset($_POST['valid']))
    {
        foreach ($_POST['valid'] as $valeur) 
        {
            include_once 'DAO/utilisateursDAO.php';
            $infoclient= utilisateursDAO::modiflu($valeur);
        }
    }
    include_once 'contactcontrolleur.php';
    $instanceController = new contactcontrolleur();
    $content=$instanceController->selectmsg();
    echo '<form action="" method="post">';
    foreach ($content as $contents)
    {
        include_once 'DAO/utilisateursDAO.php';
        $infoclient= utilisateursDAO::selectutilisateursbyId($contents->getIdClient());
        echo $infoclient->getNom()." ".$infoclient->getPrenom()." a dit: ".$contents->getMessage();
        echo '<input type="checkbox" name="valid[]" value="'.$contents->getId().'" checked>
        <label for="valid[]"> Vue</label><br>';
    }
    echo '<input class="btn" type="submit" name="" value="Valider"></form>';
}
else
{
    ?>
    <html>
        <head>
            <title></title>
        </head>
        <body>
            <form action="" method="post">
            <input type="text" name="msg" placeholder="Votre Message" required>
            <input type="submit" name="" value="Envoyer">     
            </form>
            <?php
            if (isset($_POST['msg'])) 
            {
                include_once 'contactcontrolleur.php';
                $instanceController = new contactcontrolleur();
                $instanceController->insertmsg($_POST['msg']);
            }
            ?>
        </body>
    </html>
<?php
}
?>

