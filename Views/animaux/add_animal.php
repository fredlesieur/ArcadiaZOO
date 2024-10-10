<?php if ($_SESSION['role'] === 'administrateur') : ?>
<div class="mx-auto p-4">
    <h2 class="text-center">Ajouter un animal</h2>
    <form action="/animal/addAnimal" method="post" enctype="multipart/form-data">

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required><br>

        <label for="age">Âge :</label>
        <input type="number" name="age" id="age" required> ans<br>

        <label for="race">Race :</label>
        <input type="text" name="race" id="race" required><br>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image"><br>

        <label for="id_habitat">Habitat :</label>
        <select name="id_habitat" id="id_habitat" required>
            <option value="">Sélectionner un habitat</option>
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= htmlspecialchars($habitat['id']); ?>"><?= htmlspecialchars($habitat['name']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
    </form>
</div>
<?php endif; ?>
