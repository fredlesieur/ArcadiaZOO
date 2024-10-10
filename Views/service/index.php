<?php $link = '<link rel="stylesheet" href="assets/css/service.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5"> SERVICES</h1>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $index => $service): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($service['image']) ?>" class="p-2 img-fluid image-large" alt="<?= htmlspecialchars($service['name']) ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun service disponible pour l'instant.</p>
            <?php endif; ?>
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

<!-- Section pour afficher les services sous forme de liste -->
<?php if (!empty($services)): ?>
    <?php foreach ($services as $service): ?>
        <section class="colorSection p-3 p-lg-4 p-xl-5">
            <h3 class="p-3"><?= htmlspecialchars($service["name"]); ?></h3>
            <p class="p-1">Description : <?= htmlspecialchars($service["description"]); ?></p>
            <p class="p-1">Tarif : <?= htmlspecialchars($service["tarifs"]); ?></p>
            <p class="p-1">Ouvert de : <?= htmlspecialchars($service["horaires"]); ?></p>
            <div class="image d-flex justify-content-center">
                <img src="/assets/images/<?= htmlspecialchars($service['image2']) ?>" class="p-2 img-fluid image-small" alt="<?= htmlspecialchars($service['name']) ?>">
            </div>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun service disponible pour l'instant.</p>
<?php endif; ?>

<!-- Inclusion du script JavaScript pour l'animation du jaguar -->
<script src="assets/javascript/jaguar.js"></script>
