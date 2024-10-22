<h1 class="container-fluid banner pt-5 pb-5"> LES ANIMAUX</h1>

<section class="container p-3 p-lg-4 p-xl-5">
    <div class="row justify-content-center">
        <div class="col-md-6 h-100">
            <div class="card h-100">
                <img src="/assets/images/<?= $animal['animal_image'] ?>" class="card-img-top img-fluid2" alt="<?= $animal['animal_nom']; ?>" loading="lazy">
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
<h4 class="card-text text-center"><strong>Rapport de : </strong> <?= isset($animal['user_nom_prenom']) ? ucfirst($animal['user_nom_prenom']) : 'Information non disponible'; ?></h4>
<h4 class="card-text text-center"><strong>Etat : </strong> <?= isset($animal['etat']) ? ucfirst($animal['etat']) : 'Information non disponible'; ?></h4>
<h4 class="card-text text-center"><strong>Nourritture préconisée : </strong> <?= isset($animal['nourriture_preconisee']) ? ucfirst($animal['nourriture_preconisee']) : 'Information non disponible'; ?></h4>
<h4 class="card-text text-center"><strong>Quantité préconisée : </strong> <?= isset($animal['grammage_preconise']) ? ucfirst($animal['grammage_preconise']) : 'Information non disponible'; ?></h4>
<h4 class="card-text text-center"><strong>Date et Heure : <?= isset($animal['date_passage']) ? date('d-m-Y H:i:s', strtotime($animal['date_passage'])) : 'Date non disponible'; ?></h4>
<h4 class="card-text text-center"><strong>Détail état : </strong> <?= isset($animal['detail_etat']) ? ucfirst($animal['detail_etat']) : 'Information non disponible'; ?></h4>

                </div>
            </div>
        </div>
    </div>
</section>