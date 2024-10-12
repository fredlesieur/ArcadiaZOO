<?php
// Définir le fuseau horaire de la France
date_default_timezone_set('Europe/Paris');
$currentDate = date('Y-m-d');
$currentDateTime = date('Y-m-d\TH:i');
?>

<h1 class="container-fluid banner pt-5 pb-5">Modifier rapport</h1>
<section class="colorSection">
    <div class="mx-auto p-4">
        <form action="/rapport/edit_rapport/<?= $rapport['id'] ?>" method="post">
            <label for="animal_id">Animal :</label>
            <select name="animal_id" id="animal_id" onchange="this.form.submit()">
                <option value="">Sélectionnez un animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal['id']; ?>" 
                        <?= (isset($_POST['animal_id']) && $_POST['animal_id'] == $animal['id']) || 
                            (!isset($_POST['animal_id']) && $rapport['animal_id'] == $animal['id']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($animal['nom'], ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'veterinaire') : ?>
            <label for="etat">État :</label>
            <input type="text" name="etat" id="etat" value="<?= htmlspecialchars($rapport['etat'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <label for="date_passage">Date :</label>
            <input type="date" name="date_passage" id="date_passage" class="form-control" 
                   value="<?= isset($rapport['date_passage']) ? date('Y-m-d', strtotime($rapport['date_passage'])) : date('d-m-Y'); ?>" required><br>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'employe') : ?>
            <label for="detail_etat">Détail de l'état :</label>
            <input type="text" name="detail_etat" id="detail_etat" value="<?= htmlspecialchars($rapport['detail_etat'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <label for="date_heure">Date et heure :</label>
            <input type="datetime-local" name="date_heure" id="date_heure" class="form-control" 
                   value="<?= isset($rapport['date_heure']) ? date('Y-m-d\TH:i', strtotime($rapport['date_heure'])) : date('d-m-Y\TH:i'); ?>" required><br>
                   <?php endif; ?>
            
            <label for="nourriture_preconisee">Nourriture préconisée :</label>
            <input type="text" name="nourriture_preconisee" id="nourriture_preconisee" 
                   value="<?= htmlspecialchars($rapport['nourriture_preconisee'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <label for="nourriture_donnee">Nourriture donnée :</label>
            <input type="text" name="nourriture_donnee" id="nourriture_donnee" 
                   value="<?= htmlspecialchars($rapport['nourriture_donnee'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <label for="grammage_preconise">Grammage préconisé :</label>
            <input type="text" name="grammage_preconise" id="grammage_preconise" 
                   value="<?= htmlspecialchars($rapport['grammage_preconise'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <label for="grammage_donne">Quantité donnée :</label>
            <input type="text" name="grammage_donne" id="grammage_donne" 
                   value="<?= htmlspecialchars($rapport['grammage_donne'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"><br>

            <button type="submit" class="btn warning w-100 mt-2">Modifier</button>
        </form>
    </div>
</section>


