<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/gestion.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
      <div class="conteneur">
          <div class="utilisateur">
              <h1> <span>G</span>estion <span>D</span>es <span>U</span>tilisateurs </h1>
              <?php
              include_once 'gestionutilisateurscontrolleur.php';
              $instanceController=new gestionutilisateurscontrolleur();
              if(isset($_GET['nom']))
              {
                  $instanceController->deleteuser($_GET['nom']);
              }
              $content=$instanceController->SelectAlluser();
              foreach ($content as $contents)
              {
                  ?>
                    <div class="boxutilisa">
                        <div class="uti">
                            <p> <?php echo $contents->getNom();?>
                            <?php echo $contents->getPrenom(); ?> </p>
                            <p> <?php echo $contents->getMail(); ?> </p>
                        </div>
                        <div class="suppr">
                            <a href="index.php?page=gestion&nom=<?php echo $contents->getNom() ;?>"><i class="fas fa-times"></i></a><br>
                        </div>
                    </div>
                  <?php
              }
              ?>
          </div>
      </div>
 </body>
</html>
