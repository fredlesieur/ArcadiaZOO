<?php $link = '<link rel="stylesheet" href="assets/css/habitats.css">' ?>

<div class= "container-fluid banner pt-5 pb-5">HABITATS</div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($habitat as $index => $habitats): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <!-- Le conteneur autour de l'image assure un centrage efficace -->
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/images/<?= htmlspecialchars($habitats['image3']) ?>" class="p-2 img-fluid" alt="Image du service">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Les boutons "Précédent" et "Suivant" extérieurs et centrés -->
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
<div class="space">

</div>

<?php foreach ($habitation as $index => $habitat): ?>
<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div>
      <h2 class="p-3"><?= $habitat["name"];?></h2>
      <div class="image d-flex justify-content-center ">
        <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="p-2 img-fluid" alt="<?= htmlspecialchars($habitat['name']) ?>">
      </div>
    </div>
<div class="d-flex justify-content-center m-5"><button class="button"> Découvrir </button></div>
    
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<?php endforeach; ?>

<script src="assets/javascript/jaguar.js"></script>