<?php $link = '<link rel="stylesheet" href="assets/css/habitats.css">'; ?>

<!-- Banniere de présentation des Habitats -->
<h1 class="container-fluid banner pt-5 pb-5">HABITATS</h1>

<!-- Carrousel Section -->
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($habitats as $index => $habitat): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($habitat['image3']) ?>" class="p-2 img-fluid" alt="Image du service">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Boutons Précédent et Suivant -->
        <button class="btn btn-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="btn btn-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>

<!-- Liste des habitats -->
<div class="space"></div>

<?php foreach ($habitats as $index => $habitat): ?>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div>
      <h2 class="p-3"><?=ucwords($habitat["name"]); ?></h2>
      <div class="image d-flex justify-content-center">
        <img src="/assets/images/<?= $habitat['image'] ?>" class="p-2 img-fluid" alt="<?= $habitat['name'] ?>">
      </div>
    </div>
    <div class="d-flex justify-content-center m-5">
        <!-- Lien vers les détails de l'habitat -->
        <a href="/habitat/decouvrir/<?=$habitat['id']; ?>" class="btn button">Découvrir</a>
    </div>
</section>

<!-- Jaguar Container -->
<div class="jaguar-container">
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>
<?php endforeach; ?>

<!-- Script pour le Jaguar -->
<script src="assets/javascript/jaguar.js"></script>
