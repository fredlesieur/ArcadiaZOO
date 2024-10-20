<?php $link = '<link rel="stylesheet" href="/assets/css/accueil.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5 mb-0 text-center">ACCUEIL</h1>

<!-- Carrousel Animaux -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($animaux as $index => $animal): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="p-2 img-fluid3" alt="<?= htmlspecialchars($animal['nom']) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

<!-- Présentation du zoo -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <h2>Présentation du zoo</h2>
    <p id="presentation-text" class="d-none d-lg-block p-1 mx-auto">

        Bienvenue au Zoo Arcadia, un lieu d'émerveillement et de découverte niché près de la forêt de Brocéliande, en Bretagne, depuis 1960. Engagé dans une démarche écologique et durable, notre zoo se distingue par son respect de l’environnement et ses efforts pour la préservation de la biodiversité. Le bien-être des animaux et l'épanouissement de la nature sont au cœur de notre mission.

        Sous la direction de José, qui nourrit de grandes ambitions pour l'avenir, le zoo prospère et devient un modèle de réussite. Avec ses quatre espaces uniques, chaque habitat vous transporte dans un écosystème fascinant :

        La Jungle, où les créatures exotiques et majestueuses règnent dans un cadre luxuriant.
        Le Marais, un sanctuaire pour les oiseaux et reptiles rares.
        La Savane, qui évoque la beauté sauvage des grands espaces africains.
        Les Montagnes Rocheuses, un nouvel habitat qui vous plonge dans l'univers des animaux alpins et des hautes altitudes.

        En plus des animaux, nous proposons plusieurs services conçus pour le plaisir des petits et des grands, dont :

        Des restaurants offrant une cuisine savoureuse.
        Des visites guidées pour découvrir nos animaux en détail.
        Des spectacles captivants, dont nos célèbres représentations avec les singes.
        Des espaces de détente pour une pause bien méritée.

        Venez vivre une expérience inoubliable au Zoo Arcadia, où la nature reprend ses droits et chaque visiteur devient un ambassadeur de la protection de notre planète.
    </p>
    <div class="d-flex justify-content-center">
        <button id="show-text-btn" class="button d-lg-none">Afficher le texte</button>
    </div>
</section>

<!-- Animation separation -->
<div class="jaguar-container">
    <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<!-- Liste des habitats --> 

<section class="colorSection p-3 p-lg-4 p-xl-5">
        <div class="row  custom-width">
        <h2 class="text-center mb-4">Les Habitats</h2>
            <?php foreach ($habitats as $index => $habitat): ?>
                <div class="col-12 col-lg-6 mb-5">
                    <div class="card homewhite h-100 shadow-sm">
                        <div class="row no-gutters">
                            <?php if ($index % 2 == 0): ?>
                                <!-- Texte au-dessus, image en-dessous pour les éléments pairs -->
                                <div class="col-12">
                                    <div class="card-body text-center">
                                        <h3 class="card-title"><?= htmlspecialchars($habitat["name"]); ?></h3>
                                        <p class="card-text"><?= htmlspecialchars($habitat["description_courte"]); ?></p>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="custom-card" alt="<?= htmlspecialchars($habitat['name']) ?>">
                                </div>
                            <?php else: ?>
                                <!-- Image au-dessus, texte en-dessous pour les éléments impairs -->
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="custom-card" alt="<?= htmlspecialchars($habitat['name']) ?>">
                                </div>
                                <div class="col-12">
                                    <div class="card-body text-center">
                                        <h3 class="card-title"><?= htmlspecialchars($habitat["name"]); ?></h3>
                                        <p class="card-text"><?= htmlspecialchars($habitat["description_courte"]); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <div class="d-flex justify-content-center custom-gap p-3 p-lg-4 p-xl-5">
        <div class="circle">
            <h3>Nos habitats</h3>
            <a href="/habitats" class="btn btn-primary">Découvrir</a>
        </div>
    </div>
</section>

<!-- Animation separation -->
<div class="jaguar-container">
        <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
    </div>

<!-- Liste des services -->

<section class="colorSection p-3 p-lg-4 p-xl-5">
       
