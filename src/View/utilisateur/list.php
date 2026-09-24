<h1>Liste des utilisateurs</h1>
<div class="data-panel">
    <table class="data-table">
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($utilisateurs as $utilisateur) {
                $prenomHTML = htmlspecialchars($utilisateur->getPrenom());
                $loginHTML = htmlspecialchars($utilisateur->getLogin());
                $loginURL  = rawurlencode($utilisateur->getLogin());

                echo '<tr>
                        <td>' . $loginHTML . '</td>
                        <td>' . $prenomHTML . '</td>
                        <td class="table-actions">
                            <a href="../web/frontController.php?action=read&controller=utilisateur&login=' . $loginURL . '" class="action-link">Détails</a>
                            <a href="../web/frontController.php?action=delete&controller=utilisateur&login=' . $loginURL . '" class="action-link danger">Supprimer</a>
                            <a href="../web/frontController.php?action=update&controller=utilisateur&login=' . $loginURL . '" class="action-link warning">Modifier</a>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<a href="../web/frontController.php?action=create&controller=utilisateur" class="btn-primary">Créer un utilisateur</a>
