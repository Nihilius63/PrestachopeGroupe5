<?php
class Creation_controlleur
{
    public function includeview() 
    {
        include_once 'Creation_view.php';
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
                echo "Le fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) 
        {
          echo "Fichier deja existant.";
          $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
          echo "Fichier trop lourd.";
          $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
          echo "Desole, uniquement les .JPG, .JPEG, .PNG & .GIF son autorisés.";
          $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
          echo "Erreur Fichier non telechargé";
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a ete telecharger.";
            } 
            else 
            {
                echo "Erreur Fichier non telechargé.";
            }
        }
        $instanceController= new Creation_controlleur();
        $instanceController->newproduct($_POST['Nom'],$_POST['description'],$_POST['prix'],$_POST['Stock'],$_POST['categorie'],$target_file,$_POST['souscategorie']);
    }
    public function newcategorie($nom) 
    {
        include_once 'DAO/categorieDAO.php';
        include_once 'DTO/categorieDTO.php';
        $categorie=new categorieDTO();
        $categorie->setCategorieProduit($nom);
        categorieDAO::insertcategorie($categorie);
    }
    public function newsouscategorie($nom,$id) 
    {
        include_once 'DAO/souscategorieDAO.php';
        include_once 'DTO/souscategorieDTO.php';
        $souscategorie=new souscategorieDTO();
        $souscategorie->setNomSousCategorie($nom);
        $souscategorie->setidCategorie($id);
        souscategorieDAO::insertsouscategorie($souscategorie);
    }
}
?>

