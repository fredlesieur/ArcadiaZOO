<h1 class="container-fluid banner pt-5 pb-5 mb-0">LES HABITATS</h1>

<!-- Carrousel Section -->
<section class="mt-5">
    <div id="habitatCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
        <?php if (!empty($habitats)): ?>   
            <?php foreach ($habitats as $index=> $habitat): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>"
                         class="img-fluid d-block mx-auto" alt="<?= htmlspecialchars($habitat['name']) ?>" 
                         loading="lazy">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Boutons Précédent et Suivant -->
        <button class="carousel-control-prev" type="button" data-bs-target="#habitatCarousel" data-bs-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#habitatCarousel" data-bs-slide="next" >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

<!-- Liste des habitats avec disposition alternée (bouton à droite ou à gauche de l'image) -->
<div class="space"></div>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <?php foreach ($habitats as $index => $habitat): ?>
        <div class="container">
            <div class="row align-items-center reverse-order">
                <?php if ($index % 2 == 0): ?>
                    <!-- Image à gauche, texte à droite pour grands écrans -->
                    <div class="col-lg-6 d-flex justify-content-center order-image-first">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image2']) ?>" class="img-fluid p-2" alt="<?= htmlspecialchars($habitat['name']) ?>" loading="lazy">
                    </div>
                    <div class="col-lg-6 colorSection2 p-4 d-flex flex-column justify-content-center align-items-center order-text-second">
                        <h2 class="mb-3 title"><?= htmlspecialchars(ucwords($habitat["name"])); ?></h2>
                        <a href="/habitats/showHabitat/<?= $habitat['id']; ?>" class="btn btn-primary w-50 py-4">Découvrir les animaux</a>
                    </div>
                <?php else: ?>
                    <!-- Texte à gauche, image à droite pour grands écrans -->
                    <div class="col-lg-6 colorSection2 p-4 d-flex flex-column justify-content-center align-items-center order-text-second">
                        <h2 class="mb-3 title"><?= htmlspecialchars(ucwords($habitat["name"])); ?></h2>
                        <a href="/habitats/showHabitat/<?= $habitat['id']; ?>" class="btn btn-primary w-50 py-4">Découvrir les animaux</a>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center order-image-first">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image2']) ?>" class="img-fluid p-2" alt="<?= htmlspecialchars($habitat['name']) ?>" loading="lazy">
                    </div>
                <?php endif; ?>
            </div>
        </div>
</section>
<?php endforeach; ?>