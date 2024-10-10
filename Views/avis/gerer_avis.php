<h1 class="container-fluid banner pt-5 pb-5 mb-0 text-center">Gérer les avis</h1>

<div class="mx-auto p-4">
    <?php foreach ($avisEnAttente as $avis): ?>
        <div class=" avi mx-auto p-4 m-3">
            <h3><?= htmlspecialchars($avis['pseudo']); ?></h3>
            <p><?= htmlspecialchars($avis['comment']); ?></p><br>
            <div class=" d-flex justify-content-center">
                <a href="/avis/validerAvis/<?= $avis['id']; ?>" class="btn success mx-2">Valider</a>
                <a href="/avis/invaliderAvis/<?= $avis['id']; ?>" class="btn danger">Refuser</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>