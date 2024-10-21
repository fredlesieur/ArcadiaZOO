<h1 class="container-fluid banner pt-5 pb-5">Ajouter un Service</h1>

<section class="colorSection">
    <div class="container my-5">
        <form action="/service/addServ" method="post" enctype="multipart/form-data">

            <!-- Nom du service -->
            <label for="name">Nom du service :</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom du service" required><br>

            <!-- Description du service -->
            <label for="description">Description :</label>
            <textarea class="form-control w-100" name="description" id="description" placeholder="Description du service" required></textarea><br>

            <!-- Catégorie -->
            <label for="categorie">Catégorie :</label>
            <select class="form-control" name="categorie" id="categorie" required>
                <option value="">Sélectionnez une catégorie</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category) ?>">
                        <?= htmlspecialchars(ucfirst($category)) ?>
                    </option>
                <?php endforeach; ?>
                <option value="autre">Ajouter une nouvelle catégorie</option>
            </select><br>

            <!-- Champ pour nouvelle catégorie (caché par défaut) -->
            <div id="new-category-field" style="display: none;">
                <label for="new-category">Nouvelle catégorie :</label>
                <input type="text" class="form-control" name="new-category" id="new-category" placeholder="Entrez une nouvelle catégorie">
            </div>

            <!-- Image pour carrousel -->
            <label for="image">Image pour carrousel :</label>
            <input type="file" class="form-control" name="image" id="image" loading="lazy"><br>

            <!-- Image pour service -->
            <label for="image2">Image pour service :</label>
            <input type="file" class="form-control" name="image2" id="image2" ><br>

            <!-- Durée -->
            <label for="duree">Durée :</label>
            <input type="text" class="form-control" name="duree" id="duree" placeholder="Durée du service"><br>

            <!-- Tarifs -->
            <label for="tarifs">Tarifs :</label>
            <input type="text" class="form-control" name="tarifs" id="tarifs" placeholder="Tarifs du service"><br>

            <!-- Horaires -->
            <label for="horaires">Horaires :</label>
            <input type="text" class="form-control" name="horaires" id="horaires" placeholder="Horaires du service"><br>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn warning w-100 mt-2">Ajouter</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>

<!-- Script pour gérer l'affichage du champ "Nouvelle catégorie" -->
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>



