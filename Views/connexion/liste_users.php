<h1 class="text-center banner pt-5 pb-5">Liste des utilisateurs</h1>
<section class="colorSection">
    <div class="container">

        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom et Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rôle</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['nom_prenom']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= $user['role_id'] == 2 ? 'Vétérinaire' : 'Employé' ?></td>
                                <td>
                                    <!-- Bouton de modification -->
                                    <a href="/connexion/editUser/<?= $user['id'] ?>" class="btn warning btn-sm">Modifier</a>

                                    <!-- Bouton de suppression avec confirmation -->
                                    <a href="/connexion/deleteUser/<?= $user['id'] ?>" class="btn danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Aucun utilisateur trouvé.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>