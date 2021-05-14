<?php
if (isset($_POST['Nom']))
{
    include_once 'Creation_categoriecontrolleur.php';
    $instanceController=new Creation_categoriecontrolleur();
    $instanceController->newcategorie($_POST['Nom']);
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
	<div class="form-example">
    <label for="Nom">Nom :</label>
    <input type="text" name="Nom" id="Nom" required>
  	</div>
  	<div class="form-example">
    <input type="submit" value="Envoyer">
  	</div>
  	</form>
</body>
</html>


