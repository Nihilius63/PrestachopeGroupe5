<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/pagerecherche.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
        <?php
        include_once 'PagerechercheControlleur.php';
        $instance =new PagerechercheControlleur();
        if (isset($_GET['categorie']))
        {
            $contents=$instance->selectbycategorie($_GET['categorie']);
        }
        else if (isset ($_GET['souscate']))
        {
            $contents=$instance->selectbysouscategorie($_GET['souscate']);
        }
         $cate=$instance->selectnamecategorie($_GET['categorie']);
         foreach ($cate as $cat)
         {
             ?>
                <div class="Nom">
                    <h1> Nos <?php echo $cat->getCategorieProduit(); ?> </h1>
                </div>
             <?php
         }
        ?>
        <div class="produitbycate">
            <?php
            foreach ($contents as $content)
            {
                ?>
                <div class="descProduit">
                    <div class="produit">
                        <a href="index.php?produit=<?php echo $content->getId()?>&page=detail"><img class="imgProduit" src= "<?php echo $content->getImage() ?>"></a><br>
                    </div>
                    <div class="texte">
                        <h3> <?php echo $content->getNom() ?> </h3>
                        <p> <?php echo $content->getDescription() ?></p>
                        <p> <?php echo $content->getPrix() ?> €</p>
                    </div>
                    <button class="btnpanier"> <a href="index.php?page=achat&nom=<?php echo $content->getNom()?>">Ajouter </a></button>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
    </html>

