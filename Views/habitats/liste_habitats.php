<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5">Liste des habitats</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th>commentaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($habitats as $habitat): ?>
            <tr>
                <td><?= $habitat['id']; ?></td>
                <td><?= $habitat['name']; ?></td>
                <td><?= $habitat['description_courte']; ?></td>
                <td><?= $habitat['commentaire']; ?></td>
                <td>
                    <!-- Bouton de modification -->
                    <a href="/habitats/editHabitat/<?= $habitat['id'] ?>" class="btn btn-warning">Modifier</a>
                    
                    <!-- Bouton de suppression avec confirmation -->
                    <a href="/habitats/deleteHabitat/<?= $habitat['id'] ?>" class="btn btn-danger"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>