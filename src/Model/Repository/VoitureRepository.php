<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\DatabaseConnection;
use PDO;

class VoitureRepository extends AbstractRepository {

    // Crée une instance de Voiture à partir d'un tableau de données
    protected function construire(array $voitureFormatTableau): Voiture {
        return new Voiture(
            $voitureFormatTableau["immatriculation"],
            $voitureFormatTableau["marque"],
            $voitureFormatTableau["couleur"],
            $voitureFormatTableau["nbSieges"]
        );
    }

    // Retourne le nom de la table dans la base de données
    protected function getNomTable(): string {
        return "voiture";
    }

    // Retourne le nom de la clé primaire de la table
    protected function getNomClePrimaire(): string {
        return "immatriculation";
    }

    // Sauvegarde une instance de Voiture dans la base de données
    public static function sauvegarder(Voiture $voiture) : void {
        $sql = "INSERT IGNORE INTO voiture (immatriculation, marque, couleur, nbSieges) 
        VALUES (:immatriculationTag, :marqueTag, :couleurTag, :nbSiegesTag)";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "immatriculationTag" => $voiture->getImmatriculation(),
            "marqueTag" => $voiture->getMarque(),
            "couleurTag" => $voiture->getCouleur(),
            "nbSiegesTag" => $voiture->getNbSieges(),
        );

        $pdoStatement->execute($values);
    }

    // Retourne les noms des colonnes de la table
    protected function getNomsColonnes(): array {
        return ["immatriculation", "marque", "couleur", "nbSieges"];
    }
}
?>
