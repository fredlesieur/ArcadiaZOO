<?php
// Définir le fuseau horaire de la France
date_default_timezone_set('Europe/Paris');
?>
    <h1 class="container-fluid banner pt-5 pb-5 mb-0 text-center">Ajouter un rapport</h1>
    <section class="colorSection">
    <div class="mx-auto p-4">
        <form action="/rapport/add_rapport" method="post">

            <label for="animal_id">Animal :</label>
            <select name="animal_id" id="animal_id">
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal['id']; ?>"><?= $animal['nom']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="etat">etat :</label>
            <input type="text" name="etat" id="etat"><br>

            <label for="nourriture">Nourriture donnée :</label>
            <input type="text" name="nourriture" id="nourriture"><br>

            <label for="detail_etat">detail etat :</label>
            <input type="text" name="detail_etat" id="detail_etat"><br>

            <?php if ($_SESSION['role'] === 'employe') : ?>
                <label for="grammage">Quantité donnée :</label>
                <input type="text" name="grammage" id="grammage"><br>

                <label for="date_heure">Date et heure :</label>
                <input type="datetime-local" name="date_heure" id="date_heure" class="form-control">
            <?php endif; ?>


            <?php if ($_SESSION['role'] === 'veterinaire') : ?>
                <label for="date_passage">Date :</label>
                <input type="date" name="date_passage" id="date_passage" class="form-control">

                <label for="grammage_preconise">Grammage préconisé :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise"><br>
            <?php endif; ?>

            <button type="submit" class="btn success w-100 mt-2">Ajouter</button>
        </form>
    </div>
</section>