<h1 class="container-fluid banner pt-5 pb-5">HABITATS</h1>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <?php if (isset($habitat)): ?>
        <h2 class="text-center"><?= htmlspecialchars($habitat['name']); ?></h2><br>
        <p><?= htmlspecialchars($habitat['description']); ?></p><br>
        <div class="image d-flex justify-content-center">
            <img src="/assets/images/<?= htmlspecialchars($habitat['image3']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($habitat['name']); ?>">
        </div><br>
        <p>Rapport Habitat : <?= htmlspecialchars($habitat['commentaire']); ?></p>
    <?php else: ?>
        <p>Informations sur l'habitat non disponibles.</p>
    <?php endif; ?>
</section>

<!-- Section pour afficher les animaux dans une galerie d'images -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <h3 class="text-center">Les animaux de cet habitat</h3><br>
    <div class="row">
        <?php if (!empty($animaux)): ?>
            <?php foreach ($animaux as $animal): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4">
                        <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($animal['nom']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars(ucwords($animal['nom'])); ?></h5>
                            <a href="/animal/viewAnimal/<?= $animal['id'] ?>" class="btn button">Voir la fiche</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Aucun animal n'est associé à cet habitat pour le moment.</p>
        <?php endif; ?>
    </div>
</section>



