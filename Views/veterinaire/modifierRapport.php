<h1>Modifier le Rapport</h1>

<form method="post" action="/veterinaire/modifierRapport/<?= $rapport['id'] ?>">
    <input type="hidden" name="id" value="<?= $rapport['id'] ?>">

    <div class="form-group">
        <label for="id_animal">Animal</label>
        <select class="form-control" id="id_animal" name="id_animal" required>
        <?php foreach ($animaux as $animal): ?>
            <option value="<?= $rapport['id_animal'] ?>" <?= ($rapport['id_animal'] == $animal['id']) ? 'selected' : '' ?>>
                <?= $animal['nom'] ?>
            </option>
            
        <?php endforeach; ?>
        </select>
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


