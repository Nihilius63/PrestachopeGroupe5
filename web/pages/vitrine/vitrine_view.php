<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="all"/>
    <title> Prestachope </title>
  </head>
  <body>
      <?php
        include_once "vitrine_controlleur.php";
        $instanceController = new vitrine_controlleur();
        $allcat=$instanceController->IncludeAllCategorie();
        foreach ($allcat as $allcate)
        {
            
            $cat=$instanceController->IncludeCategorie($allcate->getIdCategorie());
            foreach ($cat as $cate)
            {
                echo $cate->getCategorieProduit().'<br>';
            }
            
            $content=$instanceController->IncludeProduit($allcate->getIdCategorie());
            foreach ($content as $contents)
            {
              echo $contents->getNom().'<br>';
              echo $contents->getPrix().'<br>';
              echo $contents->getStock().'<br>';
              echo $contents->getImage().'<br>';
              $nom=$contents->getNom();
            }
        }
  ?>
  </body>
</html>
