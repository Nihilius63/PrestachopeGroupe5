<?php
 include_once "detailControlleur.php";
  $instanceController = new detailControlleur();
  $content=$instanceController->IncludeProduit($_GET['produit']);
    if($_SESSION['admin']!=1)
    {
        echo $content->getId().'<br>';
        echo $content->getNom().'<br>';
        echo $content->getPrix().'<br>';
        echo $content->getDescription().'<br>';
        echo $content->getStock().'<br>';
        echo $content->getIdCategorie().'<br>';
        echo $content->getImage().'<br>';
        $nom=$content->getNom();
        if ($content->getStock()!=0)
        {
            echo '<form action="index.php?page=achat&nom='.$nom.'" method="POST">
                <input type="number" name="quantite" value="1">
                <input type="submit" value="Acheter">
                </form> ';
        }
        else
        {
            echo 'Ce produit et malheursement en rupture de stock';
        }
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


