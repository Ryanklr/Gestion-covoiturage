<?php
$id = isset($trajet) ? $trajet->getId() : '';
?>
<h2>Succès</h2>
<p>Le trajet <?php echo htmlspecialchars($id); ?> a bien été créé !</p>
<a href="../web/frontController.php?action=readAll&controller=trajet">Retour à la liste des trajets</a>
