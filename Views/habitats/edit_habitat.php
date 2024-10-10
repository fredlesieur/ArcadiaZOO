<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>
<h1 class="container-fluid banner pt-5 pb-5">Modifier un Service</h1>
<section class="colorSection">
    <form action="/habitats/editHabitat/<?= $habitat['id'] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $habitat['id'] ?>">

        <label for="name">Nom de l'habitat :</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($habitat['name']) ?>" required><br>

        <label for="description">Description :</label>
        <textarea class="w-100 form-control" name="description" id="description" required><?= htmlspecialchars($habitat['description']) ?></textarea><br>

        <label for="description_courte">Description courte :</label>
        <textarea class="w-100 form-control" name="description_courte" id="description_courte" required><?= htmlspecialchars($habitat['description_courte']) ?></textarea><br>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image"><br>

        <label for="image2">Image supplémentaire :</label>
        <input type="file" name="image2" id="image2"><br>

        <label for="image3">Image secondaire :</label>
        <input type="file" name="image3" id="image3"><br>

        <label for="commentaire">Commentaire :</label>
        <textarea class="w-100" name="commentaire" id="commentaire"><?= htmlspecialchars($habitat['commentaire']) ?></textarea><br>

        <label for="user_id">Utilisateur :</label>
        <input type="text" name="user_id" id="user_id" value="<?= htmlspecialchars($habitat['user_id']) ?>"><br>

        <button type="submit" class="btn warning w-100 mt-2">Modifier</button>
    </form>
</section>