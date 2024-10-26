<h1 class="container-fluid banner pt-5 pb-5">Ajouter un horaire</h1>
 <!-- Vérifier s'il y a des messages de succès ou d'erreur -->
 <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?>

<section class="colorSection">
    <div class="container my-5">

<form action="/contact/addHoraire" method="post" enctype="multipart/form-data">
    <label for="saison">Saison :</label>
    <input type="text" id="saison" name="saison" required>

    <label for="semaine">Semaine :</label>
    <input type="text" id="semaine" name="semaine" required>

    <label for="week_end">Week-end :</label>
    <input type="text" id="week_end" name="week_end" required>

    <button type="submit" class="btn sucess w-100 mt-2">Ajouter</button>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
</form>

