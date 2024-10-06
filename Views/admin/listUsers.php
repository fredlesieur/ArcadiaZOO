<?php $link = '<link rel="stylesheet" href="/assets/css/admin.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5">Liste des utilisateurs</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom et Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']?></td>
                <td><?= $user['nom_prenom'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role_id'] == 2 ? 'Vétérinaire' : 'Employé' ?></td>
                <td>
                    <!-- Bouton de modification -->
                    <a href="/admin/editUser/<?= $user['id'] ?>" class="btn btn-warning">Modifier</a>
                    
                    <!-- Bouton de suppression avec confirmation -->
                    <a href="/admin/deleteUser/<?= $user['id'] ?>" class="btn btn-danger"
                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun utilisateur trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
