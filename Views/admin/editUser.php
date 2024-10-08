<div class="form-container mx-auto p-4">
    <h2 class="text-center">Modifier un compte utilisateur</h2>
    <form action="/admin/editUser" method="POST">
        <div class="mb-3">
            <label for="nom_prenom" class="form-label text-center" ><Minuscule>Nom et prenom de l'utilisateur</Minuscule></label>
            <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" value="<?= $user['nom_prenom'] ?>"required>
        <div class="mb-3">
            <label for="email" class="form-label text-center" >Email de l'utilisateur</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label text-center" >Rôle</label>
            <input id="role" name="role" class="form-control" value="<?= $user['role_id'] == 2 ? 'Vétérinaire' : 'Employé' ?>" required> </input>           
        </div>
        <button type="submit" class="btn button w-100 mt-2">Modifier le compte</button>
    </form>
</div>