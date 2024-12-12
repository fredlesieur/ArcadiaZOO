<?php
// Définir le fuseau horaire de la France
date_default_timezone_set('Europe/Paris');
$currentDate = date('d-m-Y');
$currentDateTime = date('d-m-Y\TH:i');
?>

<h1 class="container-fluid banner pt-5 pb-5 mb-0 text-center">Ajouter un rapport</h1>
<section class="colorSection">
    <div class="mx-auto p-4">

        <!-- Affichage du message de session -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <form action="/rapport/add_rapport" method="post">
            <label for="animal_id">Animal :</label>
            <select name="animal_id" id="animal_id" required>
                <option value="">Sélectionnez un animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal['id']; ?>"><?= $animal['nom']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <!-- Champs pour les vétérinaires -->
            <?php if ($_SESSION['role'] === 'veterinaire'): ?>
                <label for="etat">État :</label>
                <input type="text" name="etat" id="etat" required><br>

                <label for="nourriture_preconisee">Nourriture préconisée :</label>
                <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" required><br>

                <label for="grammage_preconise">Grammage préconisé :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise" required><br>

                <label for="date_passage">Date de passage :</label>
                <input type="date" name="date_passage" id="date_passage" value="<?= $currentDate; ?>" required><br>

                <label for="detail_etat">Détail état :</label>
                <input type="text" name="detail_etat" id="detail_etat" required><br>
            <?php endif; ?>

            <!-- Champs pour les employés -->
            <?php if ($_SESSION['role'] === 'employe'): ?>
                <label for="date_heure">Date et heure passage :</label>
                <input type="datetime-local" name="date_heure" id="date_heure" value="<?= $currentDateTime; ?>" required><br>

                <label for="nourriture_donnee">Nourriture donnée :</label>
                <input type="text" name="nourriture_donnee" id="nourriture_donnee" required><br>

                <label for="grammage_donne">Quantité donnée :</label>
                <input type="text" name="grammage_donne" id="grammage_donne" required><br>

                <!-- Champs préconisés pour afficher les recommandations du vétérinaire -->
                <label for="nourriture_preconisee">Nourriture préconisée :</label>
                <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" readonly><br>

                <label for="grammage_preconise">Grammage préconisé :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise" readonly><br>

                <label for="detail_etat">Détail état :</label>
                <input type="text" name="detail_etat" id="detail_etat" readonly><br>
            <?php endif; ?>

            <button type="submit" name="submit" class="btn success w-100 mt-2">Ajouter</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/champsPrerempli.js"></script>'; ?>
