<form action="/veterinaire/create" method="POST">
    <div class="form-group">
        <label for="habitat_id">Sélectionnez un Habitat</label>
        <select name="habitat_id" id="habitat_id" class="form-control" required>
            <?php foreach ($habitat as $h): ?>
                <option value="<?= $h['id'] ?>"><?= $h['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="rapport">Rapport Habitat</label>
        <textarea name="rapport" id="rapport" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer le Rapport</button>
</form>
