<?php $link = '<link rel="stylesheet" href="/assets/css/habitat.css">'; ?>

<section class="colorSection p-3 p-lg-4 p-xl-5">

<h1 class="container-fluid banner pt-5 pb-5"> CONNEXION</h1>

<div class="container d-flex justify-content-center my-5">
  <div class="form-container p-4">
    <h2 class="text-center mb-3">Formulaire de connexion</h2>
    <form id="contactForm" action="/Contact/sendMail" method="POST">
  <div class="mb-3 text-center">
    <label for="nom" class="form-label">Email</label>
    <input type="text" class="form-control" id="nom" name="nom" required> 
  </div>
  <div class="mb-3 text-center">
    <label for="prenom" class="form-label">Mot de passe</label>
    <input type="text" class="form-control" id="prenom" name="prenom" required>
  </div>
  <button type="submit" class="btn button w-100">Envoyer</button>
</form>
  </div>
</div>
</section>