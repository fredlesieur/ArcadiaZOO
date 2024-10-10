<?php $link = '<link rel="stylesheet" href="/assets/css/admin.css">' ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?> <!-- Détruire la session après affichage -->
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?> <!-- Détruire la session après affichage -->
<?php endif; ?>


<div class="form-container mx-auto p-4">
    <h2 class="text-center">Créer un compte utilisateur</h2>
    <form action="/connexion/addUser" method="POST">
        <div class="mb-3">
            <label for="nom_prenom" class="form-label text-center"><Minuscule>Nom et prenom de l'utilisateur</Minuscule></label>
            <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" required>
        <div class="mb-3">
            <label for="email" class="form-label text-center">Email de l'utilisateur</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-center">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label text-center">Rôle</label>
            <select id="role" name="role" class="form-control" required>
                <option value="employe">Employé</option>
                <option value="veterinaire">Vétérinaire</option>
            </select>
        </div>
        <button type="submit" class="btn button w-100 mt-2">Créer le compte</button>
    </form>
</div>
