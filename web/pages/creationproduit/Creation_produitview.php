<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Creation produit</title>
</head>
<body>
    <form action="" method="post" class="form-example" enctype="multipart/form-data">
        <div class="form-example">
        <label for="Nom">Nom :</label>
        <input type="text" name="Nom" id="Nom" required>
    </div>
    <div class="form-example">
        <label for="description">description</label>
        <input type="text" name="description" id="description" required>
    </div>
    <div class="form-example">
        <label for="prix">prix</label>
        <input type="text" name="prix" id="description" required>
    </div>
    <div class="form-example">
        <label for="stock">Stock</label>
        <input type="number" name="Stock" id="description" required>
    </div>
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
        </select><br>
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
        </select><br>
        <label for="fileToUpload">Image:</label>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Ajouter" name="submit">
  	</form>
</body>
</html>

