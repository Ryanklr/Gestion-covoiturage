<?php
namespace App\Covoiturage\Config;

class Conf {
    // Déclaration d'un tableau statique privé contenant les informations de connexion à la base de données
    static private array $databases = array(
        // Le nom d'hôte est localhost sur votre machine
        'hostname' => 'localhost',
        // Sur votre machine, vous devrez créer une BDD
        'database' => 'td2',
        // Sur votre machine, vous avez sûrement un compte 'root'
        'login' => 'root',
        // Sur votre machine, vous avez créé ou non ce mot de passe à l'installation
        'password' => ''
    );

    // Méthode pour obtenir le login de la base de données
    static public function getLogin() : string {
        return static::$databases['login'];
    }

    // Méthode pour obtenir le mot de passe de la base de données
    static public function getPassword() : string {
        return static::$databases['password'];
    }

    // Méthode pour obtenir le nom de la base de données
    static public function getDatabase() : string {
        return static::$databases['database'];
    }

    // Méthode pour obtenir le nom d'hôte de la base de données
    static public function getHostname() : string {
        return static::$databases['hostname'];
    }
}
?>
