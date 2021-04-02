<?php
	class commande_produitDTO
	{
		private $idProduit;
		private $quantite;
                public function getIdProduit() {
                    return $this->idProduit;
                }

                public function getQuantite() {
                    return $this->quantite;
                }

                public function setIdProduit($idProduit): void {
                    $this->idProduit = $idProduit;
                }

                public function setQuantite($quantite): void {
                    $this->quantite = $quantite;
                }
        }
?>