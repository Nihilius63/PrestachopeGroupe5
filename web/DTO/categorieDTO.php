<?php
	class categorieDTO
	{
            private $categorieProduit;
            private $idCategorie;
            public function getCategorieProduit() {
                return $this->categorieProduit;
            }

            public function setCategorieProduit($categorieProduit): void {
                $this->categorieProduit = $categorieProduit;
            }
            public function getIdCategorie() {
            return $this->idCategorie;
            }

            public function setIdCategorie($idCategorie): void {
            $this->idCategorie = $idCategorie;
            }
        }
?>