<form action="/veterinaire/create" method="POST">
    <div class="form-group">
        <label>Vétérinaire :
            <?= isset($_SESSION['user_nom_prenom']) ? htmlspecialchars($_SESSION['user_nom_prenom']) : 'Nom non disponible'; ?></label>
        <!-- Champ caché pour envoyer l'ID du vétérinaire -->
        <input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="habitat_id">Sélectionnez un Habitat</label>
        <select name="habitat_id" id="habitat_id" class="form-control" required>
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat['id'] ?>"><?= $habitat['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="rapport">Rapport Habitat</label>
        <textarea name="rapport" id="rapport" class="form-control" required></textarea>
    </div>

    <!-- Afficher le nom du vétérinaire connecté -->


    <button type="submit" class="btn btn-primary">Enregistrer le Rapport</button>
</form>