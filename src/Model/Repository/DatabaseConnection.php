<?php 
namespace App\Covoiturage\Model\Repository;
use App\Covoiturage\Config\Conf as Conf;
use PDO; 

class DatabaseConnection {   
    private static $instance = null; // Instance unique de la classe
    private $pdo; // Instance PDO pour la connexion à la base de données

    private function __construct()     
    {
        // Récupération des informations de connexion à partir de la configuration
        $hostname = Conf::getHostname();
        $databaseName = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        // Création de l'instance PDO avec les paramètres de connexion
        $this->pdo = new PDO("mysql:host=$hostname;dbname=$databaseName", $login, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        // Configuration du mode d'erreur PDO
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public static function getPdo() {
        // Retourne l'instance PDO
        return static::getInstance()->pdo;
    }

    private static function getInstance() {
        // Vérifie si l'instance existe déjà, sinon la crée
        if (is_null(static::$instance))
            static::$instance = new DatabaseConnection();
        return static::$instance;
    }
}
?>
