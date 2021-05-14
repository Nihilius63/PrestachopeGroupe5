<?php
	class utilisateursDTO
	{
                private $idClient;
		private $nom;
		private $prenom;
                private $adresse;
                private $mail;
                private $motdepasse;
                private $cagnote;
                private $admin;
                public function getNom() {
                    return $this->nom;
                }
                public function getIdClient() {
                    return $this->idClient;
                }

                public function setIdClient($idClient): void {
                    $this->idClient = $idClient;
                }
                public function getCagnote() {
                    return $this->cagnote;
                }

                public function setCagnote($cagnote): void {
                    $this->cagnote = $cagnote;
                }

                public function getPrenom() {
                    return $this->prenom;
                }

                public function getAdresse() {
                    return $this->adresse;
                }

                public function getMail() {
                    return $this->mail;
                }

                public function getMotdepasse() {
                    return $this->motdepasse;
                }

                public function getAdmin() {
                    return $this->admin;
                }
                public function setNom($nom): void {
                    $this->nom = $nom;
                }

                public function setPrenom($prenom): void {
                    $this->prenom = $prenom;
                }

                public function setAdresse($adresse): void {
                    $this->adresse = $adresse;
                }

                public function setMail($mail): void {
                    $this->mail = $mail;
                }

                public function setMotdepasse($motdepasse): void {
                    $this->motdepasse = $motdepasse;
                }

                public function setAdmin($admin): void {
                    $this->admin = $admin;
                }

        }
?>