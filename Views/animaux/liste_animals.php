<h1 class="banner pt-5 pb-5">Liste des animaux</h1>
<section class="colorSection">
    <div class="container">
        <!-- Vérifier s'il y a des messages de succès ou d'erreur -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="datatable1 table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Âge</th>
                        <th>Race</th>
                        <th>Habitat</th>
                        <th>Image</th>
                        <th>Vues</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($animaux)): ?>
                        <?php foreach ($animaux as $animal): ?>
                            <tr>
                                <td><?= $animal['nom']; ?></td>
                                <td><?= $animal['age']; ?> ans</td>
                                <td><?= $animal['race']; ?></td>
                                <td><?= isset($animal['habitat_name']) ? $animal['habitat_name'] : 'Non défini'; ?></td>
                                <td><img src="<?= $animal['image']; ?>" alt="<?= $animal['nom']; ?>" width="100" loading="lazy"></td>
                                <td><?= $animal['views']; ?></td>
                                <td>
                                    <!-- Bouton de modification -->
                                    <a href="/animal/editAnimal/<?= $animal['id']; ?>" class="btn warning">Modifier</a>

                                    <!-- Bouton de suppression avec confirmation -->
                                    <a href="/animal/deleteAnimal/<?= $animal['id']; ?>" class="btn danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Aucun animal trouvé.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/filtreAnimaux.js"></script>';?>