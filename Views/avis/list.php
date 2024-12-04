<h1 class="banner pt-5 pb-5">Liste des horaires</h1>
<section class="colorSection">
    <div class="container">
        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped table-hover">
                <thead class="thead-dark">
        <tr>
            <th>Pseudo</th>
            <th>Commentaire</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($horaires as $horaire): ?>
            <tr>
                <td><?= htmlspecialchars($horaire['pseudo']); ?></td>
                <td><?= htmlspecialchars($horaire['comment']); ?></td>
                <td><?= htmlspecialchars($horaire['valid']); ?></td>
                <td>

                    <!-- Bouton de suppression avec confirmation -->
                    <a href="/avis/delete/<?= $horaire['_id']; ?>" class="btn danger"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?');">
                        Supprimer
                    </a>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>