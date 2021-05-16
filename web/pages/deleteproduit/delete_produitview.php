<?php
if (isset($_SESSION['admin'])&& $_SESSION['admin']==1)
{
    if (isset($_POST['produit']))
    {
        include_once 'delete_produitcontrolleur.php';
        $instanceController= new delete_produitcontrolleur();
        $instanceController->deleteproduit($_POST['produit']);
        echo 'Le produit n°'.$_POST['produit'].'vien d\'etre supprimer';
    }
    if (isset($_GET['produit']))
    {
        include_once 'delete_produitcontrolleur.php';
        $instanceController= new delete_produitcontrolleur();
        $instanceController->deleteproduit($_GET['produit']);
        echo 'Le produit n°'.$_GET['produit'].'vien d\'etre supprimer';
    }
    else 
    {   
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
    </body>
    </html>
<?php
    }
}
?>
