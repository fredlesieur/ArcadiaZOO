<section class="colorSection p-3 p-lg-4 p-xl-5 text-start">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php if (isset($carousel) && !empty($carousel)): ?>
                <?php foreach ($carousel as $index => $item): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="/assets/images/<?= htmlspecialchars($item['image_path']) ?>" 
                             class="d-block w-100" 
                             alt="<?= htmlspecialchars($item['alt_text']) ?>"
                             width="720" height="608"
                             loading="lazy">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune image à afficher dans le carrousel.</p>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
