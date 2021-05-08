<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/vitrine.css" media="all"/>
    <title> Prestachope </title>
  </head>
  <body>
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
                  <div class="Nom">
                      <h1> Nos <?php echo $cate->getCategorieProduit();?></h1> <br>
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
                      <div class="produit">
                          <img class="imgProduit" src= "<?php echo $contents->getImage() ?>"><br>
                      </div>
                          <?php
                          echo $contents->getNom().'<br>';
                          echo $contents->getPrix().'<br>';
                          echo $contents->getStock().'<br>';
                          $nom=$contents->getNom();
                          ?>
                      <?php
                  }
                  ?>
              </div>
              <?php
          }
        ?>
    </div>
  </body>
</html>
