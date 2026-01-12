<?php
 $immat = isset($voiture) ? $voiture->getImmatriculation() : '';
 ?>
 <h2>Succès</h2>
    <p>La voiture <?php echo htmlspecialchars($immat); ?> a bien été créée !</p>
    <a href="../web/frontController.php?action=readAll">Retour à la liste des voitures</a>
