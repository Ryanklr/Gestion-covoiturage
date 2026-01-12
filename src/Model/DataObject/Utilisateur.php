<?php

namespace App\Covoiturage\Model\DataObject;

class Utilisateur extends AbstractDataObject {
   public string $login; // Propriété pour stocker le login de l'utilisateur
   public string $nom;   // Propriété pour stocker le nom de l'utilisateur
   public string $prenom; // Propriété pour stocker le prénom de l'utilisateur

   // Getter pour le login
   public function getLogin(): string {
      return $this->login; // Retourne la valeur du login
   }

   // Setter pour le login
   public function setLogin(string $login) {
      $this->login = $login; // Définit la valeur du login
   }

   // Getter pour le nom
   public function getNom(): string {
      return $this->nom; // Retourne la valeur du nom
   }

   // Setter pour le nom
   public function setNom(string $nom) {
      $this->nom = $nom; // Définit la valeur du nom
   }

   // Getter pour le prénom
   public function getPrenom(): string {
      return $this->prenom; // Retourne la valeur du prénom
   }

   // Setter pour le prénom
   public function setPrenom(string $prenom) {
      $this->prenom = $prenom; // Définit la valeur du prénom
   }

   // Constructeur de la classe
   public function __construct(
      string $login = "", // Initialise le login avec une valeur par défaut
      string $nom  = "",  // Initialise le nom avec une valeur par défaut
      string $prenom = ""  // Initialise le prénom avec une valeur par défaut
   ) {
      $this->login = $login; // Assigne la valeur du login
      $this->nom = $nom;     // Assigne la valeur du nom
      $this->prenom = $prenom; // Assigne la valeur du prénom
   }

   // Formate les données de l'utilisateur en tableau
   public function formatTableau(): array {
      return [
         "login" => $this->login,   // Ajoute le login au tableau
         "nom" => $this->nom,       // Ajoute le nom au tableau
         "prenom" => $this->prenom   // Ajoute le prénom au tableau
      ];
   }
}
?>
