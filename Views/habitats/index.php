<h1 class="container-fluid banner pt-5 pb-5 mb-0 text-center">LES HABITATS</h1>

<!-- Carrousel Section -->
<section class="colorSection2 mt-5">
    <div id="habitatCarousel " class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <?php if (!empty($habitats)): ?>
                <?php foreach ($habitats as $index => $habitat): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>"
                                 class="img-fluid d-block mx-auto"
                                 alt="<?= htmlspecialchars($habitat['name']) ?>" 
                                 loading="lazy">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

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
<section class="colorSection p-3 p-lg-5">
    <?php foreach ($habitats as $index => $habitat): ?>
        <div class="container habitat-container my-4 row-spacing">
            <div class="row align-items-center 
                        <?php echo ($index % 2 === 0) ? 'flex-md-row' : 'flex-md-row-reverse'; ?> 
                        flex-column">

                <!-- Nom de l'habitat (affiché au-dessus de l'image sur mobile) -->
                <div class="habitat-title d-md-none text-center">
                    <h2 class="mb-3"><?= htmlspecialchars(ucwords($habitat['name'])); ?></h2>
                </div>

                <!-- Image -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="/assets/images/<?= htmlspecialchars($habitat['image2']) ?>" 
                         class="img-fluid habitat-image" 
                         alt="<?= htmlspecialchars($habitat['name']) ?>" 
                         loading="lazy">
                </div>

                <!-- Contenu texte + bouton (desktop) -->
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center habitat-content">
                    <h2 class="mb-4 d-none d-md-block"><?= htmlspecialchars(ucwords($habitat['name'])); ?></h2>
                    <a href="/habitats/showHabitat/<?= $habitat['id']; ?>" 
                       class="btn btn-primary w-75 py-3">
                        Découvrir les animaux
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>