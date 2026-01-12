<?php
namespace App\Covoiturage\Model\Repository;
 
use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\Repository\DatabaseConnection;
 
class TrajetRepository extends AbstractRepository{
 
protected function construire(array $trajetFormatTableau): Trajet {
    return new Trajet(
        $trajetFormatTableau["id"],
        $trajetFormatTableau["depart"],
        $trajetFormatTableau["arrivee"],
        $trajetFormatTableau["date"],
        $trajetFormatTableau["nbPlaces"],
        $trajetFormatTableau["prix"],
        $trajetFormatTableau["conducteurLogin"]
    );
}
    protected function getNomTable(): string {
    return "trajet";
    }
 
    protected function getNomClePrimaire(): string {
    return "id";
}
 
 
   public static function sauvegarder(Trajet $trajet) : void {
      $sql = "INSERT INTO trajet (id, depart, arrivee, date, nbPlaces, prix, conducteurLogin)
      VALUES (:idTag, :departTag, :arriveeTag, :dateTag, :nbPlacesTag, :prixTag, :conducteurLoginTag)";
 
      $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
      $values = array(
        "idTag" => $trajet->getId(),
        "departTag" => $trajet->getDepart(),
        "arriveeTag" => $trajet->getArrivee(),
        "dateTag" => $trajet->getDate(),
        "nbPlacesTag" => $trajet->getNbPlaces(),
        "prixTag" => $trajet->getPrix(),
        "conducteurLoginTag" => $trajet->getConducteurLogin()
      );
 
      $pdoStatement->execute($values);
     
   }
 
   protected function getNomsColonnes(): array {
    return ["id", "depart", "arrivee", "date", "nbPlaces", "prix", "conducteurLogin"];
}
}
?>
