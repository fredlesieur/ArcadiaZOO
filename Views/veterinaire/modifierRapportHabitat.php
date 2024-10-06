<form action="/veterinaire/edit/<?= $habitat['id'] ?>" method="POST">
    <!-- Affichage du vétérinaire qui a saisi le rapport -->
    <div class="form-group">
        <label for="veterinaire">Vétérinaire qui a saisi le rapport</label>
        <input type="text" id="veterinaire" class="form-control" value="<?= htmlspecialchars($veterinaire_nom); ?>" readonly>
    </div>

    <!-- Affichage du nom de l'habitat -->
    <div class="form-group">
        <label for="habitat">Habitat</label>
        <input type="text" id="habitat" class="form-control" value="<?= htmlspecialchars($habitat['name']); ?>" readonly>
    </div>

    <!-- Modification du rapport -->
    <div class="form-group">
        <label for="rapport">Modifier le rapport de l'Habitat</label>
        <textarea name="rapport" id="rapport" class="form-control" required><?= htmlspecialchars($habitat['commentaire']); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour le Rapport</button>
</form>

