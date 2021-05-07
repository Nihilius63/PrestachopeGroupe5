<?php
	class commande_produitDTO
	{
                private $idCommande;
		private $idProduit;
		private $quantite;
                public function getIdProduit() {
                    return $this->idProduit;
                }

                public function getQuantite() {
                    return $this->quantite;
                }
                public function getIdCommande() {
                    return $this->idCommande;
                }

                public function setIdCommande($idCommande): void {
                    $this->idCommande = $idCommande;
                }

                public function setIdProduit($idProduit): void {
                    $this->idProduit = $idProduit;
                }

                public function setQuantite($quantite): void {
                    $this->quantite = $quantite;
                }
        }
?>