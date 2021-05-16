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
            if(!isset($_SESSION['admin']) || $_SESSION['admin']!=1)
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
                        if ($content->getStock()!=0 && isset($_SESSION['admin']))
                        {
                            ?> <form action="index.php?page=achat&nom=<?php echo $nom; ?>" method="POST">
                                <input type="number" name="quantite" value="1">
                                <input type="submit" value="Ajouter">
                                </form>
                            <?php
                        }
                        else if ($content->getStock()==0)
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
                ?> 
                <div class="modifproduit">
                    <div class="modprod">
                        <h1> <span>M</span>odification <span>P</span>roduit </h1>
                        <form action="" method="POST">
                        <p> Nom du produit : <input type="text" name="nom" value=" <?php echo $content->getNom() ;?>"required></p>
                        <p> Prix du produit : <input type="text" name="prix" value="<?php echo  $content->getPrix() ;?>"required></p>
                        <p> Description du produit : <input type="text" name="description" value="<?php echo $content->getDescription() ;?>"required></p>
                        <p> Stock disponible : <input type="text" name="stock" value="<?php echo $content->getStock() ;?>"required></p>
                        <p><label for="categorie" required>Choisissez une categorie :</label>
                        <select name="categorie">
                        <option value=" <?php echo$content->getIdCategorie() ;?>">--Choisissez une categorie--</option></p>
                        <?php 
                        $categories=categorieDAO::selectcategorie();
                        foreach ($categories as $categorie)
                            {
                                echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                            }
                        ?>
                        </select><br>
                        <p> <label for="souscategorie" required>Choisissez une souscategorie :</label>
                        <select name="souscategorie">
                        <option value=" <?php echo $content->getIdsouscategorie() ;?>">--Choisissez une souscategorie--</option></p>
                            <?php
                             $categories=souscategorieDAO::selectsouscategories();
                             foreach ($categories as $categorie)
                             {
                                 echo '<option value='.$categorie->getIdSousCategorie().'>'.$categorie->getNomSousCategorie().'</option>';
                             }
                        ?>
                        </select><br>
                        <input class="btnvalider" type="submit" value="Valider">
                        </form> 
                        <?php echo '<a href=index.php?page=delete_produit&produit='.$content->getId().'><i class="fas fa-trash"></i> Supprimer</a>';?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>



