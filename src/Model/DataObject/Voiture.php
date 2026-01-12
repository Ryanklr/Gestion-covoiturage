<?php
namespace App\Covoiturage\Model\DataObject;

class Voiture extends AbstractDataObject {
   private string $immatriculation; // Immatriculation de la voiture
   private string $marque; // Marque de la voiture
   private string $couleur; // Couleur de la voiture
   private int $nbSieges; // Nombre de places assises

   // Getter pour la marque
   public function getMarque(): string {
      return $this->marque; // Retourne la marque
   }

   // Setter pour la marque
   public function setMarque(string $marque) {
      $this->marque = $marque; // Définit la marque
   }

   // Getter pour la couleur
   public function getCouleur(): string {
      return $this->couleur; // Retourne la couleur
   }

   // Setter pour la couleur
   public function setCouleur(string $couleur) {
      $this->couleur = $couleur; // Définit la couleur
   }

   // Getter pour le nombre de sièges
   public function getNbSieges(): int {
      return $this->nbSieges; // Retourne le nombre de sièges
   }

   // Setter pour le nombre de sièges
   public function setNbSieges(int $nbSieges) {
      $this->nbSieges = $nbSieges; // Définit le nombre de sièges
   }

   // Getter pour l'immatriculation
   public function getImmatriculation(): string {
      return $this->immatriculation; // Retourne l'immatriculation
   }

   // Setter pour l'immatriculation
   public function setImmatriculation(string $immatriculation) {
      // Vérifie que l'immatriculation a une longueur de 7 caractères
      if (strlen($immatriculation) == 7) {
         $this->immatriculation = $immatriculation; // Définit l'immatriculation
      }
   }

   // Constructeur de la classe Voiture
   public function __construct(
      string $immatriculation,
      string $marque,
      string $couleur,
      int $nbSieges
   ) {
      $this->immatriculation = $immatriculation; // Initialise l'immatriculation
      $this->marque = $marque; // Initialise la marque
      $this->couleur = $couleur; // Initialise la couleur
      $this->nbSieges = $nbSieges; // Initialise le nombre de sièges
   }

   // Méthode pour convertir l'objet en chaîne de caractères
   public function __toString(): string {
      return "Voiture " . $this->marque . " immatriculee " . $this->immatriculation . " de couleur " . $this->couleur . " et comportant " . $this->nbSieges . " sieges."; // Retourne une description de la voiture
   }

   // Méthode pour formater les données de l'objet en tableau
   public function formatTableau(): array {
      return [
         "immatriculation" => $this->immatriculation, // Immatriculation
         "marque" => $this->marque, // Marque
         "couleur" => $this->couleur, // Couleur
         "nbSieges" => $this->nbSieges // Nombre de sièges
      ];
   }
}
?>
