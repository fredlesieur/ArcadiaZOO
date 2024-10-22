<h1 class="container-fluid banner pt-5 pb-5 mb-0">SERVICES</h1>

<!-- Carrousel Section -->
<section class="colorSection2 p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <?php if (isset($services) && !empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun service disponible.</p>
            <?php endif; ?>
        </div>

        <!-- Boutons Précédent et Suivant -->
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

<!-- Vérifie s'il y a des services classés par catégorie -->
<?php if (!empty($servicesByCategory)): ?>
    <?php foreach ($servicesByCategory as $category => $services): ?>
        <?php
        // Définir les couleurs de fond et des cartes en fonction de la catégorie
        switch ($category) {
            case 'restaurant':
                $sectionBgClass = 'colorWhite'; // Fond blanc pour restaurant
                $cardBgClass = 'colorBeige';    // Cartes beige pour restaurant
                break;
            case 'train':
                $sectionBgClass = 'colorBeige'; // Fond beige pour train
                $cardBgClass = 'colorWhite';    // Cartes blanches pour train
                break;
            case 'visite':
                $sectionBgClass = 'colorWhite'; // Fond bleu clair pour visite
                $cardBgClass = 'colorBeige';        // Cartes blanches pour visite
                break;
            case 'spectacle':
                $sectionBgClass = 'colorBeige'; // Fond gris clair pour spectacle
                $cardBgClass = 'colorWhite';        // Cartes blanches pour spectacle
                break;
            default:
                $sectionBgClass = 'colorWhite'; // Couleur par défaut
                $cardBgClass = 'colorBeige';    // Couleur par défaut pour les cartes
                break;
        }
        ?>
        <section class="p-3 p-lg-4 p-xl-5 <?= $sectionBgClass; ?>"> <!-- Classe de background dynamique -->
            <!-- Affiche le nom de la catégorie à l'intérieur du bloc de services -->
            <div class="category-title">
                <h2 class="text-center my-4"><?= htmlspecialchars(ucfirst($category)); ?></h2><br>
            </div>

            <!-- Affiche les services de cette catégorie -->
            <div class="container custom-width">
                <div class="row justify-content-center"> <!-- Ligne centrée -->
                    <?php foreach ($services as $index => $service): ?>
                        <div class="col-12 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card border rounded shadow-sm hours <?= $cardBgClass; ?>"> <!-- Classe de background pour les cartes -->
                                <?php if ($index % 2 == 0): ?>
                                    <!-- Image au-dessus, texte en-dessous pour les services pairs -->
                                    <div class="d-flex justify-content-center">
                                        <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($service['name']); ?></h5>
                                        <p class="card-text long-text"><?= htmlspecialchars($service['description']); ?></p>
                                        <div class="d-flex justify-content-center">
                                            <button class="toggle-text-btn button d-lg-none">Afficher le texte</button>
                                        </div>
                                        <p class="card-text"><?= htmlspecialchars($service['tarifs']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['horaires']); ?></p>
                                    </div>
                                <?php else: ?>
                                    <!-- Texte au-dessus, image en-dessous pour les services impairs -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($service['name']); ?></h5>
                                        <p class="card-text long-text"><?= htmlspecialchars($service['description']); ?></p>
                                        <div class="d-flex justify-content-center">
                                            <button class="toggle-text-btn button d-lg-none">Afficher le texte</button>
                                        </div>
                                        <p class="card-text"><?= htmlspecialchars($service['tarifs']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['horaires']); ?></p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun service disponible pour l'instant.</p>
<?php endif; ?>
<?php $script = '<script src="/assets/javascript/boutonTexte.js"></script>';?>



