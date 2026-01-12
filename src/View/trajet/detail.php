<?php
$idHTML = htmlspecialchars($trajet->getId(), ENT_QUOTES, 'UTF-8');
$departHTML = htmlspecialchars($trajet->getDepart(), ENT_QUOTES, 'UTF-8');
$arriveeHTML = htmlspecialchars($trajet->getArrivee(), ENT_QUOTES, 'UTF-8');
$dateHTML = htmlspecialchars(date("d-m-Y", strtotime($trajet->getDate())), ENT_QUOTES, 'UTF-8');
$nbPlacesHTML = htmlspecialchars($trajet->getNbPlaces(), ENT_QUOTES, 'UTF-8');
$prixHTML = htmlspecialchars($trajet->getPrix(), ENT_QUOTES, 'UTF-8');
$conducteurLoginHTML = htmlspecialchars($trajet->getConducteurLogin(), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $loginHTML ?></title>
</head>
<body>

    <h1>Détails du trajet <?= $idHTML ?></h1>

    <p>
        Voici les informations du trajet :<br>
        <strong>Départ :</strong> <?= $departHTML ?><br>
        <strong>Arrivée :</strong> <?= $arriveeHTML ?><br>
        <strong>Date :</strong> <?= $dateHTML ?><br>
        <strong>Nombre de places :</strong> <?= $nbPlacesHTML ?><br>
        <strong>Prix :</strong> <?= $prixHTML ?> €<br>
        <strong>Conducteur :</strong> <?= $conducteurLoginHTML ?>
    </p>
          <a href="../web/frontController.php?action=delete&controller=trajet&id=<?= $idHTML ?>">
          Supprimer trajet</a>
          -- <a href="../web/frontController.php?action=update&controller=trajet&id=<?= $idHTML ?>">
          Modifier trajet</a>
          <p><a href="../web/frontController.php?controller=trajet&action=readAll">Retour à la liste</a></p>

</body>
</html>
