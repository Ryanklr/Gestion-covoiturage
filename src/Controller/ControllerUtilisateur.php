<?php
namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository;
use App\Covoiturage\Lib\MessageFlash;

class ControllerUtilisateur extends GenericController {
    // Affiche la liste de tous les utilisateurs
    public static function readAll() : void {
        // Récupère tous les utilisateurs via le repository
        $utilisateurs = (new UtilisateurRepository())->selectAll();
        $pagetitle = "Liste des utilisateurs";
        $cheminVueBody = "utilisateur/list.php";
        // Appel à la vue principale en fournissant les paramètres
        self::afficheVue('view.php', [
            'utilisateurs' => $utilisateurs,
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }

    // Affiche les détails d'un utilisateur donné (paramètre login en GET)
    public static function read() : void {
        $login = $_GET['login'];
        $utilisateur = (new UtilisateurRepository())->select($login);
        if ($utilisateur !== null) {
            $pagetitle = "Détails de l'utilisateur";
            $cheminVueBody = "utilisateur/detail.php";
            self::afficheVue('view.php', [
                'utilisateur' => $utilisateur,
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        } else {
            // Si l'utilisateur est introuvable, afficher une page d'erreur
            $pagetitle = "Erreur - Utilisateur introuvable";
            $cheminVueBody = "utilisateur/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody
            ]);
        }
    }


    // Supprime un utilisateur (login en GET)
    public static function delete(): void {
        $login = $_GET['login'] ?? null;

        if ($login === null) {
            MessageFlash::ajouter("danger", "Login non fourni !");
            self::rediriger("frontController.php?controller=utilisateur&action=readAll");
            return;
        }

        (new UtilisateurRepository())->delete($login);

        MessageFlash::ajouter("success", "L'utilisateur a bien été supprimé !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }

    // Affiche le formulaire de mise à jour pour un utilisateur donné
    public static function update(): void {
        $login = $_GET['login'] ?? null;

        if ($login === null) {
            $pagetitle = "Erreur";
            $cheminVueBody = "utilisateur/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
            ]);
            return;
        }

        $utilisateur = (new UtilisateurRepository())->select($login);

        if ($utilisateur === null) {
            // Aucun utilisateur trouvé pour ce login
            $pagetitle = "Erreur";
            $cheminVueBody = "utilisateur/error.php";
            self::afficheVue('view.php', [
                'pagetitle' => $pagetitle,
                'cheminVueBody' => $cheminVueBody,
                'message' => "Aucun utilisateur trouvé pour le login $login."
            ]);
            return;
        }

        $pagetitle = "Mettre à jour un utilisateur";
        $cheminVueBody = "utilisateur/update.php";
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'login' => $login,
            'cheminVueBody' => $cheminVueBody,
            'utilisateur' => $utilisateur
        ]);
    }

    // Traite la soumission du formulaire de mise à jour (données en GET ici)
    public static function updated(): void {
        $login = $_GET['login'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];

        $utilisateur = new Utilisateur($login, $nom, $prenom);
        UtilisateurRepository::ModifierUtilisateur($utilisateur);

        MessageFlash::ajouter("success", "L'utilisateur a bien été modifié !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }

    // Affiche le formulaire de création d'un utilisateur
    public static function create(): void {
        $pagetitle = "Formulaire : créer un utilisateur";
        $cheminVueBody = "utilisateur/create.php";
        self::afficheVue('view.php', [
            'pagetitle' => $pagetitle,
            'cheminVueBody' => $cheminVueBody
        ]);
    }

    // Traite la création d'un utilisateur (données en GET ici)
    public static function created(): void {
        $login = $_GET['login'];
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];

        $utilisateur = new Utilisateur($login, $nom, $prenom);
        UtilisateurRepository::sauvegarder($utilisateur);

        MessageFlash::ajouter("success", "L'utilisateur a bien été créé !");
        self::rediriger("frontController.php?controller=utilisateur&action=readAll");
    }
}
?>
