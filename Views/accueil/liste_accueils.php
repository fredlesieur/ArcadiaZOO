<h1 class="banner pt-5 pb-5">Liste des éléments de l'accueil</h1>
<section class="colorSection  p-3 p-lg-4 p-xl-5">
    <div class="container"></div>
        <div class="table-responsive col-lg-6 mx-auto">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accueils as $accueil): ?>
                        <tr>
                            <td><?= htmlspecialchars($accueil['name']) ?></td>
                            <td><?= htmlspecialchars($accueil['description']) ?></td>
                            <td><img src="/assets/images/<?= htmlspecialchars($accueil['image']) ?>" width="100" alt="Image de l'accueil"></td>
                            <td>
                                <a href="/accueil/editAccueil/<?= $accueil['id'] ?>" class="btn warning">Modifier</a>
                                <a href="/accueil/deleteAccueil/<?= $accueil['id'] ?>" class="btn danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
             </table>
        </div>
    </div>
</section>