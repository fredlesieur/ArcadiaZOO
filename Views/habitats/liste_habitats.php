<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>
<h1 class="container-fluid banner pt-5 pb-5">Liste des habitats</h1>
<section class="colorSection">

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 5%;">Id</th>
                    <th style="width: 20%;">Nom</th>
                    <th style="width: 30%;">Description</th>
                    <th style="width: 30%;">Commentaire</th>
                    <th style="width: 15%;">Actions</th>
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
</section>