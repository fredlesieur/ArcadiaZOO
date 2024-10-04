<h1>Ajouter un rapport de nourrissage</h1>

<form action="/nourrir/create" method="POST">
    <div class="mb-3">
        <label for="animal_id" class="form-label">Animal</label>
        <select name="animal_id" id="animal_id" class="form-control" required>
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['nom']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="nourriture" class="form-label">Nourriture</label>
        <input type="text" name="nourriture" id="nourriture" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="text" name="quantite" id="quantite" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="observations" class="form-label">Observations</label>
        <textarea name="observations" id="observations" class="form-control" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
