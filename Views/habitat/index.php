<?php $link = '<link rel="stylesheet" href="/assets/css/habitat.css">'; ?>


<section class="colorSection p-3 p-lg-4 p-xl-5 ">
    <h2 class="text-center"><?= htmlspecialchars($habitat['name']); ?></h2><br>
    <p><?= htmlspecialchars($habitat['description']); ?></p><br>
    <div class="image d-flex justify-content-center">
        <img src="/assets/images/<?= htmlspecialchars($habitat['image3']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($habitat['name']); ?>">
    </div><br>
    <p>Rapport Vétérinaire : <?= htmlspecialchars($habitat['commentaire']); ?></p>
</section>


<section class="colorSection p-3 p-lg-4 p-xl-5">
    <h3>Les animaux dans cet habitat :</h3>
    <div id="animalCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($animaux as $index => $animal): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($animal['nom']); ?>">
                    </div>
                    <p><?= htmlspecialchars($animal['nom']); ?> (Age : <?= htmlspecialchars($animal['age']); ?> ans)</p>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#animalCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#animalCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

