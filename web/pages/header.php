<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/header.css"/>
        <link rel="stylesheet" href="assets/css/reset.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e4c565c7ff.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="containt">
                <div class="top">
                    <div class="titre">
                        <h1> <a href="index.php?page=vitrine">Prestach<span>O</span>pe </a></h1>
                    </div>
                </div>
                <div class="dropdown">
                <?php
                include_once 'DAO/categorieDAO.php';
                include_once 'DAO/souscategorieDAO.php';
                $allcategories=categorieDAO::selectcategorie();
                foreach ($allcategories as $all)
                {
                $souscate=souscategorieDAO::selectsouscategoriesbycategories($all);
                echo '
                <div class="cat">
                    <ul>
                        <li class="ligne">
                            <h2><a href="index.php?categorie='.$all->getIdCategorie().'&page=pagerecherche" value='.$all->getIdCategorie().'>'.$all->getCategorieProduit().'</a></h2>
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
                </div>
                <div class="btndroite">
                    <?php
                    if (isset($_SESSION['nom'],$_SESSION['prenom']))
                    {
                        echo '<a href="index.php?page=panier"><i class="fas fa-shopping-cart"></i></a>';
                        echo '<a href="index.php?page=deco">Deconnexion</a>';  
                    }
                    else {
                        ?>
                            <a href="index.php?page=connexion"  value="connexion" ><i class="far fa-user"></i></a>
                            <a href="index.php?page=inscription"  value="inscription" ><i class="far fa-user"></i></a>
                        <?php
                    }
                    ?>
                </div>           
            </div>
        </header>
    </body>
</html>