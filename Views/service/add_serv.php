<h1 class="container-fluid banner pt-5 pb-5">Ajouter un Service</h1>
<section class="colorSection">
    <div class="container my-5">
        <form action="/service/addServ" method="post" enctype="multipart/form-data">
            <label for="name">Nom du service :</label>
            <input type="text" class="form-control" name="name" id="name" required><br>

            <label for="description">Description :</label>
            <textarea class="form-control" name="description" id="description" required></textarea><br>

            <label for="categorie">Catégorie :</label>
            <select class="form-control" name="categorie" id="categorie" onchange="toggleNewCategoryField(this)" required>
                <option value="">Sélectionnez une catégorie</option>
                <option value="restaurant">Restaurant</option>
                <option value="train">Train</option>
                <option value="visite">Visite</option>
                <option value="autre">Ajouter une nouvelle catégorie</option>
            </select><br>

            <div id="new-category-field" style="display: none;">
                <label for="new-category">Nouvelle catégorie :</label>
                <input type="text" class="form-control" name="new-category" id="new-category" placeholder="Entrez une nouvelle catégorie">
            </div>

            <label for="image">Image :</label>
            <input type="file" class="form-control" name="image" id="image"><br>

            <label for="image2">Image pour service :</label>
            <input type="file" class="form-control" name="image2" id="image2"><br>

            <label for="duree">Durée :</label>
            <input type="text" class="form-control" name="duree" id="duree"><br>

            <label for="tarifs">Tarifs :</label>
            <input type="text" class="form-control" name="tarifs" id="tarifs"><br>

            <label for="horaires">Horaires :</label>
            <input type="text" class="form-control" name="horaires" id="horaires"><br>

            <button type="submit" class="btn success w-100 mt-2">Ajouter</button>
        </form>
    </div>
</section>
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>