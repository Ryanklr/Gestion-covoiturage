<?php
$prenom = isset($utilisateur) ? $utilisateur->getPrenom() : '';
?>
<h2>Succès</h2>
<p>L'utilisateur <?php echo htmlspecialchars($prenom); ?> a bien été modifié !</p>
<a href="../web/frontController.php?action=readAll&controller=utilisateur">Retour à la liste des utilisateurs</a>
