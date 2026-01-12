<?php
// Déclaration de l'espace de noms
namespace App\Covoiturage\Model\HTTP;

// Importation de la classe Exception
use Exception;

// Définition de la classe Session utilisant le pattern Singleton
class Session
{
    // Variable statique pour stocker l'instance unique de la classe
    private static ?Session $instance = null;

    /**
     * @throws Exception
     */
    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct()
    {
        // Vérifier si aucune session n'est active
        if (session_status() === PHP_SESSION_NONE) {
            // Démarrer la session
            if (session_start() === false) {
                // Lever une exception si le démarrage échoue
                throw new Exception("La session n'a pas réussi à démarrer.");
            }
        }
    }

    // Méthode statique pour obtenir l'instance unique de Session
    public static function getInstance(): Session
    {
        // Vérifier si l'instance n'existe pas encore
        if (is_null(static::$instance)) {
            // Créer une nouvelle instance
            static::$instance = new Session();
        }
        // Retourner l'instance
        return static::$instance;
    }

    // Vérifier si une variable de session existe
    public function contient($name): bool
    {
        return isset($_SESSION[$name]);
    }

    // Enregistrer une valeur dans la session
    public function enregistrer(string $name, mixed $value): void
    {
        $_SESSION[$name] = $value;
    }

    // Lire une valeur de la session
    public function lire(string $name): mixed
    {
        // Vérifier si la variable existe
        if (!$this->contient($name)) {
            // Retourner null si elle n'existe pas
            return null;
        }
        // Retourner la valeur de la session
        return $_SESSION[$name];
    }

    // Supprimer une variable de la session
    public function supprimer($name): void
    {
        // Vérifier si la variable existe
        if ($this->contient($name)) {
            // Supprimer la variable
            unset($_SESSION[$name]);
        }
    }

    // Détruire complètement la session
    public function detruire(): void
    {
        // Vider toutes les variables de session
        session_unset();
        // Détruire la session
        session_destroy();
        // Supprimer le cookie de session
        Cookie::supprimer(session_name());
        // Réinitialiser l'instance à null
        static::$instance = null;
    }
}
