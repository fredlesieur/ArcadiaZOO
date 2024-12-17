
<?php if ($_SESSION['role'] === 'administrateur') : ?>
    <h1 class="container-fluid banner pt-5 pb-5">Ajouter un animal</h1>
    <section class="colorSection">
        <div class="mx-auto p-4">
 
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
                        <option value="<?= $habitat['id']; ?>"><?= $habitat['name']; ?></option>
                    <?php endforeach; ?>
                </select><br>

                <button type="submit" class="btn success w-100 mt-2">Ajouter</button>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="action" value="submit_form">
            </form>
        </div>
    </section>
<?php endif; ?>