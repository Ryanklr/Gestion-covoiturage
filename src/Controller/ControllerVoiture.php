<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\VoitureRepository;
use App\Covoiturage\Lib\MessageFlash;
class ControllerVoiture extends GenericController {
    // Fonction pour lire toutes les voitures
    public static function readAll() : void {
        $voitures = (new VoitureRepository())->selectAll(); // Récupère toutes les voitures de la base de données
        $pagetitle = "Liste des voitures"; // Titre de la page
        $cheminVueBody = "voiture/list.php"; // Chemin vers la vue
        self::afficheVue('view.php', [ // Affiche la vue avec les paramètres
            'voitures' => $voitures,
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }

    // Fonction pour lire une voiture spécifique
    public static function read() : void {
        $immat = $_GET['immat']; // Récupère l'immatriculation de la voiture depuis l'URL
        $voiture = (new VoitureRepository())->select($immat); // Récupère la voiture par son immatriculation
        if ($voiture !== null) {
            $pagetitle = "Détails de la voiture"; // Titre de la page
            $cheminVueBody = "voiture/detail.php"; // Chemin vers la vue
            self::afficheVue('view.php', [ // Affiche la vue avec les paramètres
                'voiture' => $voiture,
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        } else {
            $pagetitle = "Erreur - Voiture introuvable"; // Titre de la page d'erreur
            $cheminVueBody = "voiture/error.php"; // Chemin vers la vue d'erreur
            self::afficheVue('view.php', [ // Affiche la vue d'erreur
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        }
    }


    // Fonction pour afficher le formulaire de création d'une voiture
    public static function create(): void {
        $pagetitle = "Formulaire : créer une voiture"; // Titre de la page
        $cheminVueBody = "voiture/create.php"; // Chemin vers la vue de création
        self::afficheVue('view.php', [ // Affiche la vue avec les paramètres
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }

    // Fonction pour traiter la création d'une voiture
    public static function created(): void {
        $immat = $_GET['immatriculation']; // Récupère l'immatriculation
        $marque = $_GET['marque']; // Récupère la marque
        $couleur = $_GET['couleur']; // Récupère la couleur
        $nbSieges = $_GET['nbSieges']; // Récupère le nombre de sièges

        $voiture = new Voiture($immat, $marque, $couleur, $nbSieges); // Crée un nouvel objet Voiture

        VoitureRepository::sauvegarder($voiture); // Sauvegarde la voiture dans la base de données

        MessageFlash::ajouter("success", "La voiture a bien été créée !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }

    // Fonction pour afficher une page d'erreur
    public static function error(string $errorMessage = ""): void {
        $pagetitle = "Erreur"; // Titre de la page d'erreur
        $cheminVueBody = "voiture/error.php"; // Chemin vers la vue d'erreur
        self::afficheVue('view.php', [ // Affiche la vue d'erreur
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
        ]);
    }

    // Fonction pour supprimer une voiture
    public static function delete(): void {
        $immatriculation = $_GET['immatriculation'] ?? null; // Récupère l'immatriculation depuis l'URL

        if ($immatriculation === null) { // Vérifie si l'immatriculation est fournie
            MessageFlash::ajouter("danger", "Immatriculation non fournie !");
            self::rediriger("frontController.php?controller=voiture&action=readAll");
            return; // Sort de la fonction
        }

        (new VoitureRepository())->delete($immatriculation); // Supprime la voiture de la base de données

        MessageFlash::ajouter("success", "La voiture a bien été supprimée !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }

    // Fonction pour afficher le formulaire de mise à jour d'une voiture
    public static function update(): void {
        $immatriculation = $_GET['immatriculation'] ?? null; // Récupère l'immatriculation depuis l'URL

        if ($immatriculation === null) { // Vérifie si l'immatriculation est fournie
            $pagetitle = "Erreur"; // Titre de la page d'erreur
            $cheminVueBody = "voiture/error.php"; // Chemin vers la vue d'erreur
            self::afficheVue('view.php', [ // Affiche la vue d'erreur
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
            ]);
            return; // Sort de la fonction
        }

        $voiture = (new VoitureRepository())->select($immatriculation); // Récupère la voiture par son immatriculation

        if ($voiture === null) { // Vérifie si la voiture existe
            $pagetitle = "Erreur"; // Titre de la page d'erreur
            $cheminVueBody = "voiture/error.php"; // Chemin vers la vue d'erreur
            self::afficheVue('view.php', [ // Affiche la vue d'erreur
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
                'message' => "Aucune voiture trouvée pour l'immatriculation $immatriculation." // Message d'erreur
            ]);
            return; // Sort de la fonction
        }

        $pagetitle = "Mettre à jour une voiture"; // Titre de la page de mise à jour
        $cheminVueBody = "voiture/update.php"; // Chemin vers la vue de mise à jour
        self::afficheVue('view.php', [ // Affiche la vue avec les paramètres
            'pagetitle' => $pagetitle,
            'immatriculation' => $immatriculation,
            'cheminVueBody' => $cheminVueBody,
            'voiture' => $voiture
        ]);
    }

    // Fonction pour traiter la mise à jour d'une voiture
    public static function updated(): void {
        $immat = $_GET['immatriculation']; // Récupère l'immatriculation
        $marque = $_GET['marque']; // Récupère la marque
        $couleur = $_GET['couleur']; // Récupère la couleur
        $nbSieges = $_GET['nbSieges']; // Récupère le nombre de sièges

        $voiture = new Voiture($immat, $marque, $couleur, $nbSieges); // Crée un nouvel objet Voiture

        (new VoitureRepository())->update($voiture); // Met à jour la voiture dans la base de données

        MessageFlash::ajouter("success", "La voiture a bien été modifiée !");
        self::rediriger("frontController.php?controller=voiture&action=readAll");
    }
}
?>
