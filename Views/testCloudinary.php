<?php if (isset($uploadResult)): ?>
    <h2>Résultat de l'upload :</h2>
    <pre><?php print_r($uploadResult); ?></pre>
<?php else: ?>
    <p>Aucun résultat d'upload disponible.</p>
<?php endif; ?>