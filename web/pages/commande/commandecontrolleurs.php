<?php
class commandecontrolleurs 
{
        public function includeview() 
    {
        include_once 'commandeview.php';
    }
        public function content() 
    {
        if (isset($_SESSION['panier']))
        {
            $tab=[];
            foreach ($_SESSION['panier'] as $panier =>$value)
            {
                $tab[$panier]=$value;
            }
            return $tab;
        }
    }
    public function insertnewcommande()
    {
        include_once 'DAO/produitDAO.php';
        include_once 'DTO/produitDTO.php';
        include_once 'DAO/commandeDAO';
        include_once 'DTO/commandeDTO';
        $instanceController = new paniercontrolleur();
        $content=$instanceController->content();
        $supertotal=0;
        foreach ($content as $contents=>$values)
        {
            $produit=produitDAO::selectproduitbynom($contents);
            $total=$produit->getprix()*$values;
            $supertotal=$total+$supertotal;
        }
        $commande= new commandeDTO();
        $commande->setFacture($supertotal);
        $commande->setIdClient($_SESSION['id']);
        commandeDAO::insertcommande($commande);
        $id=databaselinker::getconnexion();
        $id=$id::lastInsertId();
        foreach ($content as $contents=>$values)
        {
            $produit=produitDAO::selectproduitbynom($contents);
            $produits= new commande_produitDTO();
            $produits->setIdCommande($id);
            $produits->setIdProduit($produit->getId());
            $produits->setQuantite($values);
        }
    }
}
