<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5"> LES ANIMAUX</h1>

<section class="container p-3 p-lg-4 p-xl-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img src="/assets/images/<?=$animal['animal_image'] ?>" class="card-img-top img-fluid" alt="<?=$animal['animal_nom']; ?>">
                <div class="card-body">
                    <h2 class="card-title text-center"><?=ucwords($animal['animal_nom']); ?></h2>
                    <h4 class="card-text text-center"><strong>Âge : </strong> <?= ucwords($animal['animal_age']); ?> ans</h4>
                    <h4 class="card-text text-center"><strong>Race : </strong> <?= ucwords($animal['animal_race']); ?></h4>
                    <h4 class="card-text text-center"><strong>Habitat : </strong> <?= ucwords($animal['animal_habitat']); ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Rapport Vétérinaire </h2>
                    <h4 class="card-text text-center"><strong>Rapport de :  </strong> <?=ucwords($animal['user_nom_prenom']); ?>
                    <h4 class="card-text text-center"><strong>Etat : </strong> <?= ucwords($animal['etat']); ?></h4>
                    <h4 class="card-text text-center"><strong>Nourritture préconisée : </strong> <?= ucwords($animal['nourriture']); ?></h4>
                    <h4 class="card-text text-center"><strong>Grammage (g) : </strong> <?= ucwords($animal['grammage']); ?></h4>
                    <h4 class="card-text text-center"><strong>Date et Heure: <?= isset($animal['date_passage']) ? date('d-m-Y H:i:s', strtotime($animal['date_passage'])) : 'Date non disponible'; ?></h4>
                    <h4 class="card-text text-center"><strong>Détail état : </strong> <?= ucwords($animal['detail_etat']); ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>
