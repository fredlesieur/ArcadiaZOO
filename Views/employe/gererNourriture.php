<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<div class="mx-auto p-4">
    <h2 class="text-center">Gérer la nourriture</h2>
    <form action="/employe/enregistrerRapport" method="post">
        <label for="animal_id">Animal :</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?=$animal['nom']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="nourriture">Nourriture donnée :</label>
        <input type="text" name="nourriture" id="nourriture"><br>

        <label for="quantite">Quantité donnée :</label> 
        <input type="text" name="quantite" id="quantite" step="0.01"><br>

        <label for="date_passage">Date de passage :</label>
        <input type="date" name="date" id="date" class="form-control" value="<?= isset($animal['date']) ? date('d/m/Y\TH:i', strtotime($animal['date'])) : ''; ?>" required>
        
        <label for="observations">Observations (État de l'animal) :</label> 
        <input type="text" name="observations" id="observations"><br>

        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
    </form>
</div>
