<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/header.css"/>
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
                                <h2><a href="index.php?categorie='.$all->getIdCategorie().'&page=pagerecherche" value='.$all->getIdCategorie().'>'.$all->getCategorieProduit().'</a>';
                                if (isset($_SESSION['admin']))
                                {
                                    if ($_SESSION['admin']==1)
                                    {
                                        echo '<a href="index.php?categorie='.$all->getIdCategorie().'&page=modif&nom='.$all->getCategorieProduit().'" value='.$all->getIdCategorie().'><i class="fas fa-pen"></i></a></h2>';
                                    }
                                }
                               echo '<ul class="sub-menu">';
                                    foreach ($souscate as $souscat) 
                                    {
                                        echo'
                                        <li><a href="index.php?souscate='.$souscat->getIdSousCategorie().'&page=pagerecherche"  value='.$souscat->getIdSousCategorie().'>'.$souscat->getNomSousCategorie().'</a>';
                                        if (isset($_SESSION['admin']))
                                        {
                                            if ($_SESSION['admin']==1)
                                            {
                                                echo '<a href="index.php?souscate='.$souscat->getIdSousCategorie().'&page=modif&nom='.$souscat->getNomSousCategorie().'"  value='.$souscat->getIdSousCategorie().'><i class="fas fa-pen"></i></a></li>';
                                            }
                                        }
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
                    <a href="index.php?page=presentation"  value="presentation" ><i class="fas fa-home"></i></a>
                    <?php
                    if(isset($_SESSION['admin']))
                    {
                        if ($_SESSION['admin']==1)
                        {
                            echo '<a href="index.php?page=gestion"><i class="fas fa-users"></i></a>';
                            include_once 'DAO/contactDAO.php';
                            if (contactDAO::selecnbtmsg()!=0)
                            {
                               echo '<a href="index.php?page=contact"><i class="fas fa-envelope"></i></a><br>';
                               echo contactDAO::selecnbtmsg().'<br>';
                            }
                            include_once 'DAO/commandeDAO.php';
                            echo 'La tresorie et de '.commandeDAO::gettresorie().'€';
                    ?>
                    <div class="dropdown">
                        <div class="cat">
                            <ul>
                                <li class="ligne">
                                    <h2>
                                        <a href="index.php?page=vitrine"><i class="fas fa-plus-square"></i></a>
                                    </h2>
                                    <ul class="sub-menu">
                                        <li><a href="index.php?page=new_product" value="1"><i class="fas fa-plus-square"></i>Produit</a></li>
                                        <li><a href="index.php?page=new_categorie" value="1"><i class="fas fa-plus-square"></i>Categorie</a></li>
                                        <li><a href="index.php?page=new_souscategorie" value="1"><i class="fas fa-plus-square"></i>SousCategorie</a></li>
                                    </ul>
                                </li>
                                <li class="ligne">
                                    <h2>
                                        <a href="index.php?page=vitrine"><i class="fas fa-trash-alt"></i></a>
                                    </h2>
                                    <ul class="sub-menu">
                                        <li><a href="index.php?page=delete_produit" value="1"><i class="fas fa-trash-alt"></i>Produit</a></li>
                                        <li><a href="index.php?page=delete_categorie" value="1"><i class="fas fa-trash-alt"></i>Categorie</a></li>
                                        <li><a href="index.php?page=delete_souscategorie" value="1"><i class="fas fa-trash-alt"></i></i>SousCategorie</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }
                        else
                        {
                            echo '<a href="index.php?page=contact"><i class="fas fa-envelope"></i></a><br>';
                        }
                    }
                    if (isset($_SESSION['nom'],$_SESSION['prenom']))
                    {
                        if (isset($_SESSION['admin'])&&$_SESSION['admin']==0)
                        {
                            echo '<a href="index.php?page=panier"><i class="fas fa-shopping-cart"></i></a>';
                            $tailletab= count($_SESSION['panier']);
                            if ($tailletab>0)
                            {
                              ?>
                            <div class="nb-panier">
                                <p><?php echo $tailletab ?> </p>
                            </div>
                            <?php  
                            }
                        }
                        echo '<a href="index.php?page=deco"><i class="fas fa-power-off"></i></a>';  
                    }
                    else {
                        ?>
                            <a href="index.php?page=connexion"  value="connexion" ><i class="far fa-user"></i></a>
                        <?php
                    }
                    ?>
                </div>           
            </div>
        </header>
    </body>
</html>