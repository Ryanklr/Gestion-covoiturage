<?php // Ouvre le tag PHP

namespace App\Covoiturage\Model\HTTP; // Déclare l'espace de noms du fichier

class Cookie { // Déclaration de la classe Cookie

    public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null): void { // Méthode statique pour enregistrer un cookie : $cle nom, $valeur valeur, $dureeExpiration en secondes ou null
        $valeur = serialize($valeur); // Sérialise la valeur pour pouvoir stocker n'importe quel type dans le cookie

        if (is_null($dureeExpiration)) { // Si aucune durée d'expiration n'est fournie (cookie de session)
            setcookie($cle, $valeur, 0); // Crée un cookie de session (expire à la fermeture du navigateur)
        } else { // Si une durée est fournie
            setcookie($cle, $valeur, time() + $dureeExpiration); // Crée un cookie avec une date d'expiration (maintenant + durée)
        }
    }

    public static function lire(string $cle): mixed { // Méthode statique pour lire et retourner la valeur d'un cookie (désérialisée) ou null
        if (!self::contient($cle)) return null; // Si le cookie n'existe pas, retourne null

        return unserialize($_COOKIE[$cle]); // Désérialise et renvoie la valeur stockée dans $_COOKIE
    }

    public static function contient($cle): bool { // Vérifie si une clé de cookie est présente
        return isset($_COOKIE[$cle]); // Renvoie true si la clé existe dans le tableau superglobal $_COOKIE
    }

    public static function supprimer($cle): void { // Supprime le cookie côté script et demande au navigateur de le supprimer
        unset($_COOKIE[$cle]); // Supprime la clé du tableau $_COOKIE dans le script courant
        setcookie($cle, "", 1); // Définit le cookie avec une date d'expiration passée pour forcer sa suppression côté client
    }
}
