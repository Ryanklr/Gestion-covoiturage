<?php
  $marqueHTML = htmlspecialchars($voiture->getMarque(), ENT_QUOTES, 'UTF-8');
  $immatHTML  = htmlspecialchars($voiture->getImmatriculation(), ENT_QUOTES, 'UTF-8');
  $couleurHTML= htmlspecialchars($voiture->getCouleur(), ENT_QUOTES, 'UTF-8');
  $nbSiegesHTML = htmlspecialchars((string)$voiture->getNbSieges(), ENT_QUOTES, 'UTF-8');
  ?>
   <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $loginHTML ?></title>
</head>
<body>

    <h1>Détails de la voiture <?= $immatHTML ?></h1>

    <p>
        Voici les informations de la voiture :<br>
        <strong>Marque :</strong> <?= $marqueHTML ?><br>
        <strong>Immatriculation :</strong> <?= $immatHTML ?><br>
        <strong>Couleur :</strong> <?= $couleurHTML ?><br>
        <strong>Nombre de sièges :</strong> <?= $nbSiegesHTML ?>
    </p>
            <a href="../web/frontController.php?action=delete&controller=voiture&immatriculation=<?= $immatHTML ?>">
          Supprimer voiture</a>
          -- <a href="../web/frontController.php?action=update&controller=voiture&immatriculation=<?= $immatHTML ?>">
          Modifier voiture</a>
          <p><a href="../web/frontController.php?controller=voiture&action=readAll">Retour à la liste</a></p>


</body>
</html>
