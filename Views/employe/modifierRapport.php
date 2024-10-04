<h2>Modifier le rapport de nourrissage</h2>

<form action="/employe/enregistrerModification/<?= $rapport['id']; ?>" method="post">

    <label for="employe">Nom et prénom employé :</label>
    <input type="text" name="employe" id="employe" value="<?= htmlspecialchars($rapport['nom_employe']); ?>" readonly>

    <label for="nomAnimal">Nom de l'animal :</label>
    <input type="text" name="nomAnimal" id="nomAnimal" value="<?= htmlspecialchars($rapport['nom_animal']); ?>" readonly>

    <label for="nourriture">Nourriture :</label>
    <input type="text" name="nourriture" id="nourriture" value="<?= htmlspecialchars($rapport['nourriture']); ?>" required>

    <label for="quantite">Quantité :</label>
    <input type="text" name="quantite" id="quantite" value="<?= htmlspecialchars($rapport['quantite']); ?>" required>

    <label for="date">Date de passage :</label>
    <input type="datetime-local" name="date" id="date" value="<?= date('Y-m-d\TH:i', strtotime($rapport['date'])); ?>" required>

    <label for="observations">Observations :</label>
    <input type="text" name="observations" id="observations" value="<?= htmlspecialchars($rapport['observations']); ?>" required>

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
