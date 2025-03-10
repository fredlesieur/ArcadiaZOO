<h1 class="container-fluid banner pt-5 pb-5">Ajouter un horaire</h1>
 
<section class="colorSection">
    <div class="container my-5">

<form action="/contact/addHoraire" method="post" class="ajax" enctype="multipart/form-data">
    <label for="saison">Saison :</label>
    <input type="text" id="saison" name="saison" required>

    <label for="semaine">Semaine :</label>
    <input type="text" id="semaine" name="semaine" required>

    <label for="week_end">Week-end :</label>
    <input type="text" id="week_end" name="week_end" required>

    <button type="submit" class="btn sucess w-100 mt-2">Ajouter</button>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="hidden" name="action" value="submit_form">
</form>

