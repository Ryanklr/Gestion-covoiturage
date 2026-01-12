<?php
// Vérifie si l'objet $utilisateur est défini et récupère le prénom
$prenom = isset($utilisateur) ? $utilisateur->getPrenom() : '';
?>
<h2>Succès</h2>
<!-- Affiche un message de succès avec le prénom de l'utilisateur -->
<p>L'utilisateur <?php echo htmlspecialchars($prenom); ?> a bien été créé !</p>
<!-- Lien pour retourner à la liste des utilisateurs -->
<a href="../web/frontController.php?action=readAll&controller=utilisateur">Retour à la liste des utilisateurs</a>
