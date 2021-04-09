<?php
	class souscategorieDTO
	{
            private $idSousCategorie;
            private $nomSousCategorie;
            private $idCategorie;
            public function getNomSousCategorie() {
                return $this->nomSousCategorie;
                }
                public function getIdSousCategorie() {
                    return $this->idSousCategorie;
                }

                public function setIdSousCategorie($idSousCategorie): void {
                    $this->idSousCategorie = $idSousCategorie;
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