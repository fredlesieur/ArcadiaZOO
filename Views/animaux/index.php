<?php $link = '<link rel="stylesheet" href="/assets/css/animaux.css">'; ?>

<h1 class="container-fluid banner pt-5 pb-5"> LES ANIMAUX</h1>

<section class="container p-3 p-lg-4 p-xl-5">
    <div class="row justify-content-center">
        <div class="col-md-6 h-100">
            <div class="card h-100">
                <img src="/assets/images/<?= $animal['animal_image'] ?>" class="card-img-top img-fluid2" alt="<?= $animal['animal_nom']; ?>">
                <div class="card-body">
                    <h3 class="card-title text-center"><?= ucfirst($animal['animal_nom']); ?></h3>
                    <h4 class="card-text text-center"><strong>Âge : </strong> <?= ucfirst($animal['animal_age']); ?> ans</h4>
                    <h4 class="card-text text-center"><strong>Race : </strong> <?= ucfirst($animal['animal_race']); ?></h4>
                    <h4 class="card-text text-center"><strong>Habitat : </strong> <?= ucfirst($animal['animal_habitat']); ?></h4><br>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Rapport Vétérinaire </h3>
                    <h4 class="card-text text-center"><strong>Rapport de : </strong> <?= ucfirst($animal['user_nom_prenom']); ?>
                        <h4 class="card-text text-center"><strong>Etat : </strong> <?= ucfirst($animal['etat']); ?></h4>
                        <h4 class="card-text text-center"><strong>Nourritture préconisée : </strong> <?= ucfirst($animal['nourriture']); ?></h4>
                        <h4 class="card-text text-center"><strong>Quantité : </strong> <?= ucfirst($animal['grammage']); ?></h4>
                        <h4 class="card-text text-center"><strong>Date et Heure : <?= isset($animal['date_passage']) ? date('d-m-Y H:i:s', strtotime($animal['date_passage'])) : 'Date non disponible'; ?></h4>
                        <h4 class="card-text text-center"><strong>Détail état : </strong> <?= ucfirst($animal['detail_etat']); ?></h4>
                </div>
            </div>
        </div>
    </div>
</section>