<div class="row custom-width">
    <h2 class="text-center mb-4">Les Services</h2>
        <?php foreach ($accueilModel as $index => $accueil): ?>
            <div class="col-12 col-lg-6 mb-5"> <!-- Chaque carte occupe 50% de la largeur (col-lg-6) -->
                <div class="card homewhite h-100 shadow-sm">
                    <div class="row no-gutters">
                        <?php if ($index % 2 == 0): ?>
                            <!-- Texte au-dessus, image en-dessous pour les éléments pairs -->
                            <div class="col-12">
                                <div class="card-body text-center">
                                    <h3 class="card-title"><?= htmlspecialchars($accueil["name"]); ?></h3>
                                    <p class="card-text"><?= htmlspecialchars($accueil["description"]); ?></p>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <img src="/assets/images/<?= htmlspecialchars($accueil['image']) ?>" class="custom-card" alt="<?= htmlspecialchars($accueil['name']) ?>">
                            </div>
                        <?php else: ?>
                            <!-- Image au-dessus, texte en-dessous pour les éléments impairs -->
                            <div class="col-12 d-flex justify-content-center">
                                <img src="/assets/images/<?= htmlspecialchars($accueil['image']) ?>" class="custom-card" alt="<?= htmlspecialchars($accueil['name']) ?>">
                            </div>
                            <div class="col-12">
                                <div class="card-body text-center">
                                    <h3 class="card-title"><?= htmlspecialchars($accueil["name"]); ?></h3>
                                    <p class="card-text"><?= htmlspecialchars($accueil["description"]); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center custom-gap p-3 p-lg-4 p-xl-5">
        <div class="circle">
            <h3>Nos Services</h3>
            <a href="/service" class="btn btn-primary">Découvrir</a>
        </div>
    </div>
</section>







</section>
<!-- Animation separation -->
    <div class="jaguar-container">
        <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
    </div>

<!-- Avis des visiteurs -->
<section class="colorSection p-3 p-lg-4 p-xl-5">

    <div id="carouselExampleSlidesOnly" class="carousel slide carousel-avis" data-bs-ride="carousel">
        <h2 class="text-center mb-3">Les avis des visiteurs</h2>
        <div class="carousel-inner">
            <?php if (isset($Avis) && !empty($Avis)): ?>
                <?php
                $avisChunks = array_chunk($Avis, 3);
                $activeClass = 'active';
                foreach ($avisChunks as $avisGroup): ?>
                    <div class="carousel-item <?= $activeClass; ?>">
                        <div class="row justify-content-center m-auto w-75">
                            <?php foreach ($avisGroup as $avis): ?>
                                <div class="col-12 col-md-4 mb-3 mt-3">
                                    <div class="card homewhite mb-3">
                                        <div class="card-body text-center overflow-auto">
                                            <h4 class="card-title"><?= htmlspecialchars($avis['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h4>
                                            <p class="card-text"><?= htmlspecialchars($avis['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php $activeClass = ''; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun avis pour le moment.</p>
            <?php endif; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

<!-- formulaire pour laisser un avis -->
<section>
    <div class="container d-flex justify-content-center my-5 custom-width">
        <div class="container p-4 ">
            <h2 class="text-center mb-3">Laisser un avis</h2>
            <form action="/avis/addAvis" method="POST">
                <div class="mb-3 text-center">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                </div>
                <div class="mb-3 text-center">
                    <label for="comment" class="form-label">Votre avis</label>
                    <textarea class="form-control" id="comment" name="comment" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn button w-100">Envoyer</button>
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            </form>

            <?php if (isset($_SESSION['success'])): ?>
                <div id="message-success" class="alert alert-success">
                    <?= $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div id="message-error" class="alert alert-danger">
                    <?= $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- boutons direction page contact -->

<div class="d-flex justify-content-center custom-gap p-3 p-lg-4 p-xl-5">
    <div class="circle">
        <h3>Nous contacter</h3>
        <a href="/contact" class="btn btn-primary">Nous contacter</a>
    </div>
</div>

<?php
$script = '<script src="/assets/javascript/jaguar.js"></script>';
$script .= '<script src="/assets/javascript/accueil.js"></script>';
echo $script;
?>

