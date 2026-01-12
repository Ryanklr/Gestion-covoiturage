<?php
namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository {
    
    // Convertit un tableau en objet Utilisateur
    protected function construire(array $UtilisateurFormatTableau): Utilisateur {
        return new Utilisateur(
            $UtilisateurFormatTableau["login"],
            $UtilisateurFormatTableau["nom"],
            $UtilisateurFormatTableau["prenom"]        
        );
    }
 
    // Retourne le nom de la table
    protected function getNomTable(): string {
        return "utilisateur";
    }

    // Retourne le nom de la clé primaire
    protected function getNomClePrimaire(): string {
        return "login";
    }

    // Sauvegarde un nouvel utilisateur dans la base de données
    public static function sauvegarder(Utilisateur $utilisateur) : void {
        $sql = "INSERT IGNORE INTO utilisateur (login, nom, prenom) 
        VALUES (:loginTag, :nomTag, :prenomTag)";

        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "loginTag" => $utilisateur->getLogin(),
            "nomTag" => $utilisateur->getNom(),
            "prenomTag" => $utilisateur->getPrenom(),
        );

        $pdoStatement->execute($values);
    }

    // Modifie les informations d'un utilisateur existant
    public static function ModifierUtilisateur(Utilisateur $utilisateur): void {
        $sql = "UPDATE utilisateur
                SET nom = :nom, prenom = :prenom
                WHERE login = :login";
        
        $pdo = DatabaseConnection::getPdo();
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute([
            'login' => $utilisateur->getLogin(),
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
        ]);
    }

    // Retourne les noms des colonnes de la table
    protected function getNomsColonnes(): array {
        return ["login", "nom", "prenom"];
    }
}
