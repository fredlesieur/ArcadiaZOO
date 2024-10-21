<h1 class="container-fluid banner pt-5 pb-5 mb-0">SERVICES</h1>

<!-- Carrousel Section -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
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
        <section class="colorSection p-3 p-lg-4 p-xl-5">
            <!-- Affiche le nom de la catégorie à l'intérieur du bloc de services -->
            <div class="category-title">
                <h2 class="text-center my-4"><?= htmlspecialchars(ucfirst($category)); ?></h2><br>
            </div>

            <!-- Affiche les services de cette catégorie -->
            <div class="container">
                <div class="row justify-content-center"> <!-- Ligne centrée -->
                    <?php foreach ($services as $index => $service): ?>
                        <div class="col-12 col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card border rounded shadow-sm hours">
                                <?php if ($index % 2 == 0): ?>
                                    <!-- Image au-dessus, texte en-dessous pour les services pairs -->
                                    <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($service['name']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($service['description']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['tarifs']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['horaires']); ?></p>
                                    </div>
                                <?php else: ?>
                                    <!-- Texte au-dessus, image en-dessous pour les services impairs -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($service['name']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($service['description']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['tarifs']); ?></p>
                                        <p class="card-text"><?= htmlspecialchars($service['horaires']); ?></p>
                                    </div>
                                    <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
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

<!-- Inclusion du script JavaScript pour l'animation du jaguar -->
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>


