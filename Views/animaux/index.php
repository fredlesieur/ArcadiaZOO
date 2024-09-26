<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5"> LES ANIMAUX</h1>

<section class="container p-3 p-lg-4 p-xl-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($animal['nom']); ?>">
                <div class="card-body">
                    <h2 class="card-title text-center"><?= htmlspecialchars(ucwords($animal['nom'])); ?></h2>
                    <h3 class="card-text text-center"><strong>Âge : </strong> <?= htmlspecialchars(ucwords($animal['age'])); ?> ans</h3>
                    <h3 class="card-text text-center"><strong>Race : </strong> <?= htmlspecialchars(ucwords($animal['race'])); ?></h3>
                    <h3 class="card-text text-center"><strong>Habitat : </strong> <?= htmlspecialchars(ucwords($animal['habitat'])); ?></h3>
                    <!-- Ajoute d'autres détails si nécessaire -->
                </div>
            </div>
        </div>
    </div>
</section>
