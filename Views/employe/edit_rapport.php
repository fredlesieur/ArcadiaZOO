<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<div class="mx-auto p-4">
    <h2 class="text-center">Modifier le rapport nourriture</h2>
    <form action="/employe/enregistrerModification/<?= $rapport['id']; ?>" method="post">
        <label for="animal_id">Animal :</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?=$animal['nom']; ?></option>
            <?php endforeach; ?>
        </select><br>

    <label for="nourriture">Nourriture :</label>
    <input type="text" name="nourriture" id="nourriture" value="<?= htmlspecialchars($rapport['nourriture']); ?>" required><br>

    <label for="quantite">Quantité :</label>
    <input type="text" name="quantite" id="quantite" value="<?= htmlspecialchars($rapport['quantite']); ?>" required><br>

    <label for="date">Date de passage :</label>
    <input type="date" name="date" id="date" value="<?= date('Y-m-d\TH:i', strtotime($rapport['date'])); ?>" required><br>

    <label for="observations">Observations :</label>
    <input type="text" name="observations" id="observations" value="<?= htmlspecialchars($rapport['observations']); ?>" required><br>

    <button type="submit" class="btn btn-warning ">Enregistrer</button>
</form>
