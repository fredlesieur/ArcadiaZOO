<?php $link = '<link rel="stylesheet" href="/assets/css/admin.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5"><?= $title; ?></h1>

<!-- Menu de navigation du dashboard -->
<nav class="dashboard-nav">
    <ul>
        <li><a href="/admin/creerUtilisateur">Créer un utilisateur (employé/vétérinaire)</a></li>
        <li><a href="/admin/gererServices">Gérer les services</a></li>
        <li><a href="/admin/gererHabitats">Gérer les habitats</a></li>
        <li><a href="/admin/gererAnimaux">Gérer les animaux</a></li>
        <li><a href="/admin/voirRapportsVeterinaires">Voir les rapports vétérinaires</a></li>
        <!-- D'autres sections peuvent être ajoutées ici -->
    </ul>
</nav>


