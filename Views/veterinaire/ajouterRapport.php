<?php $link = '<link rel="stylesheet" href="/assets/css/veterinaire.css">' ?>

<div class="mx-auto p-4">
    <h2 class="text-center">Ajouter rapport</h2>

    <form action="/veterinaire/saveRapport" method="post">
        <label for="animal_id">Choisir un animal :</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?= $animal['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="etat">État de l'animal :</label>
        <input type="text" name="etat" id="etat"><br>

        <label for="nourriture">Nourriture proposée :</label>
        <input type="text" name="nourriture" id="nourriture"><br>

        <label for="grammage">Grammage :</label>
        <input type="number" name="grammage" id="grammage"><br>

        <label for="date_passage">Date de passage :</label>
        <input type="date" name="date_passage" id="date_passage"><br>

        <label for="detail_etat">Détails supplémentaires (facultatif) :</label>
        <textarea name="detail_etat" id="detail_etat" class="w-100"></textarea><br>

        <button type="submit" class="btn btn-success w-100 mt-3">Ajouter</button>
    </form>
</div>