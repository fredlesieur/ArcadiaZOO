<?php $link = '<link rel="stylesheet" href="assets/css/service.css">' ?>

<h1 class="container-fluid banner pt-5 pb-5 mb-0"> SERVICES</h1>

<!-- Vérifie s'il y a des services classés par catégorie -->
<?php if (!empty($servicesByCategory)): ?>
    <?php foreach ($servicesByCategory as $category => $services): ?>
        <section class="colorSection p-3 p-lg-4 p-xl-5">
            <!-- Affiche le nom de la catégorie à l'intérieur du bloc de services -->
            <div class="category-title">
                <h2 class="text-center my-4"><?= htmlspecialchars(ucfirst($category)); ?></h2>
            </div>

            <!-- Affiche les services de cette catégorie -->
            <?php foreach ($services as $service): ?>
                <div class="service-block p-3 my-3">
                    <h3 class="p-3"><?= htmlspecialchars($service["name"]); ?></h3>
                    <p class="p-1">Description : <?= htmlspecialchars($service["description"]); ?></p>
                    <p class="p-1">Tarif : <?= htmlspecialchars($service["tarifs"]); ?></p>
                    <p class="p-1">Ouvert de : <?= htmlspecialchars($service["horaires"]); ?></p>
                    <div class="image d-flex justify-content-center">
                        <img src="/assets/images/<?= htmlspecialchars($service['image2']) ?>" class="p-2 img-fluid image-small" alt="<?= htmlspecialchars($service['name']) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Animation du jaguar pour séparer les catégories -->
        <div class="jaguar-container my-2" style="background-color: #fff; padding: 20px;">
            <img class="jaguar" src="/assets/images/jaquar1.jpg" alt="Jaguar en course">
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun service disponible pour l'instant.</p>
<?php endif; ?>

<!-- Inclusion du script JavaScript pour l'animation du jaguar -->
<?php $script = '<script src="assets/javascript/jaguar.js"></script>'; ?>
<?php $script = '<script src="/assets/javascript/modifServ.js"></script>'; ?>



