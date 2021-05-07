<?php
 include_once "detailControlleur.php";
  $instanceController = new detailControlleur();
  $content=$instanceController->IncludeProduit($_GET['produit']);
  foreach ($content as $contents)
  {
    echo $contents->getId().'<br>';
    echo $contents->getNom().'<br>';
    echo $contents->getPrix().'<br>';
    echo $contents->getDescription().'<br>';
    echo $contents->getStock().'<br>';
    echo $contents->getIdCategorie().'<br>';
    echo $contents->getImage().'<br>';
    $nom=$contents->getNom();
  }
echo '
<form action="index.php?page=achat&nom='.$nom.'" method="POST">
<input type="number" name="quantite" value="1">
<input type="submit" value="Acheter">
</form> ';

