<?php $link = '<link rel="stylesheet" href="/assets/css/service.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5">Modifier un Service</h1>

<div class="container my-5">
    <!-- Formulaire pour modifier un service -->
    <h2>Modifier un Service</h2>
    <form action="/service/editServ/<?= $services['id'] ?>" method="post" enctype="multipart/form-data">

        <label for="name">Nom du service :</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($services['name']) ?>" required><br>

        <label for="description">Description :</label>
        <textarea class="w-100" name="description" id="description" required><?= htmlspecialchars($services['description']) ?></textarea><br>

        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" onchange="toggleNewCategoryField(this)" required>
            <option value="">Sélectionnez une catégorie</option>
            <option value="restaurant" <?= $services['categorie'] == 'restaurant' ? 'selected' : '' ?>>Restaurant</option>
            <option value="train" <?= $services['categorie'] == 'train' ? 'selected' : '' ?>>Train</option>
            <option value="visite" <?= $services['categorie'] == 'visite' ? 'selected' : '' ?>>Visite</option>
            <option value="autre">Ajouter une nouvelle catégorie</option>
        </select><br>

        <div id="new-category-field" style="display: none;">
            <label for="new-category">Nouvelle catégorie :</label>
            <input type="text" name="new-category" id="new-category" placeholder="Entrez une nouvelle catégorie">
        </div>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image"><br>

        <label for="image2">Image pour service :</label>
        <input type="file" name="image2" id="image2"><br>

        <label for="duree">Durée :</label>
        <input type="text" class="w-100" name="duree" id="duree" value="<?= htmlspecialchars($services['duree']) ?>"><br>

        <label for="tarifs">Tarifs :</label>
        <input type="text" class="w-100" name="tarifs" id="tarifs" value="<?= htmlspecialchars($services['tarifs']) ?>"><br>

        <label for="horaires">Horaires :</label>
        <input type="text" class="w-100" name="horaires" id="horaires" value="<?= htmlspecialchars($services['horaires']) ?>"><br>

        <button type="submit" class="btn btn-success w-100 mt-2">Modifier</button>
    </form>
</div>

<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>