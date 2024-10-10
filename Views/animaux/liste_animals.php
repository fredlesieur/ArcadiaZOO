<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">'; ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Liste des animaux</h1>

    <!-- Vérifier s'il y a des messages de succès ou d'erreur -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Âge</th>
                <th>Race</th>
                <th>Habitat</th>
                <th>Image</th>
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
                        <td><img src="/uploads/<?= htmlspecialchars($animal['image']); ?>" alt="<?= htmlspecialchars($animal['nom']); ?>" width="100"></td>
                        <td>
                            <!-- Bouton de modification -->
                            <a href="/animal/editAnimal/<?= $animal['id']; ?>" class="btn btn-warning">Modifier</a>

                            <!-- Bouton de suppression avec confirmation -->
                            <a href="/animal/deleteAnimal/<?= $animal['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Aucun animal trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

