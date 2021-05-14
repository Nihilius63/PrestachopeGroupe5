<?php
if (isset($_POST['souscategorie']))
{
    include_once 'delete_souscategoriecontrolleur.php';
    $instanceController= new delete_souscategoriecontrolleur();
    $instanceController->deletesouscategorie($_POST['souscategorie']);
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Suppression souscategorie</title>
</head>
<body>
    <form action="" method="post" class="form-example">
        <label for="souscategorie">Choisissez une sous categorie :</label>
        <select name="souscategorie">
        <option value="">--Choisissez une sous categorie--</option>
        <?php
        include_once 'C:\xampp\htdocs\PrestachopeGroupe5\web\DAO\souscategorieDAO.php';
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

