<?php $link = '<link rel="stylesheet" href="/assets/css/veterinaire.css">' ?>

<div class="mx-auto p-4">
    <h2 class="text-center">Rapports Vétérinaire</h2>
    <ul>
        <?php foreach ($rapports as $rapport): ?>
            <li>
                Animal ID: <?= $rapport['animal_id']; ?>, État: <?= $rapport['etat']; ?>, Nourriture:
                <?= $rapport['nourriture']; ?>, Grammage: <?= $rapport['grammage']; ?>g, Date:
                <?= $rapport['date_passage']; ?>, Détail État: <?= $rapport['detail_etat']; ?> 
            </li>
        <?php endforeach; ?>
    </ul>
</div>
