<?php
// Définir le fuseau horaire de la France
date_default_timezone_set('Europe/Paris');
$currentDate = date('d-m-Y');
$currentDateTime = date('d-m-Y\TH:i');
?>

<h1 class="container-fluid banner pt-5 pb-5">Modifier le rapport</h1>
<section class="colorSection">
    <div class="mx-auto p-4">
        <form action="/rapport/edit_rapport/<?= $rapport['id'] ?>" method="post">
            <label for="animal_id">Animal :</label>
            <select name="animal_id" id="animal_id">
                <option value="">Sélectionnez un animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal['id']; ?>" 
                        <?= $rapport['animal_id'] == $animal['id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($animal['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <!-- Champs pour les vétérinaires -->
            <?php if ($_SESSION['role'] === 'veterinaire'): ?>
                <label for="etat">État :</label>
                <input type="text" name="etat" id="etat" value="<?= htmlspecialchars($rapport['etat'] ?? ''); ?>"><br>

                <label for="nourriture_preconisee">Nourriture préconisée :</label>
                <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" value="<?= htmlspecialchars($rapport['nourriture_preconisee'] ?? ''); ?>"><br>

                <label for="grammage_preconise">Grammage préconisé :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise" value="<?= htmlspecialchars($rapport['grammage_preconise'] ?? ''); ?>"><br>

                <label for="date_passage">Date de passage :</label>
                <input type="date" name="date_passage" id="date_passage" value="<?= isset($rapport['date_passage']) ? date('d-m-Y', strtotime($rapport['date_passage'])) : $currentDate; ?>"><br>

                <label for="detail_etat">Détail état :</label>
                <input type="text" name="detail_etat" id="detail_etat" value="<?= htmlspecialchars($rapport['detail_etat'] ?? ''); ?>"><br>
            <?php endif; ?>

            <!-- Champs pour les employés -->
            <?php if ($_SESSION['role'] === 'employe'): ?>
                <label for="date_heure">Date et heure passage :</label>
                <input type="datetime-local" name="date_heure" id="date_heure" value="<?= isset($rapport['date_heure']) ? date('d-m-Y\TH:i', strtotime($rapport['date_heure'])) : $currentDateTime; ?>"><br>

                <label for="nourriture_donnee">Nourriture donnée :</label>
                <input type="text" name="nourriture_donnee" id="nourriture_donnee" value="<?= htmlspecialchars($rapport['nourriture_donnee'] ?? ''); ?>"><br>

                <label for="grammage_donne">Quantité donnée :</label>
                <input type="text" name="grammage_donne" id="grammage_donne" value="<?= htmlspecialchars($rapport['grammage_donne'] ?? ''); ?>"><br>

                <!-- Champs en lecture seule pour les recommandations -->
                <label for="nourriture_preconisee">Nourriture préconisée :</label>
                <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" value="<?= htmlspecialchars($rapport['nourriture_preconisee'] ?? ''); ?>" readonly><br>

                <label for="grammage_preconise">Grammage préconisé :</label>
                <input type="text" name="grammage_preconise" id="grammage_preconise" value="<?= htmlspecialchars($rapport['grammage_preconise'] ?? ''); ?>" readonly><br>

                <label for="etat">État :</label>
                <input type="text" name="etat" id="etat" value="<?= htmlspecialchars($rapport['etat'] ?? ''); ?>" readonly><br>
            <?php endif; ?>

            <button type="submit" class="btn warning w-100 mt-2">Modifier</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>

<!-- Inclure le fichier JavaScript -->
<?php $script = '<script src="/assets/javascript/champsPrerempli.js"></script>'; ?>
