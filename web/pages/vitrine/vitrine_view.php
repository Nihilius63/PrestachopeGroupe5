<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/vitrine.css" media="all"/>
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
      <?php
      if(isset($_GET['commande']))
      {
         echo 'Merci pour votre commande Monsieur/Madame '.$_SESSION['nom'].' '.$_SESSION['prenom'].' Vous serai livrer au '.$_SESSION['adresse']. 'dans les plus bref delai' ;
      }
      ?>
    <div class="contenue">
        <?php
          include_once "vitrine_controlleur.php";
          $instanceController = new vitrine_controlleur();
          $allcat=$instanceController->IncludeAllCategorie();
          foreach ($allcat as $allcate)
          {

              $cat=$instanceController->IncludeCategorie($allcate->getIdCategorie());
              foreach ($cat as $cate)
              {
                  ?>
                    <div class="produitbycat">
                        <div class="Nom">
                          <h1> Nos <?php echo $cate->getCategorieProduit();?></h1> <br>
                          <a href="index.php?categorie=<?php echo $cate->getIdCategorie();?>&page=pagerecherche"> Plus de <?php echo $cate->getCategorieProduit();?> <i class="fas fa-arrow-right"></i> </a>
                        </div>
                  <?php
               }
                  ?>
                        <div class="listproduit">
                        <?php
                        $content=$instanceController->IncludeProduit($allcate->getIdCategorie());
                        foreach ($content as $contents)
                        {
                        ?>
                        <div class="descProduit">
                            <div class="produit">
                                <a href="index.php?produit=<?php echo $contents->getId()?>&page=detail"><img class="imgProduit" src= "<?php echo $contents->getImage() ?>"></a><br>
                            </div>
                            <div class="texte">
                              <h3> <?php echo $contents->getNom() ?> </h3>
                              <p> <?php echo $contents->getDescription() ?></p>
                              <p> <?php echo $contents->getPrix() ?> €</p>
                                <?php $nom=$contents->getNom(); ?>
                                <?php
                                if (isset($_SESSION['admin'])&&$_SESSION['admin']==1)
                                {
                                    ?> <p class="stock">L'adminsitrateur ne peut commander !</p>
                                    <a class="suppri" href=index.php?page=delete_produit&produit=<?php echo $contents->getId(); ?> ><i class="fas fa-trash"></i> Supprimer</a>
                                    <?php
                                }
                                else if ($contents->getStock()!=0 && isset($_SESSION['admin']))
                                {
                                ?> 
                                <form action="index.php?page=achat&nom=<?php echo $nom; ?>" method="POST">
                                    <input type="number" min="1" name="quantite" value="1">
                                    <input class="btnaj"type="submit" value="Ajouter">
                                    </form>
                                <?php
                                }
                                else if ($contents->getStock()==0)
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
              <?php
          }
        ?>
    </div>
  </body>
</html>
