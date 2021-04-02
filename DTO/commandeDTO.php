<?php
	class commandeDTO
	{
            private $facture;
            private $idClient;
            public function getFacture() {
                return $this->facture;
            }

            public function getIdClient() {
                return $this->idClient;
            }

            public function setFacture($facture): void {
                $this->facture = $facture;
            }

            public function setIdClient($idClient): void {
                $this->idClient = $idClient;
            }  
        }
?>
                