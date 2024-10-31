<h1 class="banner pt-5 pb-5">Liste des horaires</h1>
<section class="colorSection">
    <div class="container">
        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped table-hover">
                <thead class="thead-dark">
        <tr>
            <th>Saison</th>
            <th>Semaine</th>
            <th>Week-end</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($horaires as $horaire): ?>
            <tr>
                <td><?= htmlspecialchars($horaire['saison']); ?></td>
                <td><?= htmlspecialchars($horaire['semaine']); ?></td>
                <td><?= htmlspecialchars($horaire['week_end']); ?></td>
                <td>

                    <a href="/contact/editHoraire/<?= $horaire['_id']; ?>" class="btn warning">Modifier</a>

                    <!-- Bouton de suppression avec confirmation -->
                    <a href="/contact/deleteHoraire/<?= $horaire['_id']; ?>" class="btn danger"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?');">
                        Supprimer
                    </a>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>