<h1>Modifier le Rapport</h1>
<form method="post" action="">
    <input type="hidden" name="id" value="<?= $rapport['id'] ?>">

    <div class="form-group">
        <label for="animal_id">Animal</label>
        <input type="text" class="form-control" value="<?= $animal['nom'] ?>" readonly> <!-- Afficher le nom de l'animal -->
        <input type="hidden" name="animal_id" value="<?= $animal['id'] ?>"> <!-- Garder l'ID de l'animal -->
    </div>

    <div class="form-group">
        <label for="etat">État</label>
        <input type="text" name="etat" id="etat" class="form-control" value="<?= $rapport['etat'] ?>" required>
    </div>

    <div class="form-group">
        <label for="nourriture">Nourriture</label>
        <input type="text" name="nourriture" id="nourriture" class="form-control" value="<?= $rapport['nourriture'] ?>" required>
    </div>

    <div class="form-group">
        <label for="grammage">Grammage</label>
        <input type="text" name="grammage" id="grammage" class="form-control" value="<?= $rapport['grammage'] ?>" required>
    </div>

    <div class="form-group">
        <label for="date_passage">Date et Heure</label>
        <input type="datetime-local" name="date_passage" id="date_passage" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($rapport['date_passage'])) ?>" required>
    </div>

    <div class="form-group">
        <label for="detail_etat">Détail État</label>
        <textarea name="detail_etat" id="detail_etat" class="form-control" required><?= $rapport['detail_etat'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
