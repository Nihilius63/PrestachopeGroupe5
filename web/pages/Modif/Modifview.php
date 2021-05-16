<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/modif.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <title> Prestachope </title>
  </head>
  <body>
      <div class="contenue">
        <?php
        if (isset($_POST['categorie']))
        {
            include_once 'DAO/categorieDAO.php';
            include_once 'DTO/categorieDTO.php';
            $categorie= new categorieDTO();
            $categorie->setCategorieProduit($_POST['categorie']);
            $categorie->setIdCategorie($_GET['categorie']);
            categorieDAO::updatecategorie($categorie);
        }
        if (isset($_POST['souscate']))
        {
            include_once 'DAO/categorieDAO.php';
            include_once 'DTO/categorieDTO.php';
            $souscategorie= new souscategorieDTO();
            $souscategorie->setNomSousCategorie($_POST['souscate']);
            $souscategorie->setIdSousCategorie($_GET['souscate']);
            souscategorieDAO::updatesouscategorie($souscategorie);
        }
        if (isset($_GET['categorie']))
        {
            ?>
            <div class="titredel">
                <h1> <span>M</span>odifier <span>L</span>a <span>C</span>atégorie </h1>
            </div>
            <div class="categorie">
                <form action="" method="POST">
                    <input type="text" name="categorie" value="<?php echo $_GET["nom"]; ?>"required>
                    <input  class="btnmodif" type="submit" value="Valider">
                </form>
            </div>
                <?php
        }
        elseif (isset ($_GET['souscate'])) 
        {
            ?>
            <div class="titredel">
                <h1> <span>M</span>odifier <span>L</span>a <span>S</span>ous <span>C</span>atégorie </h1>
            </div>
            <div class="souscategorie">
                <form action="" method="POST">
                    <input type="text" name="souscate" value=" <?php echo $_GET["nom"]; ?>"required>
                    <input class="btnmodif" type="submit" value="Valider">
                </form>
            </div>
            <?php
        }
        ?>
      </div>
 </body>
</html>

