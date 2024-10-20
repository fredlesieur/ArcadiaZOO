<?php if ($_SESSION['role'] === 'veterinaire'): ?>
        Ajouter un commentaire
    <?php else: ?>
        Ajouter un Habitat
    <?php endif; ?>



    <!-- Afficher les messages d'erreur et de succès -->
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <h1 class="container-fluid banner pt-5 pb-5"></h1>
<section class="colorSection">
    <div class="container my-5">
    <form action="/habitats/addHabitat" method="post" enctype="multipart/form-data">

        <!-- Partie vétérinaire : Ajout d'un commentaire sur un habitat existant -->
        <?php if ($_SESSION['role'] === 'veterinaire') : ?>
            <label for="id_habitat">Sélectionner un habitat existant :</label>
            <select name="id_habitat" id="id_habitat" required>
                <option value="">Sélectionner un habitat</option>
                <?php foreach ($habitats as $habitatOption): ?>
                    <option value="<?= htmlspecialchars($habitatOption['id']); ?>"><?= htmlspecialchars($habitatOption['name']); ?></option>
                <?php endforeach; ?>
            </select><br>

            <!-- Champ pour ajouter un commentaire uniquement si l'habitat n'a pas de commentaire -->
            <label for="commentaire">Ajouter un commentaire :</label>
            <textarea class="form-control" name="commentaire" id="commentaire"></textarea><br>
        <?php endif; ?>

        <!-- Partie administrateur : Ajout d'un nouvel habitat -->
        <?php if ($_SESSION['role'] === 'administrateur') : ?>
            <label for="name">Nom de l'habitat :</label>
            <input type="text" class="form-control" name="name" id="name" required><br>

            <label for="description">Description :</label>
            <textarea class="form-control" name="description" id="description" required></textarea><br>

            <label for="image">Image carrousel :</label>
            <input type="file" class="form-control" name="image" id="image" required><br>

            <label for="image2">Image de présentation habitat :</label>
            <input type="file" class="form-control" name="image2" id="image2"><br>

            <label for="image3">Image carrousel secondaire :</label>
            <input type="file" class="form-control" name="image3" id="image3"><br>

            <label for="description_courte">Description courte :</label>
            <textarea class="form-control" name="description_courte" id="description_courte"></textarea><br>
        <?php endif; ?>

        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>

    </div>
</section>


