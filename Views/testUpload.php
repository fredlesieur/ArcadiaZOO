<h1>Résultat de l'Upload</h1>

<?php if (isset($uploadResult['error'])): ?>
    <div style="color: red;">
        <strong>Erreur :</strong> <?php echo htmlspecialchars($uploadResult['error']); ?>
    </div>
<?php else: ?>
    <div style="color: green;">
        <strong>Upload réussi :</strong>
        <pre><?php print_r($uploadResult); ?></pre>
    </div>
<?php endif; ?>
