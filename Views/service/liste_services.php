<?php $link = '<link rel="stylesheet" href="/assets/css/service.css">' ?>

<div class="container my-5">
    <!-- Liste des services existants avec boutons de modification et suppression -->
    <h2>Liste des Services</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service['name']); ?></td>
                        <td><?= htmlspecialchars($service['categorie']); ?></td>
                        <td>
                            <a href="/service/editServ/<?= $service['id']; ?>" class="btn btn-warning mx-2">Modifier</a>
                            <a href="/service/deleteServ/<?= $service['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Aucun service trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>
