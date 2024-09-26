<?php $link = '<link rel="stylesheet" href="/assets/css/habitat.css">'; ?>


<section class="colorSection p-3 p-lg-4 p-xl-5">
    <h2 class="text-center"><?= htmlspecialchars($habitat['name']); ?></h2><br>
    <p><?= htmlspecialchars($habitat['description']); ?></p><br>
    <div class="image d-flex justify-content-center">
        <img src="/assets/images/<?= htmlspecialchars($habitat['image3']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($habitat['name']); ?>">
    </div><br>
    <p>Rapport Vétérinaire : <?= htmlspecialchars($habitat['commentaire']); ?></p>
</section>

<!-- Section pour afficher les animaux dans une galerie d'images -->
<section class="container p-3 p-lg-4 p-xl-5">
    <h3 class="text-center">Les animaux de cet habitat</h3>
    <div class="row">
        <?php foreach ($animaux as $animal): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-4">
                    <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($animal['nom']); ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= htmlspecialchars($animal['nom']); ?></h5>
                        <a href="/animaux/fiche?id=<?= $animal['id'] ?>" class="btn btn-primary">Voir la fiche</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

