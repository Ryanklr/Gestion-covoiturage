<?php
namespace App\Covoiturage\Controller;
 
use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\Repository\TrajetRepository;
use App\Covoiturage\Lib\MessageFlash;

class ControllerTrajet extends GenericController {
    // Liste de tous les trajets
    public static function readAll(): void {
        $trajets = (new TrajetRepository())->selectAll();
        $pagetitle = "Liste des trajets";
        $cheminVueBody = "trajet/list.php";
        self::afficheVue('view.php', [
            'trajets' => $trajets,
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }
 
    // Lecture d'un trajet
    public static function read(): void {
        $id = $_GET['id'];
        $trajet = (new TrajetRepository())->select($id);
        if ($trajet !== null) {
            $pagetitle = "Détails du trajet";
            $cheminVueBody = "trajet/detail.php";
            self::afficheVue('view.php', [
                'trajet' => $trajet,
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        } else {
            $pagetitle = "Erreur - Trajet introuvable";
            $cheminVueBody = "trajet/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        }
    }
 
 
    // Formulaire de création
    public static function create(): void {
        $pagetitle = "Formulaire : créer un trajet";
        $cheminVueBody = "trajet/create.php";
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }
 
    // Création effectuée
    public static function created(): void {
        $id = $_GET['id'];
        $depart = $_GET['depart'];
        $arrivee = $_GET['arrivee'];
        $date = $_GET['date'];
        $nbPlaces = $_GET['nbPlaces'];
        $prix = $_GET['prix'];
        $conducteurLogin = $_GET['conducteurLogin'];

        $trajet = new Trajet($id, $depart, $arrivee, $date, $nbPlaces, $prix, $conducteurLogin);
        TrajetRepository::sauvegarder($trajet);

        MessageFlash::ajouter("success", "Le trajet a bien été créé !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }
 
    // Page d'erreur
    public static function error(string $errorMessage = ""): void {
        $pagetitle = "Erreur";
        $cheminVueBody = "trajet/error.php";
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody,
        ]);
    }
 
    // Suppression
    public static function delete(): void {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            MessageFlash::ajouter("danger", "ID du trajet non fourni !");
            self::rediriger("frontController.php?controller=trajet&action=readAll");
            return;
        }

        (new TrajetRepository())->delete($id);

        MessageFlash::ajouter("success", "Le trajet a bien été supprimé !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }
 
    // Formulaire de mise à jour
    public static function update(): void {
        $id = $_GET['id'] ?? null;
 
        if ($id === null) {
            $pagetitle = "Erreur";
            $cheminVueBody = "trajet/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
            ]);
            return;
        }
 
        $trajet = (new TrajetRepository())->select($id);
 
        if ($trajet === null) {
            $pagetitle = "Erreur";
            $cheminVueBody = "trajet/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
                'message' => "Aucun trajet trouvé pour l'identifiant $id."
            ]);
            return;
        }
 
        $pagetitle = "Mettre à jour un trajet";
        $cheminVueBody = "trajet/update.php";
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'id' => $id,
            'cheminVueBody' => $cheminVueBody,
            'trajet' => $trajet
        ]);
    }
 
    // Mise à jour effectuée
    public static function updated(): void {
        $id = $_GET['id'];
        $depart = $_GET['depart'];
        $arrivee = $_GET['arrivee'];
        $date = $_GET['date'];
        $nbPlaces = $_GET['nbPlaces'];
        $prix = $_GET['prix'];
        $conducteurLogin = $_GET['conducteurLogin'];

        $trajet = new Trajet($id, $depart, $arrivee, $date, $nbPlaces, $prix, $conducteurLogin);
        (new TrajetRepository())->update($trajet);

        MessageFlash::ajouter("success", "Le trajet a bien été modifié !");
        self::rediriger("frontController.php?controller=trajet&action=readAll");
    }
}
?>
