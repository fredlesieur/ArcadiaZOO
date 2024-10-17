<h1 class="container-fluid banner pt-5 pb-5"><?= $title; ?></h1>
<section class="colorSection">

    <!-- Menu de navigation du dashboard -->
    <nav class="dashboard-nav">
        <ul>
            <?php if ($_SESSION['role'] && $_SESSION['role'] == 'administrateur'): ?>
                <li><a class="btn button w-50" href="/connexion/addUser">Créer un utilisateur</a></li>
                <li><a class="btn button w-50" href="/connexion/listUsers">Liste des utilisateurs</a></li>
                <li><a class="btn button w-50" href="/accueil/listAccueils">Eléments de l'accueil</a></li>
                <li><a class="btn button w-50" href="/accueil/addAccueil">Ajouter un élément à l'accueil</a></li>
                <li><a class="btn button w-50" href="/service/addServ">Créer un service</a></li>
                <li><a class="btn button w-50" href="/service/listServices">Liste des services</a></li>
                <li><a class="btn button w-50" href="/habitats/addHabitat">Créer un habitat</a></li>
                <li><a class="btn button w-50" href="/habitats/listHabitats">Liste des habitats</a></li>
                <li><a class="btn button w-50" href="/animal/addAnimal">Créer un animal</a></li>
                <li><a class="btn button w-50" href="/animal/listAnimals">Liste des animaux</a></li>
                <li><a class="btn button w-50" href="/rapport/liste_rapports">Voir les rapports </a></li>
                <li><a class="btn button w-50" href="/contact/listHoraires">liste des horaires </a></li>
                <li><a class="btn button w-50" href="/contact/addHoraire">Créer un horaire</a></li>
            <?php elseif ($_SESSION['role'] && $_SESSION['role'] == 'employe'): ?>
                <li><a class="btn button w-50" href="/avis/gererAvis">Gérer les Avis</a></li>
                <li><a class="btn button w-50" href="/service/addServ">Créer un service</a></li>
                <li><a class="btn button w-50" href="/service/listServices">Liste des services</a></li>
                <li><a class="btn button w-50" href="/rapport/liste_rapports">Voir la liste des rapports </a></li>
                <li><a class="btn button w-50" href="/rapport/add_rapport">Ajouter un rapports</a></li>
                <li><a class="btn button w-50" href="/habitats/listHabitats">Liste des commentaires sur les habitats</a>
                
            <?php elseif ($_SESSION['role'] && $_SESSION['role'] == 'veterinaire'): ?>
                <li><a class="btn button w-50" href="/habitats/addHabitat">Créer un commentaire sur un habitat</a></li>
                <li><a class="btn button w-50" href="/habitats/listHabitats">Liste des commentaires sur les habitats</a></li>
                <li><a class="btn button w-50" href="/rapport/liste_rapports">Voir la liste des rapports </a></li>
                <li><a class="btn button w-50" href="/rapport/add_rapport">Ajouter un rapports</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</section>