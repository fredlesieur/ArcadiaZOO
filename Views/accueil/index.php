<?php


use App\Controllers\AvisController;

$avisController = new AvisController();

$Avis = $avisController->recupereAvis();

?>

<?php $link = '<link rel="stylesheet" href="assets/css/accueil.css">' ?>

<section class="colorSection pt-3">
  <div class="container mt-5">
      <div class="row">
          <?php foreach ($animaux as $index => $animal): ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
                  <div class="card">
                      <img src="/assets/images/<?= htmlspecialchars($animal['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['nom']) ?>">
                      <div class="card-body">
                          <h5 class="card-title text-center"><?= ucfirst($animal['nom']) ?></h5>
                          <p class="card-text"> <?= htmlspecialchars($animal['age']) ?> Ans</p>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
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
    <h3 class="p-3">La Jungle</h3>
    <p class="p-1"> Un paradis luxuriant où vous découvrirez une végétation dense et une faune exotique qui vous
      transporteront au cœur de la forêt tropicale.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/habitat_giraffe.webp" alt="habitat de giraffe">
    </div>
  </div>

  <div>
    <h3 class="p-3">La Savane</h3>
    <p class="p-1"> Un vaste panorama de plaines dorées, abritant des espèces emblématiques telles que les lions, les
      éléphants et les girafes, recréant l'atmosphère chaleureuse des terres africaines.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/savane.webp" alt="habitat savane">
    </div>
  </div>

  <div>
    <h3 class="p-3">Le Marais</h3>
    <p class="p-1"> Un environnement humide et mystérieux où les marécages et les eaux stagnantes accueillent une
      diversité étonnante de plantes et d'animaux aquatiques.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/marais.webp" alt="habitat marais">
    </div>
  </div>
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div>
    <h2>Nos Services</h2>
    <h3 class="p-3">Lieux de restauration</h3>
    <p class="p-1">Trois espaces de restauration sont disponibles, chacun situé au sein de nos différentes zones
      thématiques, offrant une variété de plats pour satisfaire toutes les envies.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/terrasse.webp" alt="habitat de giraffe">
    </div>
  </div>

  <div>
    <h3 class="p-3">La train Safari</h3>
    <p class="p-1"> Montez à bord de notre train safari pour une aventure immersive à travers les différents habitats,
      une manière ludique et instructive de découvrir notre faune.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/train2.webp" alt="habitat savane">
    </div>
  </div>

  <div>
    <h3 class="p-3">Visites guidées</h3>
    <p class="p-1"> Rejoignez nos visites guidées pour une exploration approfondie de nos espaces, accompagnée par des
      experts qui partageront avec vous leurs connaissances et leur passion pour les animaux.</p>
    <div class="image">
      <img class="p-2 img img-fluid" src="assets/images/visite.webp" alt="habitat marais">
    </div>
  </div>
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<section class="d-flex justify-content-center custom-gap p-3 p-lg-4 p-xl-5">
  <div class="circle ">
      <h3>Nos habitats</h3>
      <button class="button">Découvrir</button>
  </div>

  <div class="circle">
      <h3>Nos Services</h3>
      <button class="button">Découvrir</button>
  </div>

  <div class="circle">
      <h3>Nous contacter</h3>
      <button class="button"> Contacter </button>
  </div>
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>

<!-- caroussel pour déposer les avis des visiteurs -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner ">
    <?php if (isset($Avis) && !empty($Avis)): ?>
      <?php foreach ($Avis as $index => $avis): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
            <div class="row d-flex justify-content-center align-items-center p-3 m-auto w-100 avis gap-3">
                <div class=" col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-4"> 
                  <div class="card cards p-3">
                    <div class="card-body text-center"> 
                      <h5 class="card-title"><?= htmlspecialchars($avis['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h5>
                      <p class="card-text"><?= htmlspecialchars($avis['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?php endforeach; ?>
    <?php else: ?>
      <p>Aucun avis pour le moment.</p>
    <?php endif; ?>
  </div>
    <a class="carousel-control-prev custom-carousel-control" href="#carouselExampleSlidesOnly" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next custom-carousel-control" href="#carouselExampleSlidesOnly" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
</div>

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
  </div>
</div>

<?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']); // Supprime le message après l'affichage
            ?>
        </div>
    <?php endif; ?>
    
<script src="assets/javascript/accueil.js"></script>