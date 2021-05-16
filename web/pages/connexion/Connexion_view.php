<?php
$erreur=0;
$valide=false;
    if (isset($_POST['email'])) 
    {
        $instanceController = new Connexion_controller();
        $result=$instanceController->connectUtilisateur($_POST['email'],$_POST['password']);
        if (isset($result)) 
        {
            $_SESSION['id']=$result->getIdClient();
            $_SESSION['nom']=$result->getNom();
            $_SESSION['prenom']=$result->getPrenom();
            $_SESSION['adresse']=$result->getAdresse();
            $_SESSION['cagnotte']=$result->getCagnote();
            $_SESSION['admin']=$result->getAdmin();
            $_SESSION['panier']=array();
            header('Location: index.php?page=vitrine');

        }
        else
        {

            ?> <div id="identifiant_false"> <?php

            ?> <p class="msgimp"><i class="fas fa-exclamation-triangle"></i> Mot de passe ou identifiant incorrect</p>

            </div> <?php

        }
    }
    if (isset($_POST['Email'],$_POST['Nom'],$_POST['Password'],$_POST['Password2'],$_POST['Prenom'])) 
    {
        $instanceController = new Connexion_controller();
        $result=$instanceController->testmail($_POST['Email']);
        if(isset($result))
        {
            ?> <div id="identifiant_false_inscription">
                <p class="msgimp">Il y a deja un compte asocié avec <?php echo $_POST['Email']; ?></p>
            <?php
            $erreur=1;
            ?> </div> <?php
        }
        if ($erreur==0)
        {
            if ($_POST['Password']==$_POST['Password2']) 
            {
                ?> <div id="identifiant_false"> <?php
                $instanceController->createUtilisateur($_POST['Email'],$_POST['Nom'],$_POST['Prenom'],$_POST['Password'],$_POST['Adresse']);
                ?> <p class="msgimp"><i class="fas fa-check"></i>Vous êtes inscrit</p>
                </div> <?php
            }
            else
            {
                ?> <div id="identifiant_false_inscription"> <?php
                ?> <p class="msgimp"><i class="fas fa-exclamation-triangle"></i>Les 2 mot de passe ne sont pas égale</p>
                </div> <?php
            }
        }

    }
?>
<!DOCTYPE html>
<html lang='fr'>
    <head>
        <link rel="stylesheet" href="assets/css/connexion.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    </head>
    <body>
        <div id="body_log">
            <div class="form">
                <form class="login-form" action="" method="post">
                    <i class="fas fa-user-circle"></i>
                    <input class="user-input" type="text" name="email" placeholder="Email" required>
                    <input class="user-input" type="password" name="password" placeholder="Mot de passe" required>
                    <input class="btn" type="submit" name="" value="CONNEXION">
                    <div class="options-02">
                        <p>Non enregistré ? <a href="#">S'inscrire</a></p>
                    </div>
                </form>
                <form class="signup-form" action="" method="post">
                    <i class="fas fa-user-plus"></i>
                    <input class="user-input" type="email" name="Email" placeholder="Mail" required>
                    <input class="user-input" type="text" name="Nom" placeholder="Nom" required>
                    <input class="user-input" type="text" name="Prenom" placeholder="Prenom" required>
                    <input class="user-input" type="text" name="Adresse" placeholder="Adresse" required>
                    <input class="user-input" type="password" name="Password" placeholder="Mot de passe" required>
                    <input class="user-input" type="password" name="Password2" placeholder="Repeter le mot de passe" required>
                    <input class="btn" type="submit" name="" value="S'INSCRIRE">
                    <div class="options-02">
                        <p>Déjà enregistré ? <a href="#">Se connecter</a></p>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                $('.options-02 a').click(function(){
                    $('form').animate({
                        height: "toggle", opacity: "toggle"
                    }, "slow");
                });
            </script>
        </div>
    </body>
</html>