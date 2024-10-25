<?php if (isset($_SESSION['csrf_token'])): ?>
    <input type="hidden" id="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
<?php endif; ?>
<h1 class="container-fluid banner pt-5 pb-5 mb-0">HABITAT</h1>

<!-- Carrousel Section -->
<section class="colorSection pt-2 pt-lg-4 pt-xl-5">
    <div id="habitatCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <?php if (isset($habitat)): ?>
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
                    </div>
                </div>
                <?php if (!empty($habitat['image2'])): ?>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($habitat['image2']) ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($habitat['image3'])): ?>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($habitat['image3']) ?>" class="img-fluid3 p-2" alt="<?= htmlspecialchars($habitat['name']) ?>">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
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

<!-- Descriptif de l'habitat -->
<section class="colorSection p-1 p-lg-2 p-xl-3">
    <?php if (isset($habitat)): ?>
        <h2 class="text-center"><?= htmlspecialchars($habitat['name']); ?></h2><br>

        <p class="text-center long-text w-50 m-auto"><?= htmlspecialchars($habitat['description']); ?></p><br>
        <div class="d-flex justify-content-center">
            <button class="toggle-text-btn button d-lg-none">Afficher le texte</button>
        </div>

        <div class="separator"></div>

        <!-- Liste des animaux de l'habitat -->
        <h2 class="mt-4">Les animaux de cet habitat</h2><br>
        <div class="row">
            <?php if (!empty($animaux)): ?>
                <?php foreach ($animaux as $animal): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card">
                            <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top img-fluid4" alt="<?= htmlspecialchars($animal['nom']); ?>" loading="lazy">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars(ucwords($animal['nom'])); ?></h5>
                                <input type="hidden" id="animalId" value="<?= htmlspecialchars($animal['id']); ?>">
                                <a href="/animal/viewAnimal/<?= $animal['id'] ?>" class="btn btn-info">Voir la fiche de l'animal</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun animal n'est associé à cet habitat pour le moment.</p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <p>Informations sur l'habitat non disponibles.</p>
    <?php endif; ?>


</section>

<!-- Lien vers les fichiers JavaScript -->
<script src="/assets/javascript/boutonTexte.js"></script>
<script src="/assets/javascript/compteur.js"></script>
