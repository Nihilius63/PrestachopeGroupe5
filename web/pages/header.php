<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/header.css"/>
        <link rel="stylesheet" href="assets/css/reset.css"/>
        <script src="https://kit.fontawesome.com/e4c565c7ff.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="containt">
                <div class="top">
                    <div class="titre">
                        <h1> Prestachope </h1>
                    </div>
                </div>
                <?php
                include_once 'DAO/categorieDAO.php';
                include_once 'DAO/souscategorieDAO.php';
                $allcategories=categorieDAO::selectcategorie();
                foreach ($allcategories as $all)
                {
                $souscate=souscategorieDAO::selectsouscategoriesbycategories($all);
                echo '
                <div class="dropdown">
                    <ul>
                        <li class="ligne">
                            <a href="index.php?categorie='.$all->getIdCategorie().'&page=pagerecherche" value='.$all->getIdCategorie().'>'.$all->getCategorieProduit().'</a>
                            <ul class="sub-menu">';
                                foreach ($souscate as $souscat) 
                                {
                                    echo'
                                    <li><a href="index.php?souscate='.$souscat->getIdSousCategorie().'&page=pagerecherche"  value='.$souscat->getIdSousCategorie().'>'.$souscat->getNomSousCategorie().'</a></li>';
                                }
                                echo '
                            </ul>
                        </li>
                    </ul>
                </div>';
                }
                ?>
                <div class="btn">
                    <a href="index.php?page=connexion"  value="connexion" >Connexion</a>
                    <a href="index.php?page=inscription"  value="inscription" >Inscription</a>
               </div>
                <?php
                if (isset($_SESSION['nom'],$_SESSION['prenom']))
                {
                    echo '<a href="index.php?page=panier">Panier</a>';
                }
                ?>
            </div>
        </header>
    </body>
</html>



