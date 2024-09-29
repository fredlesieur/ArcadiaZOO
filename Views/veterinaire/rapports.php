<h2>Liste des rapports vétérinaires</h2>

<ul>
    <?php foreach ($rapports as $rapport): ?>
        <li>
            Animal ID: <?= $rapport['animal_id']; ?>, État: <?= $rapport['etat']; ?>, Nourriture: <?= $rapport['nourriture']; ?>, Grammage: <?= $rapport['grammage']; ?>g, Date: <?= $rapport['date_passage']; ?>
        </li>
    <?php endforeach; ?>
</ul>
