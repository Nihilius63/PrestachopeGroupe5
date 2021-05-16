<?php
include_once 'paniercontrolleur.php';
$instanceController = new paniercontrolleur();
$content=$instanceController->testclear();
$instanceController->testnom();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/panier.css" media="all"/>
        <title>title</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="conteneur">
            <div class="panier">
                <div class="titrepanier">
                    <h1> <span>P</span>anier </h1>
                </div>
                <?php
                include_once 'DAO/produitDAO.php';
                include_once 'DTO/produitDTO.php';
                    $content=$instanceController->content();
                    $supertotal=0;
                    foreach ($content as $contents=>$values)
                    {
                        ?> 
                        <div class="produit"> 
                            <?php $total=0;
                            $produit=produitDAO::selectproduitbynom($contents);
                            ?>
                            <div class="prodpan">
                                <a href="index.php?produit=<?php echo $produit->getId()?>&page=detail"><img class="imgProduit" src= "<?php echo $produit->getImage() ?>"></a>
                            </div>
                            <div class="nomdesc">
                                <h2> <?php echo $produit->getNom(); ?> </h2>
                                <p> <?php echo $produit->getDescription(); ?> </p>
                            </div>
                            <div class="quantprix">
                                <p> Quantitée(s) : <?php echo $values ; ?> </p>
                                <p> <?php echo $produit->getPrix(); ?> € </p>
                            </div>
                            <div class="total">
                                <?php
                                $total=floatval($produit->getPrix())*$values;
                                ?> <p> Total : <?php echo $total; ?> €
                                <?php $supertotal=$total+$supertotal;
                                ?> <a href="index.php?page=panier&nom= <?php echo $produit->getNom(); ?> "><i class="fas fa-times"></i></a></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <button><a href="index.php?page=panier&panier=clear">Vider le panier</a></button></br>
                    <button> <a href="index.php?page=commande">Valider ma commande de <?php echo $supertotal ;?> €</a> </button>
            </div>
        </div>
    </body>
</html>



