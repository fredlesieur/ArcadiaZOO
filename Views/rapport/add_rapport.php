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
            <select name="animal_id" id="animal_id">
                <option value="">Sélectionnez un animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal['id']; ?>" <?= isset($_POST['animal_id']) && $_POST['animal_id'] == $animal['id'] ? 'selected' : ''; ?>>
                        <?= $animal['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <!-- Champs réservés aux vétérinaires -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire') : ?>
                <label for="etat">État :</label>
                <input type="text" name="etat" id="etat" value="<?= htmlspecialchars($_POST['etat'] ?? ''); ?>"><br>

                <label for="date_passage">Date passage vétérinaire :</label>
                <input type="date" name="date_passage" id="date_passage" class="form-control" value="<?= htmlspecialchars($_POST['date_passage'] ?? ''); ?>"><br>
            <?php endif; ?>

            <!-- Champs réservés aux employés -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'employe') : ?>
                <label for="date_heure">Date et heure passage employé :</label>
                <input type="datetime-local" name="date_heure" id="date_heure" class="form-control" value="<?= htmlspecialchars($_POST['date_heure'] ?? ''); ?>"><br>
            <?php endif; ?>

            <label for="detail_etat">Détail de l'état :</label>
            <input type="text" name="detail_etat" id="detail_etat" value="<?= htmlspecialchars($_POST['detail_etat'] ?? ''); ?>"><br>

            <!-- Pour l'employé : rendre les champs préconisés non modifiables -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'employe') : ?>
                <label for="nourriture_preconisee">Nourriture préconisée :</label>
                <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" value="<?= htmlspecialchars($nourriturePreconisee ?? ''); ?>" disabled><br>

                <label for="grammage_preconise">Quantité préconisée :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise" value="<?= htmlspecialchars($grammagePreconise ?? ''); ?>" disabled><br>
            <?php endif; ?>

            <!-- Pour le vétérinaire : rendre les champs donnés non modifiables -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire') : ?>
                <label for="grammage_donne">Quantité donnée :</label>
                <input type="text" name="grammage_donne" id="grammage_donne" value="<?= htmlspecialchars($_POST['grammage_donne'] ?? ''); ?>" disabled><br>

                <label for="nourriture_donnee">Nourriture donnée :</label>
                <input type="text" name="nourriture_donnee" id="nourriture_donnee" value="<?= htmlspecialchars($_POST['nourriture_donnee'] ?? ''); ?>" disabled><br>
            <?php endif; ?>

            <button type="submit" name="submit" class="btn success w-100 mt-2">Ajouter</button>
        </form>
    </div>
</section>
<!-- Inclure le fichier JavaScript -->
<?php $script = '<script src="/assets/javascript/champsPrerempli.js"></script>'; ?>

