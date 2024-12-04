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
                    <?php foreach ($avis as $a): ?>
                        <tr>
                            <td><?= htmlspecialchars($a['pseudo']); ?></td>
                            <td><?= htmlspecialchars($a['comment']); ?></td>
                            <td><?= htmlspecialchars($a['valid']); ?></td>
                            <td>
                                <!-- Bouton de suppression avec confirmation -->
                                <a href="/avis/delete/<?=$a['id']; ?>" class="btn danger"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
