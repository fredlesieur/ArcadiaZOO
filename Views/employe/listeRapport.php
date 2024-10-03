<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>
<br><h2>Liste des Rapports de Nourrissage</h2><br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="align-content-center">Employé</th>  <!-- Nom de l'employé -->
            <th class="align-content-center">Animal</th>
            <th class="align-content-center">Nourriture</th>
            <th class="align-content-center">Quantité</th>
            <th class="align-content-center">Date de passage</th>
            <th class="align-content-center">Observations</th>
            <th class="align-content-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rapports as $rapport): ?>
            <tr>
                <td class="align-content-center"><?= htmlspecialchars($rapport['nom_employe']); ?></td> <!-- Affichage du nom de l'employé -->
                <td class="align-content-center"><?= htmlspecialchars($rapport['nom_animal']); ?></td>
                <td class="align-content-center"><?= htmlspecialchars($rapport['nourriture']); ?></td>
                <td class="align-content-center"><?= htmlspecialchars($rapport['quantite']); ?></td>
                <td class="align-content-center"><?= date('d/m/Y H:i', strtotime($rapport['date'])); ?></td> <!-- Date formatée -->
                <td class="align-content-center"><?= htmlspecialchars($rapport['observations']); ?></td>
                <td class="align-content-center">
                    <a href="/employe/modifierRapport/<?= $rapport['id']; ?>" class="btn btn-warning">Modifier</a>
                    <a href="/employe/supprimerRapport/<?= $rapport['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
