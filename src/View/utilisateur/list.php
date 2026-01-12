<h1>Liste des utilisateurs</h1>
<?php
// Parcourt chaque utilisateur dans le tableau $utilisateurs
foreach ($utilisateurs as $utilisateur) {
    // Échappe le prénom de l'utilisateur pour éviter les attaques XSS
    $prenomHTML = htmlspecialchars($utilisateur->getPrenom());
    // Encode le login de l'utilisateur pour l'utiliser dans l'URL
    $loginURL  = rawurlencode($utilisateur->getLogin());

    // Affiche le prénom de l'utilisateur avec des liens pour lire, supprimer et modifier
    echo '<p>Utilisateur ' . $loginURL . ':'.'
          <a href="../web/frontController.php?action=read&controller=utilisateur&login=' . $loginURL . '">' . "details" .  '</a>
          -- <a href="../web/frontController.php?action=delete&controller=utilisateur&login=' . $loginURL . '">
          Supprimer</a>
          -- <a href="../web/frontController.php?action=update&controller=utilisateur&login=' . $loginURL . '">
          Modifier</a>
          </p>';
}

// Affiche un lien pour créer un nouvel utilisateur
echo '<p><a href="../web/frontController.php?action=create&controller=utilisateur">Créer un utilisateur</a></p>';

?>
