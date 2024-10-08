<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5">Modifier les Services</h1>
<form action="/employe/modifierService/<?= $service['id'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= isset($service['id']) ? $service['id'] : '' ?>">

    <label for="name">Nom du service :</label>
    <input type="text" name="name" id="name" value="<?= isset($service['name']) ? $service['name'] : '' ?>" required><br>

    <label for="description">Description :</label>
    <textarea class="w-100" name="description" id="description" required><?= isset($service['description']) ? $service['description'] : '' ?></textarea><br>

    <label for="image">Image pour caroussel :</label>
    <input type="file" name="image" id="image"><br>

    <label for="image2">Image pour service:</label>
    <input type="file" name="image2" id="image2"><br>

    <label for="categorie">Catégorie :</label>
    <select name="categorie" id="categorie" onchange="toggleNewCategoryField(this)" required>
        <option value="">Sélectionnez une catégorie</option>
        <option value="restaurant" <?= isset($service['categorie']) && $service['categorie'] == 'restaurant' ? 'selected' : '' ?>>Restaurant</option>
        <option value="train" <?= isset($service['categorie']) && $service['categorie'] == 'train' ? 'selected' : '' ?>>Train</option>
        <option value="visite" <?= isset($service['categorie']) && $service['categorie'] == 'visite' ? 'selected' : '' ?>>Visite</option>
        <option value="autre">Ajouter une nouvelle catégorie</option>
    </select><br>

    <!-- Champ pour ajouter une nouvelle catégorie -->
    <div id="new-category-field" style="display: none;">
        <label for="new-category">Nouvelle catégorie :</label>
        <input type="text" name="new-category" id="new-category" placeholder="Entrez une nouvelle catégorie">
    </div>

    <label for="duree">Durée :</label>
    <input type="text" name="duree" id="duree" value="<?= isset($service['duree']) ? $service['duree'] : '' ?>" required><br>

    <label for="tarifs">Tarifs :</label>
    <input type="text" name="tarifs" id="tarifs" value="<?= isset($service['tarifs']) ? $service['tarifs'] : '' ?>" required><br>

    <label for="horaires">Horaires :</label>
    <input type="text" name="horaires" id="horaires" value="<?= isset($service['horaires']) ? $service['horaires'] : '' ?>" required><br>

    <button type="submit" class="btn btn-success w-100">Modifier</button>
</form>
</div>

<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>