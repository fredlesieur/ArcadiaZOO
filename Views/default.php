<html lang="en fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Risque&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- FontAwesome CDN without integrity -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/default.css">
    <?php if(isset($link)){echo $link;}?>

    <title>Zoo Arcadia</title>
</head>
<body class="m-5">
<header>
        <nav class="navbar navbar-expand-xl">
            <div class="container-fluid">
                <img class="logo" src="/assets/logo/logo.jpg" alt="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/habitats">Habitats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contacts</a>
                        </li>

                        <!-- Dynamic content based on user role -->
                        <?php if (isset($_SESSION['user_id'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard/index">Tableau de bord <?= $_SESSION['role'] ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(!empty($_SESSION['user_id'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/connexion/logout">Déconnexion</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/connexion">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main id="main-page w-auto">
        <?= $contenu ?>
    </main>

    <footer>
        <div class="footer">
            <div class="first-line">
                <a href="/"><img src="/assets/logo/logo.jpg" alt="Logo Zoo" class="logo"></a>
                <div>
                    <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div class="second-line">
                <p>&copy; Zoo Arcadia 2024</p>
                <a href="/mentions-legales">Mentions légales</a>
            </div>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php if (isset($script)) { echo $script; } ?>