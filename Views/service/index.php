<?php $link = '<link rel="stylesheet" href="assets/css/service.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5"> SERVICES</h1>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($services as $index => $service): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($service['image']) ?>" class="p-2 img-fluid" alt="Image du service">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Boutons "Précédent" et "Suivant" -->
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

<section class="colorSection">
    <h2>Restauration</h2>
    <p id="presentation-text" class="d-none d-lg-block p-5">
        Au cœur de nos trois espaces, profitez de nos différents points de restauration et de leurs terrasses, où vous pourrez observer les animaux. Que vous ayez une petite ou une grande faim, sucrée ou salée, chacun y trouvera son bonheur avec notre offre variée de restauration !
    </p>

    <?php foreach ($restaurant as $resto): ?>
        <div>
            <h3 class="p-3"><?= htmlspecialchars($resto["name"]); ?></h3>
            <p class="p-1"><?= htmlspecialchars($resto["description"]); ?></p>
            <p class="p-1">Tarif : <?= htmlspecialchars($resto["tarifs"]); ?></p>
            <p class="p-1">Ouvert de : <?= htmlspecialchars($resto["horaires"]); ?></p>
            <div class="image d-flex justify-content-center">
                <img src="/assets/images/<?= htmlspecialchars($resto['image2']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($resto['name']) ?>">
            </div>
        </div>
    <?php endforeach; ?>
</section>

<!-- Section jaguar animation -->
<div class="jaguar-container">
    <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <?php foreach ($train as $trains): ?>
        <h2><?= htmlspecialchars($trains["name"]); ?></h2>
        <p id="presentation-text" class="d-none d-lg-block p-5">
            <?= htmlspecialchars($trains["description"]); ?>
        </p>
        <p class="p-1">Tarif : <?= htmlspecialchars($trains["tarifs"]); ?></p>
        <p class="p-1">Ouvert de : <?= htmlspecialchars($trains["horaires"]); ?></p>
        <div class="image d-flex justify-content-center">
            <img src="/assets/images/<?= htmlspecialchars($trains['image2']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($trains['name']) ?>">
        </div>
    <?php endforeach; ?>
</section>

<script src="assets/javascript/jaguar.js"></script>
