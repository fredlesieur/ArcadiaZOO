<?php $script = '<script src="/assets/javascript/filtre.js"></script>'; ?>
<?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?> <!-- Supprime le message après affichage -->
            </div>
        <?php endif; ?> 
<h1 class="banner pt-5 pb-5 mb-0 mb-4 text-center">Liste des rapports</h1>
<section class="colorSection">
    <div class=" container-fluid">
        <table class="table-responsive">
        <table class="datatable table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="align-content-center">Rapport rédigé par</th>
                    <th class="align-content-center">Animal</th>
                    <th class="align-content-center">État</th>
                    <th class="align-content-center">Détail État</th>
                    <th class="align-content-center">Date et Heure employé</th>
                    <th class="align-content-center">Date de passage vétérinaire</th>
                    <th class="align-content-center">Nourriture préconisée</th>
                    <th class="align-content-center">Nourriture donnée</th>
                    <th class="align-content-center">Quantité préconisée</th>
                    <th class="align-content-center">Quantité donnée</th>
                    <th class="align-content-center">Employé</th>
                    <th class="align-content-center">Vétérinaire</th>
                    <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'employe') : ?>
                        <th class="align-content-center">Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapport as $r): ?>
                    <tr>
                        <td class="align-content-center"><?= $r['user_nom_prenom']; ?></td>
                        <td class="align-content-center"><?= $r['animal_nom']; ?></td>
                        <td class="align-content-center"><?= $r['etat']; ?></td>
                        <td class="align-content-center"><?= $r['detail_etat']; ?></td>
                        <td class="align-content-center"><?= isset($r['date_heure']) ? date('d-m-Y H:i', strtotime($r['date_heure'])) : ''; ?></td>
                        <td class="align-content-center"><?= isset($r['date_passage']) ? date('d-m-Y', strtotime($r['date_passage'])) : ''; ?></td>
                        <td class="align-content-center"><?= isset($r['nourriture_preconisee']) ? $r['nourriture_preconisee'] : ''; ?></td>
                        <td class="align-content-center"><?= $r['nourriture_donnee']; ?></td>
                        <td class="align-content-center"><?= isset($r['grammage_preconise']) ? $r['grammage_preconise'] : ''; ?></td>
                        <td class="align-content-center"><?= $r['grammage_donne']; ?></td>
                        <td class="align-content-center"><?= $r['employe_nom_prenom'] ?? ''; ?></td>
                        <td class="align-content-center"><?= $r['veterinaire_nom_prenom'] ?? ''; ?></td>

                        <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'employe') : ?>
                            <td class="align-content-center">
                                <a href="/rapport/edit_rapport/<?= $r['id']; ?>" class="btn warning">Modifier</a>
                                <a href="/rapport/delete_rapports/<?= $r['id']; ?>" class="btn danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?');">Supprimer</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </table>
    </div>
</section>
