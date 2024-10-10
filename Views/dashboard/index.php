<?php $link = '<link rel="stylesheet" href="/assets/css/admin.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5"><?= $title; ?></h1>

<!-- Menu de navigation du dashboard -->
<nav class="dashboard-nav">
    <ul>
        <?php if($_SESSION['role'] && $_SESSION['role'] == 'administrateur'): ?>
            <li><a href="/connexion/addUser">Créer un utilisateur (employé/vétérinaire)</a></li>
            <li><a href="/connexion/listUsers">Liste des utilisateurs</a></li>
            <li><a href="/service/addServ">Créer un service</a></li>
            <li><a href="/service/listServices">Liste des services</a></li>
            <li><a href="/habitats/addHabitat">Créer un habitat</a></li>
            <li><a href="/habitats/listHabitats">Liste des habitats</a></li>
            <li><a href="/animal/addAnimal">Créer un animal</a></li>
            <li><a href="/animal/listAnimals">Liste des animaux</a></li>
            <li><a href="/rapport/liste_rapports">Voir les rapports </a></li><!-- filtre + compteur -->
            <!-- modifier page d accueil -->
        <?php elseif($_SESSION['role'] && $_SESSION['role'] == 'employe'): ?>
            <li><a href="/avis/gererAvis">Gérer les Avis</a></li>
            <li><a href="/service/addServ">Créer un service</a></li>
            <li><a href="/service/listServices">Liste des services</a></li>
            <li><a href="/rapport/liste_rapports">Voir la liste des rapports </a></li>
            <li><a href="/rapport/add_rapport">Ajouter un rapports</a></li>
            <!-- contact par email -->
        <?php elseif($_SESSION['role'] && $_SESSION['role'] == 'veterinaire'): ?>
            <li><a href="/habitats/addHabitat">Créer un commentaire sur un habitat</a></li>
            <li><a href="/habitats/editHabitat">Modifier ou supprimer un commentaire sur un habitat</a></li>
            <li><a href="/habitats/listHabitats">Liste des commentaires sur les habitats</a></li>
            <li><a href="/rapport/liste_rapports">Voir la liste des rapports </a></li>
            <li><a href="/rapport/add_rapport">Ajouter un rapports</a></li>
        <?php endif; ?>
    </ul>
</nav>


