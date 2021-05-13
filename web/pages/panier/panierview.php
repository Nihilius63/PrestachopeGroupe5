<?php
include_once 'paniercontrolleur.php';
$instanceController = new paniercontrolleur();
$content=$instanceController->testclear();
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
            $content=$instanceController->content();
            $supertotal=0;
            foreach ($content as $contents=>$values)
            {
                $total=0;
                echo $contents.'<br>';
                $produit=produitDAO::selectproduitbynom($contents);
                echo $produit->getPrix().'<br>';
                echo "Quantité: ".$values.'<br>';
                $total=floatval($produit->getPrix())*$values;
                echo "Total:".$total.'<br>';
                $supertotal=$total+$supertotal;
            }
        
       echo '<a href="index.php?page=commande">Valider ma commande '.$supertotal.'</a><br>';
       echo '<a href="index.php?page=panier&panier=clear">Vider le panier</a>';
       ?>
    </body>
</html>



