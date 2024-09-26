<?php $link = '<link rel="stylesheet" href="/assets/css/accueil.css">' ?>

<div class="container-fluid banner pt-5 pb-5"> ACCUEIL</div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div id="serviceCarousel" class="carousel slide carousel-images" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php foreach ($animaux as $index => $animal): ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
          <!-- Le conteneur autour de l'image assure un centrage efficace -->
          <div class="d-flex justify-content-center align-items-center">
            <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="p-2 img-fluid"
              alt="<?= htmlspecialchars($animal['nom']) ?>">
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


<section class="colorSection p-3 p-lg-4 p-xl-5">
  <h2>Présentation du zoo</h2>
  <!-- Le texte est masqué sur les petits et moyens écrans -->
  <p id="presentation-text" class="d-none d-lg-block p-5">
    Bienvenue au Zoo Arcadia, un lieu d'émerveillement et de découverte, près de la forêt de Brocéliande, en Bretagne,
    depuis 1960.
    Engagé dans une démarche écologique et respectueuse de l'environnement, notre zoo se distingue par son approche
    durable et ses efforts
    pour la préservation de la biodiversité. Le zoo se porte très bien financièrement, les animaux sont heureux. Cela
    fait la fierté de son
    directeur, José, qui a de grandes ambitions. Trois Espaces pour nos animaux et pour enrichir votre visite, le Zoo
    Arcadia propose
    plusieurs services conçus pour le confort et le plaisir des petits et des grands. Venez vivre une expérience
    inoubliable au Zoo Arcadia,
    où la nature reprend ses droits et où chaque visiteur devient un ambassadeur de la protection de notre planète.
  </p>
  <!-- Le bouton est visible uniquement sur petits et moyens écrans -->
  <div class="d-flex justify-content-center">
    <button id="show-text-btn" class=" button d-lg-none" onclick="showText()">Afficher le texte</button>
  </div>
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div>
    <h2>Les Habitats</h2>
  </div>
  <?php foreach ($habitats as $habitat): ?>

    <div>
      <h3 class="p-3"><?= $habitat["name"]; ?></h3>
      <p class="p-1"> <?= $habitat["description_courte"]; ?></p>
      <div class="d-flex justify-content-center">
        <img src="/assets/images/<?= htmlspecialchars($habitat['image']) ?>" class="p-2 img-fluid"
          alt="<?= htmlspecialchars($habitat['name']) ?>">
      </div>
    </div>
  <?php endforeach; ?>

</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<section>

<div id="carouselExampleSlidesOnly" class="carousel slide carousel-avis" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php if (isset($Avis) && !empty($Avis)): ?>
        <?php 
        // Séparation de la table avis par lot de 3 avec array_chunk par pages
        $avisChunks = array_chunk($Avis, 3);
        $activeClass = 'active'; // Activation de la première feuille
        foreach ($avisChunks as $avisGroup): ?>
          <div class="carousel-item <?= $activeClass; ?>">
            <div class="row justify-content-center m-auto w-75">
              <?php foreach ($avisGroup as $avis): ?>
                <div class="col-12 col-md-4 mb-3"> 
                  <div class="card mb-3">
                    <div class="card-body text-center overflow-auto"> 
                      <h5 class="card-title"><?= htmlspecialchars($avis['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h5>
                      <p class="card-text"><?= htmlspecialchars($avis['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php $activeClass = ''; ?>
        <?php endforeach; ?>
    <?php else: ?>
      <p>Aucun avis pour le moment.</p>
    <?php endif; ?>
  </div>

  <!-- Flèches de contrôle "Précédent" et "Suivant" -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Précédent</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Suivant</span>
  </button>
</div>
</section>
<!-- message d'erreur si le texte de l avis depasse 400 caracteres-->

<!-- formulaire pour soumettre un avis-->
<div class="container d-flex justify-content-center my-5">
  <div class="form-container p-4">
    <h2 class="text-center mb-3">Laisser un avis</h2>
    <form action="/Avis/ajouterAvis" method="POST">
      <div class="mb-3 text-center">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
      </div>
      <div class="mb-3 text-center">
        <label for="comment" class="form-label">Votre avis</label>
        <textarea class="form-control" id="comment" name="comment" rows="6" required></textarea>
      </div>
      <button type="submit" class="btn button w-100">Envoyer</button>
    </form>

    <!-- message d erreur ou de reussite de l avis-->

    <?php if (isset($_SESSION['success'])): ?>
      <div id="message-success" class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
      <div id="message-error" class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
      </div>
    <?php endif; ?>

  </div>
</div>

  


<script src="assets/javascript/accueil.js"></script>