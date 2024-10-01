<?php $link = '<link rel="stylesheet" href="/assets/css/veterinaire.css">' ?>

<form action="/veterinaire/saveRapport" method="POST">
    <div class="form-group">
        <label for="animal_id">Animal</label>
        <select name="animal_id" class="form-control" required>
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id'] ?>"><?=$animal['nom']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="etat">État</label>
        <input type="text" name="etat" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nourriture">Nourriture</label>
        <input type="text" name="nourriture" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="grammage">Gammage (en grammes)</label>
        <input type="number" name="grammage" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date_passage">Date de passage</label>
        <input type="date" name="date_passage" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="detail_etat">Détails sur l'état</label>
        <textarea name="detail_etat" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
