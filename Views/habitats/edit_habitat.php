<h1 class="container-fluid banner pt-5 pb-5">Modifier un Habitat</h1>
<section class="colorSection">
    <div class="container my-5">
        <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'administrateur') : ?>
            <form action="/habitats/editHabitat/<?= $habitat['id'] ?>" method="post" enctype="multipart/form-data">
                
                <!-- Affichage du nom de l'habitat sans menu déroulant -->
                <label for="name">Nom de l'habitat :</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $habitat['name'] ?>" required><br>

                <!-- Commentaire pour les vétérinaires et administrateurs -->
                <label for="commentaire">Commentaire vétérinaire :</label>
                <textarea class="form-control" name="commentaire" id="commentaire"><?= $habitat['commentaire'] ?></textarea><br>

                <?php if ($_SESSION['role'] === 'administrateur') : ?>
                    <label for="description">Description :</label>
                    <textarea class="form-control" name="description" id="description" required><?= $habitat['description'] ?></textarea><br>

                    <label for="description_courte">Description courte :</label>
                    <textarea class="form-control" name="description_courte" id="description_courte"><?= $habitat['description_courte'] ?></textarea><br>

                    <label for="image">Image carousel :</label>
                    <input type="file" class="form-control" name="image" id="image"><br>

                    <label for="image2">Image2 carousel :</label>
                    <input type="file" class="form-control" name="image2" id="image2"><br>

                    <label for="image3">Image3 habitat :</label>
                    <input type="file" class="form-control" name="image3" id="image3"><br>

                    <!-- Champ caché pour user_id -->
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                <?php endif; ?>

                <button type="submit" class="btn btn-warning w-100 mt-2">Modifier</button>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </form>
        <?php endif; ?>
    </div>
</section>



