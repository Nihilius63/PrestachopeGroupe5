<?php
	class produitDTO
	{
                private $id;
                private $nom;
		private $prix;
                private $description;
                private $stock;
                private $idCategorie;
                
                public function getId() {
                    return $this->id;
                }

                public function setId($id): void {
                    $this->id = $id;
                }

                public function getNom() {
                    return $this->nom;
                }

                public function getPrix() {
                    return $this->prix;
                }

                public function getDescription() {
                    return $this->description;
                }

                public function getStock() {
                    return $this->stock;
                }

                public function getIdCategorie() {
                    return $this->idCategorie;
                }

                public function setNom($nom): void {
                    $this->nom = $nom;
                }

                public function setPrix($prix): void {
                    $this->prix = $prix;
                }

                public function setDescription($description): void {
                    $this->description = $description;
                }

                public function setStock($stock): void {
                    $this->stock = $stock;
                }

                public function setIdCategorie($idCategorie): void {
                    $this->idCategorie = $idCategorie;
                }
        }
?>