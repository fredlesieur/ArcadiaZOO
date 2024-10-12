<h1 class="container-fluid banner pt-5 pb-5">Modifier un Service</h1>
<section class="colorSection">
    <div class="container my-5">
        <form action="/service/editServ/<?= $service['id'] ?>" method="post" enctype="multipart/form-data">

            <label for="name">Nom du service :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($service['name']) ?>" required><br>

            <label for="description">Description :</label>
            <textarea class="form-control w-100" name="description" id="description" required><?= htmlspecialchars($service['description']) ?></textarea><br>

            <label for="categorie">Catégorie :</label>
            <select class="form-control" name="categorie" id="categorie" required>
                <option value="">Sélectionnez une catégorie</option>
                <?php foreach ($allCategories as $category): ?>
                    <option value="<?= htmlspecialchars($category) ?>" <?= $service['categorie'] == $category ? 'selected' : '' ?>>
                        <?= htmlspecialchars(ucfirst($category)) ?>
                    </option>
                <?php endforeach; ?>
                <option value="autre">Ajouter une nouvelle catégorie</option>
            </select><br>

            <div id="new-category-field" style="display: none;">
                <label for="new-category">Nouvelle catégorie :</label>
                <input type="text" class="form-control" name="new-category" id="new-category" placeholder="Entrez une nouvelle catégorie">
            </div>

            <label for="image">Image pour carrousel :</label>
            <input type="file" class="form-control" name="image" id="image"><br>

            <label for="image2">Image pour service :</label>
            <input type="file" class="form-control" name="image2" id="image2"><br>

            <label for="duree">Durée :</label>
            <input type="text" class="form-control" name="duree" id="duree" value="<?= htmlspecialchars($service['duree']) ?>"><br>

            <label for="tarifs">Tarifs :</label>
            <input type="text" class="form-control" name="tarifs" id="tarifs" value="<?= htmlspecialchars($service['tarifs']) ?>"><br>

            <label for="horaires">Horaires :</label>
            <input type="text" class="form-control" name="horaires" id="horaires" value="<?= htmlspecialchars($service['horaires']) ?>"><br>

            <button type="submit" class="btn warning w-100 mt-2">Modifier</button>
        </form>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>
