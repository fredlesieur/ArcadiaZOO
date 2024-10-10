<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">' ?>


<div class="mx-auto p-4">
    <h2 class="text-center">Modifier un animal</h2>
    <form action="/animal/editAnimal" method="post" enctype="multipart/form-data">

        <?php if ($_SESSION['role'] === 'administrateur') : ?>

            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="<?= isset($habitat['name']) ? htmlspecialchars($habitat['name']) : ''; ?>"><br>

            <label for="description">Description :</label>
            <input type="text" name="description" id="description" value="<?= isset($habitat['description']) ? htmlspecialchars($habitat['description']) : ''; ?>"><br>

            <label for="description_courte">Description courte :</label>
            <input type="text" name="description_courte" id="description_courte" value="<?= isset($habitat['description_courte']) ? htmlspecialchars($habitat['description_courte']) : ''; ?>"><br>

            <label for="image">Image :</label>
            <input type="file" name="image" id="image"><br>

            <label for="image2">Image :</label>
            <input type="file" name="image2" id="image2"><br>

            <label for="image3">Image :</label>
            <input type="file" name="image3" id="image3"><br>

            <label for="commentaire">Rapport Habitat :</label>
            <input type="text" name="race" id="race" value="<?= isset($habitat['commentaire']) ? htmlspecialchars($habitat['commentaire']) : ''; ?>"><br>

            <label for="user_id">Utilisateurs :</label>
            <input type="number" name="user_id" id="user_id" value="<?= isset($habitat['user_id']) ? htmlspecialchars($habitat['user_id']) : ''; ?>"><br>

            <button type="submit" class="btn btn-success w-100 mt-2">Modifier</button>
        <?php endif; ?>
    </form>
</div>

