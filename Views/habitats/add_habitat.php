<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>
<h1 class="container-fluid banner pt-5 pb-5">Ajouter un (commentaire ou habitat)</h1>
<section class="colorSection">
    <div class="mx-auto p-4">
        <form action="/habitats/addHabitat" method="post">

            <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'administrateur') : ?>
                <label for="id_habitat">Sélectionner l'habitat :</label>
                <select name="id_habitat" id="id_habitat" required>
                    <option value="">Choisir un habitat</option>
                    <?php foreach ($habitats as $habitat): ?>
                        <option value="<?= $habitat['id']; ?>"><?= htmlspecialchars($habitat['name']); ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label class="fs-4 fw-bold" for="commentaire">Commentaire Habitat vétérinaire : </label><br>
                <textarea type="textarea" name="commentaire" id="commentaire" class="form-control"></textarea><br>
            <?php endif; ?>

            <?php if ($_SESSION['role'] === 'administrateur') : ?>

                <label for="name">Nom :</label>
                <input type="text" name="name" id="name"><br>

                <label for="description">Description :</label>
                <textarea type="textarea" name="description" id="description" class="form-control"></textarea><br>

                <label for="description_courte">Description courte : </label>
                <textarea type="textarea" name="description_courte" id="description_courte" class="form-control"></textarea><br>

                <label for="image">Image</label>
                <input type="file" name="image" id="image"><br>

                <label for="image2">Image</label>
                <input type="file" name="image2" id="image2"><br>

                <label for="image3">Image</label>
                <input type="file" name="image3" id="image3"><br>

                <button type="submit" class="btn success w-100 mt-2">Ajouter</button>
        </form>
    </div>
</section>
<?php endif; ?>