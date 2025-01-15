<h1 class="container-fluid banner pt-5 pb-5">Modifier un compte utilisateur</h1>
 
<section class="colorSection">
    <div class="container mx-auto p-4">
        <form action="/connexion/editUser/<?= $users['id'] ?>" method="POST">
            <input type="hidden" name="id" value="<?= $users['id'] ?>">

            <div class="mb-3">
                <label for="nom_prenom" class="form-label text-center">Nom et prénom de l'utilisateur</label>
                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" value="<?= htmlspecialchars($users['nom_prenom']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-center">Email de l'utilisateur</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($users['email']); ?>" required>
            </div>

            <div class="mb-3">
                <?php if ($users['role_id'] == 1): ?>
                    <p><strong>Rôle :</strong> Administrateur (Non modifiable)</p>
                <?php else: ?>
                    <label for="role" class="form-label text-center">Rôle</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="2" <?= $users['role_id'] == 2 ? 'selected' : ''; ?>>Vétérinaire</option>
                        <option value="3" <?= $users['role_id'] == 3 ? 'selected' : ''; ?>>Employé</option>
                    </select>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn warning w-100 mt-2">Modifier le compte</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="action" value="submit_form">
        </form>
    </div>
</section>
