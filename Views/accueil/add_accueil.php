<h1 class="container-fluid banner pt-5 pb-5">Ajouter un élément à l'accueil</h1>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <form action="/accueil/addAccueil" method="POST" class="ajax" enctype="multipart/form-data">
  
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn success">Ajouter</button>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="action" value="submit_form">
    </form>
</section>

