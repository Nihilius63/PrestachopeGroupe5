<?php
	class souscategorieDTO
	{
            private $nomSousCategorie;
            private $idCategorie;
            public function getNomSousCategorie() {
                return $this->nomSousCategorie;
                }

                public function getIdCategorie() {
                    return $this->idCategorie;
                }

                public function setNomSousCategorie($nomSousCategorie): void {
                    $this->nomSousCategorie = $nomSousCategorie;
                }

                public function setIdCategorie($idCategorie): void {
                    $this->idCategorie = $idCategorie;
                }
        }
?>