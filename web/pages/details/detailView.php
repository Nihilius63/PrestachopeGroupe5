<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/detail.css" media="all"/>
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
            include_once "detailControlleur.php";
            $instanceController = new detailControlleur();
            $content=$instanceController->IncludeProduit($_GET['produit']);
            if($_SESSION['admin']!=1)
            {
                ?>
                <div class="boxProduit">
                    <div class="borderProduit">
                        <div class="imageProduit">
                            <img class="imgProduit" src= "<?php echo $content->getImage() ?>"><br>
                        </div>
                    </div>
                    <div class="text">
                        <h1> <?php echo $content->getNom() ?> </h1>
                         <p> <?php echo $content->getPrix() ?> € </p>
                         <p> <?php echo $content->getDescription() ?> </p>
                         <p> Stock disponible : <?php echo $content->getStock() ?> </p>
                         <?php 
                        $nom=$content->getNom();
                        if ($content->getStock()!=0)
                        {
                            ?> <form action="index.php?page=achat&nom=<?php $nom; ?>" method="POST">
                                <input type="number" name="quantite" value="1">
                                <input type="submit" value="Ajouter">
                                </form>
                            <?php
                        }
                        else
                        {
                            echo 'Ce produit et malheursement en rupture de stock';
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            else 
            {
                if(isset($_POST['nom'],$_POST['prix'],$_POST['description'],$_POST['stock']))
                {
                    include_once 'DAO/produitDAO.php';
                    include_once 'DTO/produitDTO.php';
                    $produit=new produitDTO();
                    $produit->setId($content->getId());
                    $produit->setNom($_POST['nom']);
                    $produit->setPrix($_POST['prix']);
                    $produit->setDescription($_POST['description']);
                    $produit->setStock($_POST['stock']);
                    $produit->setIdCategorie($_POST['categorie']);
                    echo $_POST['souscategorie'];
                    $produit->setIdsouscategorie($_POST['souscategorie']);
                    produitDAO::updateproduit($produit);
                }
                include_once 'DAO/categorieDAO.php';
                include_once 'DAO/souscategorieDAO.php';
                include_once 'DTO/categorieDTO.php';
                include_once 'DTO/souscategorieDTO.php';
                echo '<form action="" method="POST">
                <input type="text" name="nom" value="'.$content->getNom().'"required>
                <input type="text" name="prix" value="'.$content->getPrix().'"required>
                <input type="text" name="description" value="'.$content->getDescription().'"required>
                <input type="text" name="stock" value="'.$content->getStock().'"required>
                <label for="categorie" required>Choisissez une categorie :</label>
                <select name="categorie">
                <option value="'.$content->getIdCategorie().'">--Choisissez une categorie--</option>';
                $categories=categorieDAO::selectcategorie();
                foreach ($categories as $categorie)
                    {
                        echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                    }
                echo '
                </select><br>
                <label for="souscategorie" required>Choisissez une souscategorie :</label>
                <select name="souscategorie">
                <option value="'.$content->getIdsouscategorie().'">--Choisissez une souscategorie--</option>';
                     $categories=souscategorieDAO::selectsouscategories();
                     foreach ($categories as $categorie)
                     {
                        echo '<option value='.$categorie->getIdSousCategorie().'>'.$categorie->getNomSousCategorie().'</option>';
                     }
                echo'
                <input type="submit" value="Valider">
                </form> ';
            }
            ?>
        </div>
    </body>
</html>



