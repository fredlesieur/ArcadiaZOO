<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>

<h1 class="banner pt-5 pb-5">Liste des habitats</h1>
<section class="colorSection">
    <div class="container">
        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Commentaire</th>
                        <th>Image</th>
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
                            <td><img src="/assets/images/<?= $habitat['image']; ?>" width="100" alt="Image de l'habitat"></td>
                            <td>
                                <!-- Bouton de modification -->
                                <a href="/habitats/editHabitat/<?= $habitat['id'] ?>" class="btn warning">Modifier</a>

                                <!-- Bouton de suppression avec confirmation -->
                                <a href="/habitats/deleteHabitat/<?= $habitat['id'] ?>" class="btn danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?');">
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
