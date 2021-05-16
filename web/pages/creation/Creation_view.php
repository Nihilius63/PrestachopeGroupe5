<?php
if (isset($_SESSION['admin'])&& $_SESSION['admin']==1)
{
    include_once 'Creation_controlleur.php';
    $instanceController=new Creation_controlleur();
    if (isset($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie'],$_POST['souscategorie']))
    {
        $instanceController->insertproduct();
        echo "Le produit ".$_POST['Nom']." a bien ete ajouter";
    }
    if (isset($_POST['Nomsous'],$_POST['categorie']))
    {
        $instanceController->newsouscategorie($_POST['Nomsous'],$_POST['categorie']);
        echo "La sous-categorie ".$_POST['Nomsous']." a bien ete ajouter";
    }
    if (isset($_POST['Nomcate']))
    {
        $instanceController->newcategorie($_POST['Nomcate']);
        echo "La categorie ".$_POST['Nomcate']." a bien ete ajouter";
    }
    ?>
    <!DOCTYPE html>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/Add_produit.css" media="all"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <html>
    <head>
            <title>Creation produit</title>
    </head>
    <body>
        <div class="contenue">
            <div class="prod">
                <div class="titreadd">
                    <h1> <span>A</span>jouter <span>U</span>n <span>P</span>roduit </h1>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-example">
                    <label for="Nom">Nom :</label>
                    <input type="text" name="Nom" id="Nom" required>
                </div>
                <div class="form-example">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" required></textarea>
                </div>
                <div class="form-example">
                    <label for="prix">Prix</label>
                    <input type="text" name="prix" id="description" required>
                </div>
                <div class="form-example">
                    <label for="stock">Stock</label>
                    <input type="number" name="Stock" id="description" required>
                </div>
                    <div class="form-example">
                        <label for="categorie">Choisissez une categorie :</label>
                        <select name="categorie">
                        <option value="">--Choisissez une categorie--</option>
                        <?php
                             $categories=categorieDAO::selectcategorie();
                             foreach ($categories as $categorie)
                             {
                                echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                             }
                        ?>
                        </select>
                    </div>
                    <div class="form-example">
                        <label for="souscategorie">Choisissez une souscategorie :</label>
                        <select name="souscategorie">
                        <option value="">--Choisissez une souscategorie--</option>
                        <?php
                             $categories=souscategorieDAO::selectsouscategories();
                             foreach ($categories as $categorie)
                             {
                                echo '<option value='.$categorie->getIdSousCategorie().'>'.$categorie->getNomSousCategorie().'</option>';
                             }
                        ?>
                        </select>
                    </div>
                    <div class="form-example">
                        <label for="fileToUpload"></label>
                        <input class="upload-box" type="file" name="fileToUpload" id="fileToUpload"><br>
                    </div>
                    <div class="titreadd">
                        <input class="btnadd" type="submit" value="Ajouter" name="submit">
                    </div>
                    </form>
            </div>   
            
                <div class="prod">
                    <div class="titreadd">
                        <h1> <span>A</span>jouter <span>U</span>ne <span>C</span>atégorie</h1>
                    </div>
                    <form action="" method="post">
                        <div class="form-example">
                        <label for="Nomcate">Nom :</label>
                        <input type="text" name="Nomcate" id="Nom" required>
                        </div>
                        <div class="titreadd">
                            <input class="btnadd" type="submit" value="Ajouter" name="submit">
                        </div>
                    </form>
                </div>
                
                <div class="prod">
                    <div class="titreadd">
                        <h1> <span>A</span>jouter <span>U</span>ne <span>S</span>ous <span>C</span>atégorie</h1>
                    </div>
                    <form action="" method="post">
                    <div class="form-example">
                        <label for="Nom">Nom :</label>
                        <input type="text" name="Nomsous" id="Nom" required>
                    </div>
                    <div class="form-example">
                        <label for="categorie">Choisissez une categorie :</label>
                        <select name="categorie">
                        <option value="">--Choisissez une categorie--</option>
                        <?php
                             include_once 'DAO\categorieDAO.php';
                             $categories=categorieDAO::selectcategorie();
                             foreach ($categories as $categorie)
                             {
                                 echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                                 echo 'test';
                             }
                        ?>
                        </select>
                    </div>
                    <div class="titreadd">
                        <input class="btnadd" type="submit" value="Ajouter" name="submit">
                    </div>
                    </form>
                </div>
        </div>
    </body>
    </html>
<?php
}
?>

