<h1 class="container-fluid banner pt-5 pb-5 mb-0 mb-4 text-center">Liste des rapports</h1>
<section class="colorSection">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="align-content-center">État</th>
                    <th class="align-content-center">Nourriture</th>
                    <th class="align-content-center">Grammage (g)</th>
                    <th class="align-content-center">Date et Heure</th>
                    <th class="align-content-center">Détail État</th>
                    <th class="align-content-center">Animal</th>
                    <th class="align-content-center">Rapport rédigé par</th>
                    <th class="align-content-center">grammage préconisé</th>
                    <?php if ($_SESSION['role'] === 'veterinaire'): ?>
                        <th class="align-content-center">date de passage</th>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'employe') : ?>
                        <th class="align-content-center">Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapport as $r): ?>
                    <tr>
                        <td class="align-content-center"><?= $r['detail_etat']; ?></td>
                        <td class="align-content-center"><?= $r['nourriture']; ?></td>
                        <td class="align-content-center"><?= $r['grammage']; ?></td>
                        <td class="align-content-center"><?= $r['date_heure']; ?></td>
                        <td class="align-content-center"><?= $r['etat']; ?></td>
                        <td class="align-content-center"><?= $r['animal_nom']; ?></td>
                        <td class="align-content-center"><?= $r['user_nom_prenom']; ?></td>
                        <td class="align-content-center"><?= isset($r['grammage_preconiser']) ? ($r['grammage_preconiser']) : 'pas de grammage'; ?></td>
                        <?php if ($_SESSION['role'] === 'veterinaire') : ?>
                            <td class="align-content-center"><?= isset($r['date_passage']) ? date('d-m-Y H:i:s', strtotime($r['date_passage'])) : 'Date non disponible'; ?></td>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] === 'veterinaire' || $_SESSION['role'] === 'employe') : ?>
                            <td class="align-content-center">
                                <a href="/rapport/edit_rapport/<?= $r['id']; ?>" class="btn warning">Modifier</a>
                                <a href="/rapport/delete_rapport/<?= $r['id']; ?>" class="btn danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?');">Supprimer</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>