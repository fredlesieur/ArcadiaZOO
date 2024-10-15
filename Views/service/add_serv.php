<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5">Ajouter un Habitat</h1>
<section class="colorSection">
    <h2>Ajouter un Commentaire Vétérinaire</h2>
    <div class="container my-5">

    <form action="/habitats/addHabitat" method="post" enctype="multipart/form-data">

        <!-- Partie vétérinaire : Il peut ajouter un commentaire uniquement si aucun n'existe -->
        <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'administrateur') : ?>
            <label for="id_habitat">Sélectionner un habitat existant :</label>
            <select name="id_habitat" id="id_habitat" required>
                <option value="">Sélectionner un habitat</option>
                <?php foreach ($habitats as $habitat): ?>
                    <option value="<?= htmlspecialchars($habitat['id']); ?>"><?= htmlspecialchars($habitat['name']); ?></option>
                <?php endforeach; ?>
            </select><br>

            <!-- Afficher le champ de commentaire pour le vétérinaire si aucun commentaire n'existe -->
            <?php if ($_SESSION['role'] === 'veterinaire') : ?>
                <?php if (empty($habitat['commentaire'])) : ?>
                    <label for="commentaire">Ajouter un commentaire :</label>
                    <textarea class="form-control" name="commentaire" id="commentaire"></textarea><br>
                <?php else : ?>
                    <div class="alert alert-warning">Un commentaire existe déjà pour cet habitat. Utilisez la modification.</div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Partie administrateur : Il peut ajouter un nouvel habitat, mais ne peut pas modifier le commentaire -->
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

            <!-- Affichage du commentaire pour l'administrateur mais il ne peut pas le modifier -->
            <label>Commentaire du vétérinaire :</label>
            <textarea class="form-control" readonly><?= htmlspecialchars($habitat['commentaire']); ?></textarea><br>

        <?php endif; ?>

        <!-- Bouton "Ajouter" : Il doit être placé à la fin -->
        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>

    </form>

    </div>
</section>

<?php $script = '<script src="/assets/javascript/habitat.js"></script>'; ?>

