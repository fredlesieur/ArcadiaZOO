<?php if ($_SESSION['role'] === 'veterinaire'): ?> 
    <h1>Ajouter un commentaire</h1>
<?php else: ?>
    <h1>Ajouter un Habitat</h1>
<?php endif; ?>

<section class="colorSection">
    <div class="container my-5">
        <form action="/habitats/addHabitat" method="post" enctype="multipart/form-data">

            <!-- Partie vétérinaire : Ajout d'un commentaire sur un habitat existant -->
            <?php if ($_SESSION['role'] === 'veterinaire') : ?>
                <label for="id_habitat">Sélectionner un habitat existant :</label>
                <select name="id_habitat" id="id_habitat" required>
                    <option value="">Sélectionner un habitat</option>
                    <?php foreach ($habitats as $habitatOption): ?>
                        <option value="<?= $habitatOption['id']; ?>"><?= $habitatOption['name']; ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="commentaire">Ajouter un commentaire :</label>
                <textarea class="form-control" name="commentaire" id="commentaire"></textarea><br>
            <?php endif; ?>

            <!-- Partie administrateur : Ajout d'un nouvel habitat -->
            <?php if ($_SESSION['role'] === 'administrateur') : ?>
                <label for="name">Nom de l'habitat :</label>
                <input type="text" class="form-control" name="name" id="name" required><br>

                <label for="description">Description :</label>
                <textarea class="form-control" name="description" id="description" required></textarea><br>

                <label for="description_courte">Description courte :</label>
                <textarea class="form-control" name="description_courte" id="description_courte"></textarea><br>

                <label for="image">Image carrousel :</label>
                <input type="file" class="form-control" name="image" id="image"><br>

                <label for="image2">Image2 caroussel :</label>
                <input type="file" class="form-control" name="image2" id="image2"><br>

                <label for="image3">Image3 habitat :</label>
                <input type="file" class="form-control" name="image3" id="image3"><br>

                <label for="commentaire">Commentaire sur l'habitat :</label>
                <textarea class="form-control" name="commentaire" id="commentaire"></textarea><br>

                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
            <?php endif; ?>

            <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>
