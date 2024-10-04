<h1>Liste des rapports de nourrissage</h1>

<a href="/nourrir/create" class="btn btn-success">Ajouter un nouveau rapport</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom de l'animal</th>
            <th>Nourriture</th>
            <th>Quantité</th>
            <th>Date</th>
            <th>Observations</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rapports as $rapport): ?>
            <tr>
                <td><?= $rapport['id'] ?></td>
                <td><?= $rapport['animal_id'] ?></td>
                <td><?= htmlspecialchars($rapport['nourriture']) ?></td>
                <td><?= htmlspecialchars($rapport['quantite']) ?></td>
                <td><?= htmlspecialchars($rapport['date']) ?></td>
                <td><?= htmlspecialchars($rapport['observations']) ?></td>
                <td>
                    <a href="/nourrir/edit?id=<?= $rapport['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="/nourrir/delete?id=<?= $rapport['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
