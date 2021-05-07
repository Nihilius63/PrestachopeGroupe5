<<html>
    <head>
        <title></title>
    </head>
    <body>
    <?php
        include_once 'commandecontrolleurs.php';
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        include_once 'DAO/commandeDAO';
        include_once 'DTO/commandeDTO';
            $instanceController = new paniercontrolleur();
            $content=$instanceController->insertnewcommande();
            $supertotal=0;
            foreach ($content as $contents=>$values)
            {
                $total=0;
                $produit=produitDAO::selectproduitbynom($contents);
                $total=$produit->getprix()*$values;
                $supertotal=$total+$supertotal;
            }
            $commande->commandeDTO;
            $commande->setFacture($supertotal);
            $commande->setIdClient($_SESSION['id']);
            commandeDAO::insertcommande($commande);
            $id=databaselinker::getconnexion();
            $id=$id::lastInsertId();
            foreach ($content as $contents=>$values)
            {
                $produit=produitDAO::selectproduitbynom($contents);
                $produits->commande_produitDTO;
                $produits->setIdCommande($id);
                $produits->setIdProduit($produit->getId());
                $produits->setQuantite($values);
            }
    ?>
    </body>
</html>


