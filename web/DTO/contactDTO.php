<?php
	class contactDTO
	{
                private $id;
		private $message;
		private $statuts;
		private $idClient;
                
                public function getMessage() {
                    return $this->message;
                }

                public function getStatuts() {
                    return $this->statuts;
                }
                public function getId() {
                    return $this->id;
                }

                public function setId($id): void {
                    $this->id = $id;
                }

                                public function getIdClient() {
                    return $this->idClient;
                }

                public function setMessage($message): void {
                    $this->message = $message;
                }

                public function setStatuts($statuts): void {
                    $this->statuts = $statuts;
                }

                public function setIdClient($idClient): void {
                    $this->idClient = $idClient;
                }


        }
?>