<h2><?= $title ?></h2>

<table class="table">
    <thead>
        <tr>
            <th>Nom du Vétérinaire</th>
            <th>Nom de l'Habitat</th>
            <th>Commentaire</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($rapportsHabitats)): ?>
            <?php foreach ($rapportsHabitats as $rapport): ?>
            <tr>
                <td><?= htmlspecialchars($rapport['veterinaire_nom']) ?></td>
                <td><?= htmlspecialchars($rapport['name']) ?></td>
                <td><?= htmlspecialchars($rapport['commentaire']) ?></td>
                <td>
                    <!-- Bouton de modification -->
                    <a href="/veterinaire/edit/<?= $rapport['id']; ?>" class="btn btn-warning">Modifier</a>
                    
                    <!-- Bouton de suppression avec une confirmation -->
                    <a href="/veterinaire/delete/<?= $rapport['id']; ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Aucun rapport trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


