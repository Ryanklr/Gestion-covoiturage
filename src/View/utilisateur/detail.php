<?php
  // 1. Préparation des données
  // On échappe les données AVANT de commencer à générer le HTML pour garder le code propre.
  $loginHTML  = htmlspecialchars($utilisateur->getLogin(), ENT_QUOTES, 'UTF-8');
  $prenomHTML = htmlspecialchars($utilisateur->getPrenom(), ENT_QUOTES, 'UTF-8');
  $nomHTML    = htmlspecialchars($utilisateur->getNom(), ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $loginHTML ?></title>
</head>
<body>

    <h1>Détails de l'utilisateur <?= $loginHTML ?></h1>

    <p>
        Voici les informations du compte :<br>
        <strong>Nom complet :</strong> <?= $prenomHTML ?> <?= $nomHTML ?><br>
        <strong>Login :</strong> <?= $loginHTML ?>
    </p>
            <a href="../web/frontController.php?action=delete&controller=utilisateur&login=<?= $loginHTML ?>">
          Supprimer utilisateur</a>
          -- <a href="../web/frontController.php?action=update&controller=utilisateur&login=<?= $loginHTML ?>">
          Modifier utilisateur</a>
          <p><a href="../web/frontController.php?controller=utilisateur&action=readAll">Retour à la liste</a></p>

</body>
</html>
