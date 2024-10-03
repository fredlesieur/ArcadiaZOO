<?php $link = '<link rel="stylesheet" href="/assets/css/employe.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5"><?= $title; ?></h1>

<!-- Menu de navigation du dashboard Employé -->
<nav class="employee-nav">
    <ul>
        <li><a href="/employe/gererAvis">Gérer les Avis</a></li>
        <li><a href="/employe/gererNourriture">Gérer la Nourriture des Animaux</a></li>
        <li><a href="/employe/gererServices">Gérer les services</a></li>
        <li><a href="/employe/listeRapport">liste des Rapports</a></li>
        <!-- D'autres sections spécifiques aux employés peuvent être ajoutées ici -->
    </ul>
</nav>
