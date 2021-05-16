<?php
if (isset($_SESSION['admin'])&& $_SESSION['admin']==1)
{
    include_once 'delete_controlleur.php';
    $instanceController= new delete_controlleur();
    if (isset($_POST['produit']))
    {
        $instanceController->deleteproduit($_POST['produit']);
        echo 'Le produit n°'.$_POST['produit'].'vien d\'etre supprimer';
    }
    if (isset($_GET['produit']))
    {
        $instanceController->deleteproduit($_GET['produit']);
        echo 'Le produit n°'.$_GET['produit'].'vien d\'etre supprimer';
    }
        if (isset($_POST['souscategorie']))
    {
        $instanceController->deletesouscategorie($_POST['souscategorie']);
        echo 'La sous categorie n°'.$_POST['souscategorie'].'vien d\'etre supprimer';
    }
        if (isset($_POST['categorie']))
    {
        $instanceController->deletecategorie($_POST['categorie']);
        echo 'La categorie n°'.$_POST['categorie'].'vien d\'etre supprimer';
    }
    ?>
    <!DOCTYPE html>
    <meta charset="utf-8">
    <html>
    <head>
            <title>Creation produit</title>
    </head>
    <body>
        <form action="" method="post" class="form-example">
            <label for="produit">Choisissez un produit :</label>
            <select name="produit">
            <option value="">--Choisissez un produit--</option>
            <?php
            include_once 'DAO\produitDAO.php';
                 $produits=produitDAO::selectallproduit();
                 foreach ($produits as $content)
                 {
                    echo '<option value='.$content->getId().'>'.$content->getNom().'</option>';
                 }
            ?>
            </select>
            <div class="form-example">
        <input type="submit" value="Supprimer">
            </div>
            </form>
                <form action="" method="post" class="form-example">
        <label for="categorie">Choisissez une categorie :</label>
            <select name="categorie">
            <option value="">--Choisissez une categorie--</option>
            <?php
                include_once 'DAO\categorieDAO.php';
                $categories=categorieDAO::selectcategorie();
                foreach ($categories as $categorie)
                {
                   echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                }
            ?>
            </select>
            <div class="form-example">
        <input type="submit" value="Supprimer">
            </div>
            </form>
                <form action="" method="post" class="form-example">
            <label for="souscategorie">Choisissez une sous categorie :</label>
            <select name="souscategorie">
            <option value="">--Choisissez une sous categorie--</option>
            <?php
            include_once 'DAO\souscategorieDAO.php';
                $souscategories=souscategorieDAO::selectsouscategories();
                foreach ($souscategories as $souscategorie)
                {
                    echo '<option value='.$souscategorie->getIdSousCategorie().'>'.$souscategorie->getNomSousCategorie().'</option>';
                }
            ?>
            </select>
            <div class="form-example">
        <input type="submit" value="Supprimer">
            </div>
            </form>
    </body>
    </html>
<?php
}
?>
