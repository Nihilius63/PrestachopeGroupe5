    <!DOCTYPE html>
    <meta charset="utf-8">
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/delete.css" media="all"/>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
        <title>Prestachope</title>
    </head>
    <body>
        <div class="contenue">
                <?php
                if (isset($_SESSION['admin'])&& $_SESSION['admin']==1)
                {
                    include_once 'delete_controlleur.php';
                    $instanceController= new delete_controlleur();
                    if (isset($_POST['produit']))
                    {
                        $instanceController->deleteproduit($_POST['produit']);
                        ?> <p class="checkmsg"><i class="fas fa-check"></i>Le produit n°<?php echo $_POST['produit'] ;?>vien d'etre supprimé </p>
                        <?php
                    }
                    if (isset($_GET['produit']))
                    {
                        $instanceController->deleteproduit($_GET['produit']);
                        ?> <p class="checkmsg"><i class="fas fa-check"></i> Le produit n° <?php echo $_GET['produit'] ;?> vien d'etre supprimé </p>
                        <?php
                    }
                        if (isset($_POST['souscategorie']))
                    {
                        $instanceController->deletesouscategorie($_POST['souscategorie']);
                        ?> <p class="checkmsg"><i class="fas fa-check"></i> La sous categorie n° <?php echo $_POST['souscategorie']; ?> vien d'etre supprimé </p>
                        <?php
                    }
                        if (isset($_POST['categorie']))
                    {
                        $instanceController->deletecategorie($_POST['categorie']);
                        ?> <p class="checkmsg"><i class="fas fa-check"></i> La categorie n°<?php echo $_POST['categorie'] ;?> vien d'etre supprimé </p>
                        <?php
                    }
                    ?>
            <div class="suppr">
                <div class="titredel">
                    <h1> <span>S</span>upprimer <span>U</span>n <span>P</span>roduit </h1>
                </div>
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
                        <input class="btnsuppr" type="submit" value="Supprimer">
                    </div>
                    </form>
            </div>
            
            <div class="suppr">
                <div class="titredel">
                    <h1> <span>S</span>upprimer <span>U</span>ne <span>C</span>ategorie </h1>
                </div>
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
                    <input class="btnsuppr" type="submit" value="Supprimer">
                </div>
                </form>
            </div>
            
            <div class="suppr">
                <div class="titredel">
                    <h1> <span>S</span>upprimer <span>U</span>ne <span>S</span>ous <span>P</span>roduit </h1>
                </div>
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
                    <input  class="btnsuppr" type="submit" value="Supprimer">
                </div>
                </form>
            </div>
        </div>
    </body>
    </html>
<?php
}
?>
