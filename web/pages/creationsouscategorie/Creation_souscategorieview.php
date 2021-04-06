<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Creation souscategorie</title>
</head>
<body>
    <form action="" method="post" class="form-example">
        <div class="form-example">
            <label for="Nom">Nom :</label>
            <input type="text" name="Nom" id="Nom" required>
  	</div>
        <label for="categorie">Choisissez une categorie :</label>
        <select name="categorie">
        <option value="">--Choisissez une categorie--</option>
        <?php
             include_once 'C:\xampp\htdocs\PrestachopeGroupe5\web\DAO\categorieDAO.php';
             $categories=categorieDAO::selectcategorie();
             foreach ($categories as $categorie)
             {
                 echo '<option value='.$categorie->getIdCategorie().'>'.$categorie->getCategorieProduit().'</option>';
                 echo 'test';
             }
        ?>
        </select>
  	<div class="form-example">
            <input type="submit" value="Envoyer">
  	</div>
    </form>
</body>
</html>
