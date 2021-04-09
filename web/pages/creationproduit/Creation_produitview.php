<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Creation produit</title>
</head>
<body>
    <form action="" method="post" class="form-example">
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
        <input type="number" name="prix" id="description" required>
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
        </select>
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
  	<div class="form-example">
    <input type="submit" value="Envoyer">
  	</div>
  	</form>
</body>
</html>

