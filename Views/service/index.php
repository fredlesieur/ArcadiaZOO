<?php $link = '<link rel="stylesheet" href="/assets/css/services.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5 mb-0">SERVICES</h1>

<!-- Carrousel Section -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if (isset($services) && !empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($service['image'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') ?>">
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
                <h2 class="text-center my-4"><?= htmlspecialchars(ucfirst($category)); ?></h2>
            </div>

            <!-- Affiche les services de cette catégorie -->
            <?php foreach ($services as $service): ?>
                <div class="service-block p-3 my-3">
                    <h3 class="p-3"><?= htmlspecialchars($service["name"]); ?></h3>
                    <p class="p-1 description"><?= htmlspecialchars($service["description"]); ?></p><br>
                    <p class="p-1">Tarif : <?= htmlspecialchars($service["tarifs"]); ?></p>
                    <p class="p-1">Ouvert de : <?= htmlspecialchars($service["horaires"]); ?></p><br>
                    <div class="image d-flex justify-content-center">
                        <img src="/assets/images/<?= htmlspecialchars($service['image2']) ?>" class="p-2 img-fluid image-small" alt="<?= htmlspecialchars($service['name']) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Animation du jaguar pour séparer les catégories -->
        <div class="jaguar-container my-2" style="background-color: #fff; padding: 20px;">
            <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun service disponible pour l'instant.</p>
<?php endif; ?>

<!-- Inclusion du script JavaScript pour l'animation du jaguar -->
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>
<?php $script .= '<script src="/assets/javascript/jaguar.js"></script>'; ?>





