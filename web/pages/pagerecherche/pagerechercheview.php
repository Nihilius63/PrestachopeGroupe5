<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/pagerecherche.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.nice-number.css" media="all"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js"> </script>
    <script src="assets/js/jquery.nice-number.js"> </script>
    <script type="text/javascript">
        $(function(){
            $('input[type="number"]').niceNumber();
        });
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
      <div class="contenue">
        <?php
        include_once 'PagerechercheControlleur.php';
        $instance =new PagerechercheControlleur();
        if (isset($_GET['categorie']))
        {
            $contents=$instance->selectbycategorie($_GET['categorie']);
            $cate=$instance->selectnamecategorie($_GET['categorie']);
         foreach ($cate as $cat)
         {
             ?>
                <div class="Nom">
                    <h1> Nos <?php echo $cat->getCategorieProduit(); ?> </h1>
                </div>
             <?php
         }
        }
        else if (isset ($_GET['souscate']))
        {
            $contents=$instance->selectbysouscategorie($_GET['souscate']);
            $souscate=$instance->selectnamesouscategorie($_GET['souscate']);
         foreach ($souscate as $souscat)
         {
             ?>
                <div class="Nom">
                    <h1> Nos <?php echo $souscat->getNomSousCategorie(); ?> </h1>
                </div>
             <?php
         }
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
                        <?php $nom=$content->getNom(); ?>
                        <?php
                        if (isset($_SESSION['admin'])&&$_SESSION['admin']==1)
                        {
                            ?> <p class="stock">L'adminsitrateur ne peut commander !</p>
                            <a class="suppri"href=index.php?page=delete&produit=<?php echo $content->getId() ;?> ><i class="fas fa-trash"></i> Supprimer</a>
                            <?php
                        }
                        else if ($content->getStock()!=0 && isset($_SESSION['admin']))
                        {
                            ?> 
                            <form action="index.php?page=achat&nom=<?php echo $nom; ?>" method="POST">
                                <input type="number" min="1" name="quantite" value="1">
                                <input class="btnaj"type="submit" value="Ajouter">
                                </form>
                            <?php
                        }
                        else if ($content->getStock()==0)
                        {
                            ?> <p class="stock">Ce produit est malheursement en rupture de stock </p> <?php
                        }
                        else
                        {
                            ?> <p class="stock"> Veuillez vous <a href="index.php?page=connexion"> connecter</a> pour commander </p> <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
      </div>
    </body>
    </html>

