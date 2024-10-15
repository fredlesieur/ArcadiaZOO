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


<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>


<section class="colorSection p-3 p-lg-4 p-xl-5">

  <div>
    <h2>Nos horaires</h2><br>
    <?php foreach ($horaires as $horaire): ?>
      <h3><?= $horaire["saison"]; ?></h3><br>
      <p>En semaine : <?= $horaire["semaine"]; ?></p>
      <p>Le week-end : <?= $horaire["week_end"]; ?></p> <br>
  </div>
<?php endforeach; ?>
</section>

<div class="jaguar-container">
  <!-- Image du jaguar qui change pour chaque étape de la course -->
  <img class="jaguar" src="assets/images/jaquar1.jpg" alt="Jaguar en course">
</div>


<section class="colorSection p-3 p-lg-4 p-xl-5">
  <div>
    <h2>Nous trouver</h2><br>
    <?php foreach ($coordonnees as $coordonnee): ?>
      <h3>Adresse : </h3>
      <p> <?= $coordonnee["adresse"]; ?></p>
      <p><?= $coordonnee["cp_ville"]; ?></p>
      <p>Teléphone : <?= $coordonnee["telephone"]; ?></p> <br>
  </div>
<?php endforeach; ?>
<div class="d-flex justify-content-center bordure">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85376.45845156394!2d-2.262041459790034!3d48.03275003507391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480faceab3587495%3A0xcdc883e818be2eb2!2sFor%C3%AAt%20de%20Broc%C3%A9liande!5e0!3m2!1sfr!2sfr!4v1727271537951!5m2!1sfr!2sfr" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</section>

<script src="assets/javascript/jaguar.js"></script>