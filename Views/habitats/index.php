<?php $link = '<link rel="stylesheet" href="/assets/css/habitats.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5 mb-0">HABITATS</h1>

<!-- Carrousel Section -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="habitatCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($habitats as $index => $habitat): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
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

<!-- Liste des habitats -->
<div class="space"></div>

<?php foreach ($habitats as $habitat): ?>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div>
        <h2 class="p-3"><?= htmlspecialchars(ucwords($habitat["name"])); ?></h2>
        <p class="text-center w-50 m-auto"><?= htmlspecialchars($habitat["description_courte"]); ?></p>
        <div class="image d-flex justify-content-center">
            <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
        </div>
    </div>
    <div class="d-flex justify-content-center m-5">
        <a href="/habitats/showHabitat/<?=$habitat['id']; ?>" class="btn btn-primary">Découvrir</a>
    </div>
</section>

<!-- Animation du jaguar pour séparer les catégories -->
<div class="jaguar-container my-2">
    <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>
<?php endforeach; ?>

<?php $script = '<script src="/assets/javascript/jaguar.js"></script>'; ?>
