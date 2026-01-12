<h1>Liste des trajets</h1>
<?php
foreach ($trajets as $trajet) {
    $idHTML = htmlspecialchars($trajet->getId());
    $idURL  = rawurlencode($trajet->getId());

    echo '<p>Trajet ' . $idURL . ':'. '
          <a href="../web/frontController.php?action=read&controller=trajet&id=' . $idURL . '">' . "details" . '</a>
          -- <a href="../web/frontController.php?action=delete&controller=trajet&id=' . $idURL . '">
          Supprimer trajet</a>
          -- <a href="../web/frontController.php?action=update&controller=trajet&id=' . $idURL . '">
          Modifier trajet</a>
          </p>';
}
echo '<p><a href="../web/frontController.php?action=create&controller=trajet">Créer un trajet</a></p>';
?>
