
<?php $link = '<link rel="stylesheet" href="/assets/css/veterinaire.css">' ?>
<div class="container">
    <h2 class="text-center">Rapports Vétérinaire</h2>

    <!-- Tableau des rapports vétérinaires -->
    <table id="rapportTable" class="table table-striped">
        <thead>
            <tr>
                <th>Vétérinaire</th>
                <th>Animal</th>
                <th>État</th>
                <th>Nourriture</th>
                <th>Grammage (g)</th>
                <th>Date et Heure</th>
                <th>Détail État</th>
                <th>Actions</th> <!-- Colonne pour les actions -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rapports as $rapport): ?>
                <tr>
                    <td><?= $rapport['user_nom_prenom']; ?></td>
                    <td><?= $rapport['animal_nom']; ?></td>
                    <td><?= $rapport['etat']; ?></td>
                    <td><?= $rapport['nourriture']; ?></td>
                    <td><?= $rapport['grammage']; ?></td>
                    <td><?= isset($rapport['date_passage']) ? date('d-m-Y H:i:s', strtotime($rapport['date_passage'])) : 'Date non disponible'; ?></td>
                    <td><?= $rapport['detail_etat']; ?></td>
                    <td>
                        <!-- Bouton de modification -->
                        <a href="/veterinaire/modifierRapport?id=<?= $rapport['id']; ?>" class="btn btn-warning">Modifier</a>
                        
                        <!-- Bouton de suppression avec une confirmation -->
                        <a href="/veterinaire/supprimerRapport?id=<?= $rapport['id']; ?>" 
                           class="btn btn-danger"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php $script = '<script src="/assets/javascript/rapport.js"></script>'; ?>
