<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/contact.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
        <?php
        if ($_SESSION['admin']==1)
        {
            if (isset($_POST['valid']))
            {
                foreach ($_POST['valid'] as $valeur) 
                {
                    include_once 'DAO/contactDAO.php';
                    $infoclient= contactDAO::modiflu($valeur);
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
                <div class="conteneur">
                    <div class="contact">
                        <h1> <span>E</span>nvoyer votre message </h1>
                        <form action="" method="post">
                            <textarea class="message" type="text" name="msg" placeholder="Votre Message" minlength="4" maxlength="200" required></textarea><br>
                            <input class="btnenvoy" type="submit" name="" value="Envoyer">     
                        </form>
                        <p> Pour plus d'informations vous pouvez nous contacter </p>
                        <p> 07 76 87 67 76 </p>
                        <p> contact@prestachope.com </p>
                    </div>
                </div>
                <?php
                if (isset($_POST['msg'])) 
                {
                    include_once 'contactcontrolleur.php';
                    $instanceController = new contactcontrolleur();
                    $instanceController->insertmsg($_POST['msg']);
                }
                ?>
        <?php
        }
        ?>
  </body>
</html>

