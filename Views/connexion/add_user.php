<?php $script = '<script src="/assets/javascript/passwordhide.js"></script>' ?> 

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<h1 class="container-fluid banner pt-5 pb-5">Ajouter un utilisateur</h1>
<section class="colorSection">
    <div class="container mx-auto p-4">

        <form action="/connexion/addUser" method="POST" class="ajax">
            <div class="mb-3">
                <label for="nom_prenom" class="form-label text-center">
                    Nom et prénom de l'utilisateur
                </label>
                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-center">Email de l'utilisateur</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-center">Mot de passe</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye togglePasswordIcon"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label for="role_id" class="form-label text-center">Rôle</label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value="3">Employé</option>
                    <option value="2">Vétérinaire</option>
                </select>
            </div>

            <button type="submit" class="btn success w-100 mt-2">Créer le compte</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="action" value="submit_form">
        </form>

    </div>
</section>

