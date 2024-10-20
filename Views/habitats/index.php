<h1 class="container-fluid banner pt-5 pb-5 mb-0">LES HABITATS</h1>

<!-- Carrousel Section -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="habitatCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            // Création d'un tableau contenant toutes les images
            $allImages = [];
            foreach ($habitats as $habitat) {
                if (!empty($habitat['image'])) {
                    $allImages[] = [
                        'src' => $habitat['image'],
                        'alt' => $habitat['name']
                    ];
                }
                if (!empty($habitat['image2'])) {
                    $allImages[] = [
                        'src' => $habitat['image2'],
                        'alt' => $habitat['name']
                    ];
                }
                if (!empty($habitat['image3'])) {
                    $allImages[] = [
                        'src' => $habitat['image3'],
                        'alt' => $habitat['name']
                    ];
                }
            }

            // Mélange le tableau des images
            shuffle($allImages);

            // Affiche les images dans le carrousel 
            foreach ($allImages as $index => $image): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($image['src']) ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($image['alt']) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Boutons Précédent et Suivant -->
        <button class="carousel-control-prev" type="button" data-bs-target="#habitatCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#habitatCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

<!-- Liste des habitats avec disposition alternée (bouton à droite ou à gauche de l'image) -->
<div class="space"></div>

<?php foreach ($habitats as $index => $habitat): ?>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div class="container">
        <div class="row align-items-center">
            <?php if ($index % 2 == 0): ?>
                <!-- Image à gauche, bouton + nom à droite -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-3 title"><?= htmlspecialchars(ucwords($habitat["name"])); ?></h2>
                    <a href="/habitats/showHabitat/<?= $habitat['id']; ?>" class="btn btn-primary w-50 py-4">Découvrir les animaux : <?= htmlspecialchars(ucwords($habitat["name"])); ?></a>
                </div>
            <?php else: ?>
                <!-- Bouton + nom à gauche, image à droite -->
                <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-3 title"><?= htmlspecialchars(ucwords($habitat["name"])); ?></h2>
                    <a href="/habitats/showHabitat/<?= $habitat['id']; ?>" class="btn btn-primary w-50 py-4">Découvrir les animaux : <?= htmlspecialchars(ucwords($habitat["name"])); ?></a>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Animation du jaguar pour séparer les catégories -->
<div class="jaguar-container my-2">
    <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>
<?php endforeach; ?>

<?php $script = '<script src="/assets/javascript/jaguar.js"></script>'; ?>
