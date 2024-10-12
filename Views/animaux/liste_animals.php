<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">'; ?>
<h1 class="container-fluid banner pt-5 pb-5">Liste des animaux</h1>
<section class="colorSection">
    <div class="container my-5">
        <!-- Vérifier s'il y a des messages de succès ou d'erreur -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Âge</th>
                        <th>Race</th>
                        <th>Habitat</th>
                        <th>Image</th>
                        <th>Vues</th> <!-- Nouvelle colonne pour le compteur de vues -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($animaux)): ?>
                        <?php foreach ($animaux as $animal): ?>
                            <tr>
                                <td><?= htmlspecialchars($animal['nom']); ?></td>
                                <td><?= htmlspecialchars($animal['age']); ?> ans</td>
                                <td><?= htmlspecialchars($animal['race']); ?></td>
                                <td><?= isset($animal['habitat_name']) ? htmlspecialchars($animal['habitat_name']) : 'Non défini'; ?></td>
                                <td><img src="/assets/images/<?= htmlspecialchars($animal['image']); ?>" alt="<?= htmlspecialchars($animal['nom']); ?>" width="100"></td>
                                <td><?= htmlspecialchars($animal['views']); ?></td> <!-- Affichage du compteur de vues -->
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
<?php $script = '<script src="/assets/javascript/compteur.js"></script>'; ?>