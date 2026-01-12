<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;
use App\Covoiturage\Model\Repository\DatabaseConnection;
use PDO;

abstract class AbstractRepository {

   /** * @return AbstractDataObject[] */ 
   public function selectAll(): array {
   
      $pdo = DatabaseConnection::getPdo(); // Récupère l'instance PDO pour la connexion à la base de données
      $sql = "SELECT * FROM " . $this->getNomTable(); // Prépare la requête SQL pour sélectionner toutes les entrées de la table
      $pdoStatement = $pdo->query($sql); // Exécute la requête SQL

      $tab = []; // Initialise un tableau pour stocker les résultats
      
      foreach ($pdoStatement as $FormatTableau) { // Parcourt chaque ligne de résultats
         $tab[] = $this->construire($FormatTableau); // Construit un objet à partir de chaque ligne et l'ajoute au tableau
      }
      return $tab; // Retourne le tableau d'objets
   }

   abstract protected function getNomTable(): string; // Méthode abstraite pour obtenir le nom de la table
   abstract protected function construire(array $objetFormatTableau): AbstractDataObject; // Méthode abstraite pour construire un objet à partir d'un tableau

   public function select(string $valeurClePrimaire): ?AbstractDataObject {
      $sql = "SELECT * from " . $this->getNomTable() . 
            " WHERE " . $this->getNomClePrimaire() . " = :valeurCleTag"; // Prépare la requête SQL pour sélectionner une entrée par clé primaire

      $pdoStatement = DatabaseConnection::getPdo()->prepare($sql); // Prépare la requête
      $values = array(
         "valeurCleTag" => $valeurClePrimaire, // Définit la valeur de la clé primaire
      );
      $pdoStatement->execute($values); // Exécute la requête avec les valeurs
      $objetFormatTableau = $pdoStatement->fetch(PDO::FETCH_ASSOC); // Récupère le résultat sous forme de tableau associatif
      if ($objetFormatTableau === false) {
         return null; // Retourne null si aucun résultat n'est trouvé
      } else {
         return $this->construire($objetFormatTableau); // Retourne l'objet construit à partir du tableau
      } 
   }

   protected abstract function getNomClePrimaire(): string; // Méthode abstraite pour obtenir le nom de la clé primaire

   public function delete($valeurClePrimaire) : void {
      $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClePrimaire() . " = :valeurTag"; // Prépare la requête SQL pour supprimer une entrée par clé primaire
      $pdoStatement = DatabaseConnection::getPdo()->prepare($sql); // Prépare la requête
      $values = array(
         "valeurTag" => $valeurClePrimaire, // Définit la valeur de la clé primaire pour la suppression
      );
      $pdoStatement->execute($values); // Exécute la requête
   }

   protected abstract function getNomsColonnes(): array; // Méthode abstraite pour obtenir les noms des colonnes

   public function update(AbstractDataObject $object): void {
      $colonnes = $this->getNomsColonnes(); // Récupère les noms des colonnes
      $clePrimaire = $this->getNomClePrimaire(); // Récupère le nom de la clé primaire

      $setParts = []; // Initialise un tableau pour les parties de la requête SET
      foreach ($colonnes as $colonne) {
         if ($colonne !== $clePrimaire) {
            $setParts[] = "$colonne = :$colonne"; // Ajoute chaque colonne à la requête SET, sauf la clé primaire
         }
      }
      $sql = "UPDATE " . $this->getNomTable() . " 
            SET " . implode(", ", $setParts) . " 
            WHERE $clePrimaire = :$clePrimaire"; // Prépare la requête SQL pour mettre à jour une entrée
      $pdo = DatabaseConnection::getPdo(); // Récupère l'instance PDO
      $pdoStatement = $pdo->prepare($sql); // Prépare la requête
      $pdoStatement->execute($object->formatTableau()); // Exécute la requête avec les données de l'objet
   }
}

?>
