<?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?>
<h1 class="banner pt-5 pb-5 mb-0 text-center">Liste des services</h1>
<section class="colorSection">
    <div class="container ">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($services)): ?>
                        <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?= htmlspecialchars($service['name']); ?></td>
                                <td><?= htmlspecialchars($service['categorie']); ?></td>
                                <td><img src="/assets/images/<?= htmlspecialchars($service['image']); ?>" alt="<?= htmlspecialchars($service['name']); ?>" width="100"></td>
                                <td>
                                    <a href="/service/editServ/<?= $service['id']; ?>" class="btn warning mx-2">Modifier</a>
                                    <a href="/service/deleteServ/<?= $service['id']; ?>" class="btn danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a>
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
    </div>
</section>
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>