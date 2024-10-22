<!-- caroussel pour déposer les avis des visiteurs -->
<h1 id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false"></h1>
  <div class="carousel-inner">
    <?php if (isset($Avis) && !empty($Avis)): ?>
        <?php 
        // spération de la table avis par lot de 3 avec array_chunk par pages
        $avisChunks = array_chunk($Avis, 3);
        $activeClass = 'active'; // activation de la premiere feuille
        foreach ($avisChunks as $avisGroup): ?>
          <div class="carousel-item <?= $activeClass; ?>">
            <div class="row justify-content-center m-auto w-75">
              <?php foreach ($avisGroup as $avis): ?>
                <div class="col-12 col-md-4 mb-3"> 
                  <div class="card text-bg-light mb-3">
                    <div class="d-flex justify-content-center column-gap-4">
                    </div>
                    <div class="card-body text-center overflow-auto"> 
                      <h5 class="card-title"><?= htmlspecialchars($avis['pseudo'], ENT_QUOTES, 'UTF-8'); ?></h5>
                      <p class="card-text"><?= htmlspecialchars($avis['comment'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php $activeClass = '';?>
        <?php endforeach; ?>
    <?php else: ?>
      <p>il n y pas d'avis pour le moment.</p>
    <?php endif; ?>
  </div>
</h1>

<!-- formulaire pour soumettre un avis-->
<div class="container d-flex justify-content-center my-5">
  <div class="form-container p-4">
    <h2 class="text-center">Laisser un avis</h2>
    <form action="/avis/addAvis" method="POST">
      <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
      </div>
      <div class="mb-3">
        <label for="comment" class="form-label">Votre avis</label>
        <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn button w-100">Envoyer</button>
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>
  </div>
</div>