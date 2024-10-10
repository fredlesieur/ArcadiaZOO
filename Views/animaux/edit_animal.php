<div class="form-container mx-auto p-4">
    <h2 class="text-center">Modifier un animal</h2>
    <?php if ($_SESSION['role'] === 'administrateur') : ?>
        <form action="/animal/editAnimal/<?= $animaux['id'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($animaux['id']); ?>">

            <div class="mb-3">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= htmlspecialchars($animaux['nom']); ?>">
            </div>

            <div class="mb-3">
                <label for="age">Âge :</label>
                <input type="number" name="age" id="age" class="form-control" value="<?= htmlspecialchars($animaux['age']); ?>"> ans
            </div>

            <div class="mb-3">
                <label for="race">Race :</label>
                <input type="text" name="race" id="race" class="form-control" value="<?= htmlspecialchars($animaux['race']); ?>">
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="id_habitats">Habitat :</label>
                <select name="id_habitats" id="id_habitats" class="form-control">
                    <?php foreach ($habitats as $habitat): ?>
                        <option value="<?= $habitat['id'] ?>" <?= $animaux['id_habitats'] == $habitat['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($habitat['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-2">Modifier l'animal</button>
        </form>
    <?php endif; ?>
</div>

