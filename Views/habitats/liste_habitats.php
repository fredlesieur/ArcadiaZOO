<h1 class="banner pt-5 pb-5">Liste des habitats</h1> 
<section class="colorSection">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Commentaire</th>
                        <th>Image</th>
                        <?php if ($_SESSION['role'] !== 'employe'): ?>
                            <th>Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($habitats as $habitat): ?>
                        <tr>
                            <td><?= $habitat['id']; ?></td>
                            <td><?= htmlspecialchars($habitat['name']); ?></td>
                            <td><?= htmlspecialchars($habitat['description_courte']); ?></td>
                            <td><?= htmlspecialchars($habitat['commentaire']); ?></td>
                            <td><img src="/assets/images/<?= htmlspecialchars($habitat['image']); ?>" width="100" alt="Image de l'habitat" loading="lazy"></td>

                            <?php if ($_SESSION['role'] !== 'employe'): ?>
                                <td>
                                    <!-- Bouton de modification disponible pour vétérinaires et administrateurs -->
                                    <a href="/habitats/editHabitat/<?= $habitat['id'] ?>" class="btn warning">Modifier</a>

                                    <!-- Bouton de suppression uniquement disponible pour les administrateurs -->
                                    <?php if ($_SESSION['role'] === 'administrateur'): ?>
                                        <a href="/habitats/deleteHabitat/<?= $habitat['id'] ?>" class="btn danger"
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?');">
                                            Supprimer
                                        </a>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


