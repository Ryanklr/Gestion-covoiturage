<?php
    namespace App\Covoiturage\Model\DataObject;
 
class Trajet extends AbstractDataObject{
 private ?int $id;
 private string $depart;
 private string $arrivee;
 private string $date;
 private int $nbPlaces;
 private int $prix;
 private string $conducteurLogin;
 
 // un getter
 public function getId(): ?int {
 return $this->id;
 }
 // un setter
 public function setId(int $id) {
 $this->id = $id;
 }
 public function getDepart(): string {
    return $this->depart;
 }
 public function setDepart(string $depart) {
    $this->depart = $depart;
 }
 public function getArrivee(): string {
    return $this->arrivee;
 }
 public function setArrivee(string $arrivee) {
    $this->arrivee = $arrivee;
 }
 public function getDate(): string {
    return $this->date;
 }
 public function setDate(string $date) {
    $this->date = $date;
 }
 public function getNbPlaces(): int {
    return $this->nbPlaces;
 }
 public function setNbPlaces(int $nbPlaces) {
    $this->nbPlaces = $nbPlaces;
 }
 public function getPrix(): int {
    return $this->prix;
 }
 public function setPrix(int $prix) {
    $this->prix = $prix;
 }
 public function getConducteurLogin(): string {
    return $this->conducteurLogin;
 }
 public function setConducteurLogin(string $conducteurLogin) {
    $this->conducteurLogin = $conducteurLogin;
 }
 // un constructeur
 public function __construct(
 ?int $id,
 string $depart,
 string $arrivee,
 string $date,
 int $nbPlaces,
 int $prix,
 string $conducteurLogin
 ) {
 $this->id = $id;
 $this->depart = $depart;
 $this->arrivee = $arrivee;
 $this->date = $date;
 $this->nbPlaces = $nbPlaces;
 $this->prix = $prix;
 $this->conducteurLogin = $conducteurLogin;
 }
 
  public function formatTableau(): array {
        return [
            "id" => $this->id,
            "depart" => $this->depart,
            "arrivee" => $this->arrivee,
            "date" => $this->date,
            "nbPlaces" => $this->nbPlaces,
            "prix" => $this->prix,
            "conducteurLogin" => $this->conducteurLogin
        ];
    }
   
}
?>
