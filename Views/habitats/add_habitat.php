<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5">Ajouter un Habitat</h1>
<section class="colorSection">
<h2>Commentaire vétérinaire sur l'habitat </label></h2>
    <div class="container my-5">

    <form action="/habitats/addHabitat" method="post" enctype="multipart/form-data">
    <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'administrateur') : ?>
       
        <label for="id_habitat">Habitat :</label>
                <select name="id_habitat" id="id_habitat" required>
                    <option value="">Sélectionner un habitat</option>
                    <?php foreach ($habitats as $habitat): ?>
                        <option value="<?= htmlspecialchars($habitat['id']); ?>"><?= htmlspecialchars($habitat['name']); ?></option>
                    <?php endforeach; ?>
                </select><br>

        <textarea class="form-control" name="commentaire" id="commentaire" ></textarea><br>
        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>

        
        <?php endif; ?>
        <?php if ($_SESSION['role'] === 'administrateur') : ?>

            <label for="description">Description </label>
            <textarea class="form-control" name="description" id="description" required></textarea><br>

            <label for="image">Image caroussel </label>
            <input type="file" class="form-control" name="image" id="image" required><br>

            <label for="image2">Image de présentaion habitats </label>
            <input type="file" class="form-control" name="image2" id="image2"><br>

            <label for="image3">Image caroussel </label>
            <input type="file" class="form-control" name="image3" id="image3"><br>

            <label for="description_courte">Description courte </label>
            <textarea class="form-control" name="description_courte" id="description_courte"></textarea><br>
    
         
        </form>
        <?php endif; ?>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/habitat.js"></script>'; ?>