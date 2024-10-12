<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5">Ajouter un Habitat</h1>
<section class="colorSection">
    <div class="container my-5">
    <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'administrateur') : ?>
        <h2>Commentaire vétérinaire sur l habitat :</label></h2>
        <textarea class="form-control" name="commentaire" id="commentaire" ></textarea><br>
        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
        <?php endif; ?>
        <?php if ($_SESSION['role'] === 'administrateur') : ?>

        <form action="/habitats/addHabitat" method="post" enctype="multipart/form-data">
            <label for="name">Nom de l'habitat :</label>
            <input type="text" class="form-control" name="name" id="name" required><br>

            <label for="description">Description :</label>
            <textarea class="form-control" name="description" id="description" required></textarea><br>

            <label for="image">Image caroussel :</label>
            <input type="file" class="form-control" name="image" id="image" required><br>

            <label for="image2">Image de présentaion habitats :</label>
            <input type="file" class="form-control" name="image2" id="image2"><br>

            <label for="image3">Image caroussel :</label>
            <input type="file" class="form-control" name="image3" id="image3"><br>

            <label for="description_courte">Description courte :</label>
            <textarea class="form-control" name="description_courte" id="description_courte"></textarea><br>
    
        </form>
        <?php endif; ?>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/habitat.js"></script>'; ?>