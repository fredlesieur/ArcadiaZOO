<?php $link = '<link rel="stylesheet" href="/assets/css/veterinaire.css">' ?>

<form action="/veterinaire/saveRapports" method="POST">
    <div class="form-group">
        <label for="animal_id">Sélectionnez un Animal</label>
        <select name="animal_id" id="animal_id" class="form-control" required>
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id'] ?>"><?=$animal['nom'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="etat">État de l'animal</label>
        <input type="text" name="etat" id="etat" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nourriture">Nourriture donnée</label>
        <input type="text" name="nourriture" id="nourriture" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="grammage">Quantité de nourriture (en grammes)</label>
        <input type="text" name="grammage" id="grammage" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date_passage">Date et Heure de Passage</label>
        <input type="datetime-local" name="date_passage" id="date_passage" class="form-control" value="<?= isset($rapport['date_passage']) ? date('Y-m-d\TH:i', strtotime($rapport['date_passage'])) : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="detail_etat">Détails de l'état</label>
        <textarea name="detail_etat" id="detail_etat" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn button">Enregistrer le Rapport</button>
</form>
