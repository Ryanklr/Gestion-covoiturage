<h1>Liste des voitures</h1>
<?php
foreach ($voitures as $voiture) {

    $immatHTML = htmlspecialchars($voiture->getImmatriculation());
    $immatURL  = rawurlencode($voiture->getImmatriculation());

     echo '<p>Voiture d\'immatriculation ' . $immatHTML .':'. '
          <a href="../web/frontController.php?action=read&controller=voiture&immat=' . $immatURL . '">' . "détails" . '</a>
          -- <a href="../web/frontController.php?action=delete&controller=voiture&immatriculation=' . $immatURL . '">
               Supprimer</a>
          -- <a href="../web/frontController.php?action=update&controller=voiture&immatriculation=' . $immatURL . '">
               Modifier</a>

          </p>';

}
     echo '<p><a href="../web/frontController.php?action=create&controller=voiture">Créer une voiture</a></p>';
     ?>
