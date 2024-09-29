<!-- Formulaire pour créer un compte utilisateur (employé ou vétérinaire) -->
<h2>Créer un compte utilisateur</h2>
<form action="/admin/creerUtilisateur" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email de l'utilisateur</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Rôle</label>
        <select id="role" name="role" class="form-control" required>
            <option value="employe">Employé</option>
            <option value="veterinaire">Vétérinaire</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer le compte</button>
</form>
