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
        include_once 'C:\xampp\htdocs\PrestachopeGroupe5\web\DAO\produitDAO.php';
             $produits=produitDAO::selectproduit();
             foreach ($produits as $produit)
             {
                echo '<option value='.$produit->getId().'>'.$produit->getNom().'</option>';
             }
        ?>
        </select>
  	<div class="form-example">
    <input type="submit" value="Supprimer">
  	</div>
  	</form>
</body>
</html>

