<h2>Ajouter un rapport vétérinaire</h2>

<form action="/veterinaire/saveRapport" method="post">
    <label for="animal_id">Animal :</label>
    <select name="animal_id" id="animal_id">
        <?php foreach ($animal as $animals): ?>
            <option value="<?= $animals['id']; ?>"><?= $animals['nom']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="etat">État de l'animal :</label>
    <input type="text" name="etat" id="etat"><br>

    <label for="nourriture">Nourriture proposée :</label>
    <input type="text" name="nourriture" id="nourriture"><br>

    <label for="grammage">Grammage :</label>
    <input type="number" name="grammage" id="grammage"><br>

    <label for="date_passage">Date de passage :</label>
    <input type="date" name="date_passage" id="date_passage"><br>

    <label for="detail_etat">Détails supplémentaires (facultatif) :</label>
    <textarea name="detail_etat" id="detail_etat"></textarea><br>

    <button type="submit">Ajouter</button>
</form>
