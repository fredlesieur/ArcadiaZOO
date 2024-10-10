<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">' ?>


<div class="mx-auto p-4">
    <h2 class="text-center">Habitats</h2>
    <form action="/habitats/addHabitat" method="post">
    
    <?php if ($_SESSION['role'] === 'veterinaire'|| $_SESSION['role'] === 'administrateur') : ?>
    
        <label for="commentaire">commentaire Habitat vétérinaire : </label><br>
        <textarea type="textarea" name="commentaire" id="commentaire"></textarea><br>
    <?php endif; ?>

    <?php if ($_SESSION['role'] === 'administrateur') : ?>
        
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name"><br>

        <label for="description">Description :</label>
        <textarea type="text" name="description" id="description"></textarea><br>

        <label for="description_courte">Description courte: </label>
        <textarea type="text" name="description_courte" id="description_courte"></textarea><br>

        <label for="image">Image</label>
        <input type="file" name="image" id="image"><br>

        <label for="image2">Image</label>
        <input type="file" name="image2" id="image2"><br>

        <label for="image3">Image</label>
        <input type="file" name="image3" id="image3"><br>

    
        <label for="user_id">Utilisateurs :</label>
        <input type="number" name="id_habitat" id="id_habitat">

        <button type="submit" class="btn btn-success w-100 mt-2">Ajouter</button>
    </form>
</div>
<?php endif; ?>