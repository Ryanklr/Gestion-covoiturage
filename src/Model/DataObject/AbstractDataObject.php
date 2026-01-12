<?php
namespace App\Covoiturage\Model\DataObject;

// Classe abstraite qui sert de modèle pour d'autres objets de données
abstract class AbstractDataObject {
    // Méthode abstraite qui doit être implémentée par les classes dérivées
    public abstract function formatTableau(): array;

    // Méthode magique qui retourne une représentation JSON de l'objet
    public function __toString(): string {
        // Encode le tableau formaté en JSON
        return json_encode($this->formatTableau());
    }
}
?>
