<?php
class Creation_produitcontrolleur
{
    public function includeview() 
    {
        include_once 'Creation_produitview.php';
    }
    public function newproduct($nom,$description,$prix,$stock,$categorie,$image,$idsouscategorie) 
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        $produit=new produitDTO();
        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix($prix);
        $produit->setStock($stock);
        $produit->setIdCategorie($categorie);
        $produit->setImage($image);
        $produit->setIdsouscategorie($idsouscategorie);
        produitDAO::insertproduct($produit);
    }
    public function insertproduct()
    {
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) 
            {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 
            else 
            {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) 
        {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
          echo "Sorry, your file was not uploaded.";
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } 
            else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $instanceController= new Creation_produitcontrolleur();
        $instanceController->newproduct($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie'],$target_file,$_POST['souscategorie']);
    }
}
?>

