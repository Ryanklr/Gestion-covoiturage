<h1>Liste des trajets</h1>
<div class="data-panel">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($trajets as $trajet) {
                $idHTML = htmlspecialchars($trajet->getId());
                $idURL  = rawurlencode($trajet->getId());

                echo '<tr>
                        <td>' . $idHTML . '</td>
                        <td class="table-actions">
                            <a href="../web/frontController.php?action=read&controller=trajet&id=' . $idURL . '" class="action-link">Détails</a>
                            <a href="../web/frontController.php?action=delete&controller=trajet&id=' . $idURL . '" class="action-link danger">Supprimer</a>
                            <a href="../web/frontController.php?action=update&controller=trajet&id=' . $idURL . '" class="action-link warning">Modifier</a>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<a href="../web/frontController.php?action=create&controller=trajet" class="btn-primary">Créer un trajet</a>
