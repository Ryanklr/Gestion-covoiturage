<?php
session_start();

use App\Covoiturage\Lib\Psr4AutoloaderClass;
use App\Covoiturage\Lib\PreferenceControleur;

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass();
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src');
$loader->register();

// Récupération des paramètres action / contrôleur
$action = $_GET['action'] ?? 'readAll';

// Le paramètre URL a la priorité, la préférence est utilisée en fallback
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} elseif (PreferenceControleur::existe()) {
    $controller = PreferenceControleur::lire();
} else {
    $controller = 'voiture';
}

$controllerClassName = "App\\Covoiturage\\Controller\\Controller" . ucfirst($controller);

if (class_exists($controllerClassName)) {
    if (method_exists($controllerClassName, $action)) {
        $controllerClassName::$action();
    } else {
        $controllerClassName::error("Action inconnue : $action");
    }
} else {
    echo "Erreur critique : le contrôleur '$controllerClassName' n'existe pas.";
}
