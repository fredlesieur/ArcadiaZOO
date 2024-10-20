<h1 class="container-fluid banner pt-5 pb-5 mb-0"> NOUS CONTACTER</h1>

<section class="colorSection p-3 p-lg-4 p-xl-5">
    <div class="container mx-auto p-4">
        <h2 class="text-center mb-3">Formulaire de contact</h2>

        <?php if (isset($message)): ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
        <?php endif; ?>

        <form id="contactForm" action="/Contact/sendMail" method="POST">
            <div class="mb-3 text-center">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3 text-center">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3 text-center">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 text-center">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn button w-100">Envoyer</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        </form>
    </div>
</section>

<div class="separator"></div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div class="container">
      <h2 class="text-center">Nos horaires</h2><br>

      <!-- Vérifie s'il y a des horaires disponibles -->
      <?php if (!empty($horaires)): ?>
        <div class="row">
            <?php foreach ($horaires as $horaire): ?>
                <!-- Chaque horaire est dans une colonne avec un cadre autour -->
                <div class="col-12 col-md-6 mb-4">
                    <div class="p-4 border rounded shadow-sm text-center hours homewhite"> 
                        <h3><u><?= htmlspecialchars($horaire["saison"]); ?></u></h3><br>
                        <p><i>En semaine :</i> <em><?= htmlspecialchars($horaire["semaine"]); ?></em></p>
                        <p><strong>Le week-end :</strong> <strong><?= htmlspecialchars($horaire["week_end"]); ?></strong></p><br>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      <?php else: ?>
          <p class="text-center">Aucun horaire disponible pour le moment.</p>
      <?php endif; ?>
  </div>
</section>



<div class="separator"></div>

<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Colonne du texte + titre qui prend 1/4 de la largeur -->
      <div class="col-12 col-lg-3 mb-4"> <!-- Prend 1/4 de la largeur (col-lg-3) -->
        <h2 class="title2">Nous trouver</h2><br>
        <?php foreach ($coordonnees as $coordonnee): ?>
          <h3><?= $coordonnee["adresse"]; ?></h3>
          <h4><?= $coordonnee["cp_ville"]; ?></h4>
          <h3><?= $coordonnee["telephone"]; ?></h3><br>
        <?php endforeach; ?>
      </div>

      <!-- Colonne de la carte Google Maps qui prend 3/4 de la largeur -->
      <div class="col-12 col-lg-9 mb-4">
        <div class="iframe-container">
          <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85376.45845156394!2d-2.262041459790034!3d48.03275003507391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480faceab3587495%3A0xcdc883e818be2eb2!2sFor%C3%AAt%20de%20Broc%C3%A9liande!5e0!3m2!1sfr!2sfr!4v1727271537951!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>



<?php $script = '<script src="/assets/javascript/jaguar.js"></script>'; ?>