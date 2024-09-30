<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5">Gérer les Services</h1>

<div class="container my-5">
    <!-- Formulaire pour ajouter un service -->
    <h2>Ajouter un Service</h2>
    <form action="/employe/ajouterService" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= isset($service['id']) ? $service['id'] : '' ?>">
        
        <label for="name">Nom du service :</label>
        <input type="text" name="name" id="name" value="<?= isset($service['name']) ? $service['name'] : '' ?>" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required><?= isset($service['description']) ? $service['description'] : '' ?></textarea><br>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image"><br>

        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" required>
            <option value="restaurant" <?= isset($service['categorie']) && $service['categorie'] == 'restaurant' ? 'selected' : '' ?>>Restaurant</option>
            <option value="train" <?= isset($service['categorie']) && $service['categorie'] == 'train' ? 'selected' : '' ?>>Train</option>
            <option value="visite" <?= isset($service['categorie']) && $service['categorie'] == 'visite' ? 'selected' : '' ?>>Visite</option>
        </select><br>

        <label for="duree">Durée :</label>
        <input type="text" name="duree" id="duree" value="<?= isset($service['duree']) ? $service['duree'] : '' ?>" required><br>

        <label for="tarifs">Tarifs :</label>
        <input type="text" name="tarifs" id="tarifs" value="<?= isset($service['tarifs']) ? $service['tarifs'] : '' ?>" required><br>

        <label for="horaires">Horaires :</label>
        <input type="text" name="horaires" id="horaires" value="<?= isset($service['horaires']) ? $service['horaires'] : '' ?>" required><br>

        <button type="submit" class="btn btn-success w-100">Ajouter</button>
    </form>
</div>

<div class="container my-5">
    <!-- Liste des services existants avec boutons de modification et suppression -->
    <h2>Liste des Services</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= htmlspecialchars($service['name']); ?></td>
                    <td><?= htmlspecialchars($service['categorie']); ?></td>
                    <td>
                        <a href="/employe/modifierService/<?= $service['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a href="/employe/supprimerService/<?= $service['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
