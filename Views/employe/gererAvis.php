<h2>Gestion des avis en attente</h2>
<?php foreach ($avisEnAttente as $avis): ?>
    <div>
        <h3><?= htmlspecialchars($avis['pseudo']); ?></h3>
        <p><?= htmlspecialchars($avis['comment']); ?></p>
        <a href="/employe/validerAvis/<?= $avis['id']; ?>" class="btn btn-success">Valider</a>
        <a href="/employe/invaliderAvis/<?= $avis['id']; ?>" class="btn btn-danger">Invalider</a>
    </div>
<?php endforeach; ?>
