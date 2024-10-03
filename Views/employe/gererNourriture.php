<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<div class="mx-auto p-4">
    <h2 class="text-center">Gérer la nourriture</h2>
    <form action="/employe/gererNourriture" method="post">
        <label for="animal_id">Animal :</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?= $animal['nom']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="etat">État de l'animal :</label>
        <input type="text" name="etat" id="etat"><br>

        <label for="nourriture">Nourriture donnée:</label>
        <input type="text" name="nourriture" id="nourriture"><br>

        <label for="grammage">Grammage donné:</label>
        <input type="text" name="grammage" id="grammage"><br>

        <label for="date_passage">Date de passage :</label>
        <input type="datetime-local" name="date_passage" id="date_passage" class="form-control" value="<?= isset($animal['date_passage']) ? date('Y-m-d\TH:i', strtotime($animal['date_passage'])) : ''; ?>" required>

        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
    </form>
</div>