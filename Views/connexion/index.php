<h1 class="container-fluid banner pt-5 pb-5"> CONNEXION</h1>

<section>
    <div class="container d-flex justify-content-center my-5">
        <div class="form-container p-4 col-md-6 w-100">
            <h2 class="text-center mb-3">Formulaire de connexion</h2>
            <form action="/connexion/login" method="POST">
                <div class="mb-3 text-center">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 text-center position-relative">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="mdp" name="mdp" required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye" id="togglePasswordIcon"></i>
                        </span>
                    </div>
                </div>


                <button type="submit" class="btn button w-100">Envoyer</button>
                <?php if (isset($error)): ?>
                    <p style="color: red;" class="text-center"><?= $error; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</section>

<?php $script = '<script src="/assets/javascript/passwordhide.js"></script>' ?>