<!doctype html>
<html>
    <head>
        <title>Prestachope</title>
        <link rel="stylesheet" href="assets/css/presentation.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="head">
            <a href="index.php?page=presentation" class="active">accueil</a>
            <a href="index.php?page=info"> Information</a>
        </div>
        <div class="conteneur">
            <div class="mid">
                <div class="title">
                    <h1> PRESTACHOPE </h1>
                </div>
                <p> Boutique de biere de tous types </p>
                <div class="btn-shop">
                    <button> <a href="index.php?page=connexion">Page d'achat</a></button>
                </div>
            </div>
        </div>
        <h1>Les bieres:</h1>
        <?php
        $show=produitDAO::selectproduitrandom(1);
        foreach ($show as $shows)
        {
            echo $shows->getId().'<br>';
            echo $shows->getNom().'<br>';
            echo $shows->getPrix().'<br>';
            echo $shows->getDescription().'<br>';
            echo $shows->getStock().'<br>';
            echo $shows->getIdCategorie().'<br>';
        }
        ?>
    </body>
</html>


