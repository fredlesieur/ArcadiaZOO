<form action="/employe/gererNourriture" method="post">
    <label for="animal_id">Animal :</label>
    <select name="animal_id" id="animal_id">
        <?php foreach ($animal as $animals): ?>
            <option value="<?= $animals['id']; ?>"><?= $animals['nom']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="etat">État de l'animal :</label>
    <input type="text" name="etat" id="etat"><br>

    <label for="nourriture">Nourriture donnée:</label>
    <input type="text" name="nourriture" id="nourriture"><br>

    <label for="grammage">Grammage donné:</label>
    <input type="number" name="grammage" id="grammage"><br>

    <label for="date_passage">Date de passage :</label>
    <input type="date" name="date_passage" id="date_passage"><br>

    <button type="submit">Ajouter</button>
</form>
