<?php
if (isset($_POST['categorie']))
{
    include_once 'delete_categoriecontrolleur.php';
    $instanceController= new delete_categoriecontrolleur();
    $instanceController->deletecategorie($_POST['categorie']);
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
</body>
</html>


