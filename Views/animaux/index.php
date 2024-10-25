<h1 class="container-fluid banner pt-5 pb-5"> LES ANIMAUX</h1>

<section class="container p-3 p-lg-4 p-xl-5">
    <div class="row justify-content-center pb-2">
        <div class="col-md-6 h-100">
            <div class="card h-100">
                <img src="/assets/images/<?= isset($animal['image']) ? htmlspecialchars($animal['image']) : 'default.jpg'; ?>" 
                     class="card-img-top img-fluid2" 
                     alt="<?= isset($animal['nom']) ? htmlspecialchars($animal['nom']) : 'Nom inconnu'; ?>" 
                     loading="lazy">
                <div class="card-body">
                    <h3 class="card-title text-center">
                        <?= isset($animal['nom']) ? ucfirst(htmlspecialchars($animal['nom'])) : 'Nom inconnu'; ?>
                    </h3>
                    <h4 class="card-text text-center"><strong>Âge : </strong> 
                        <?= isset($animal['age']) ? htmlspecialchars($animal['age']) . ' ans' : 'Âge inconnu'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Race : </strong> 
                        <?= isset($animal['race']) ? ucfirst(htmlspecialchars($animal['race'])) : 'Race inconnue'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Habitat : </strong> 
                        <?= isset($animal['animal_habitat']) ? ucfirst(htmlspecialchars($animal['animal_habitat'])) : 'Habitat inconnu'; ?>
                    </h4><br>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Rapport Vétérinaire </h3>
                    <h4 class="card-text text-center"><strong>Rapport de : <br> </strong> 
                        <?= isset($animal['user_nom_prenom']) ? ucfirst(htmlspecialchars($animal['user_nom_prenom'])) : 'Information non disponible'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Etat : <br> </strong> 
                        <?= isset($animal['etat']) ? ucfirst(htmlspecialchars($animal['etat'])) : 'Information non disponible'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Nourritture préconisée : <br> </strong> 
                        <?= isset($animal['nourriture_preconisee']) ? ucfirst(htmlspecialchars($animal['nourriture_preconisee'])) : 'Information non disponible'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Quantité préconisée : <br> </strong> 
                        <?= isset($animal['grammage_preconise']) ? htmlspecialchars($animal['grammage_preconise']) : 'Information non disponible'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Date du rapport: <br> </strong> 
                        <?= isset($animal['date_passage']) ? date('d-m-Y', strtotime($animal['date_passage'])) : 'Date non disponible'; ?>
                    </h4>
                    <h4 class="card-text text-center"><strong>Détail état : <br> </strong> 
                        <?= isset($animal['detail_etat']) ? ucfirst(htmlspecialchars($animal['detail_etat'])) : 'Information non disponible'; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>
