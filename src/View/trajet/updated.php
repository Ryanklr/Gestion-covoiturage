<?php
$id = isset($trajet) ? $trajet->getId() : '';
?>
<h2>Succès</h2>
<p>Le trajet n°<?php echo htmlspecialchars($id); ?> a bien été modifié !</p>
<a href="../web/frontController.php?action=readAll&controller=trajet">Retour à la liste des trajets</a>
