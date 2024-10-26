<h1 class="container-fluid banner pt-5 pb-5">Modifier un Horaire</h1>
 <!-- Vérifier s'il y a des messages de succès ou d'erreur -->
 <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?>

<section class="colorSection">
    <div class="container my-5">
        <form action="/contact/editHoraire/<?= $horaire['_id']; ?>" method="POST">
            <label for="saison">Saison</label>
            <input type="text" name="saison" id="saison" value="<?= htmlspecialchars($horaire['saison']); ?>" required>

            <label for="semaine">Semaine</label>
            <input type="text" name="semaine" id="semaine" value="<?= htmlspecialchars($horaire['semaine']); ?>" required>

            <label for="week_end">Week-end</label>
            <input type="text" name="week_end" id="week_end" value="<?= htmlspecialchars($horaire['week_end']); ?>" required>

            <!-- Champ caché pour envoyer l'ID de l'horaire -->
            <input type="hidden" name="id" value="<?= $horaire['_id']; ?>">

            <button type="submit" class="btn warning w-100 mt-2">Modifier</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>

