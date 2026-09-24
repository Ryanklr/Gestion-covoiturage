<h1>Liste des voitures</h1>
<div class="data-panel">
    <table class="data-table">
        <thead>
            <tr>
                <th>Immatriculation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($voitures as $voiture) {
                $immatHTML = htmlspecialchars($voiture->getImmatriculation());
                $immatURL  = rawurlencode($voiture->getImmatriculation());

                echo '<tr>
                        <td>' . $immatHTML . '</td>
                        <td class="table-actions">
                            <a href="../web/frontController.php?action=read&controller=voiture&immat=' . $immatURL . '" class="action-link">Détails</a>
                            <a href="../web/frontController.php?action=delete&controller=voiture&immatriculation=' . $immatURL . '" class="action-link danger">Supprimer</a>
                            <a href="../web/frontController.php?action=update&controller=voiture&immatriculation=' . $immatURL . '" class="action-link warning">Modifier</a>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<a href="../web/frontController.php?action=create&controller=voiture" class="btn-primary">Créer une voiture</a>
