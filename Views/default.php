<!DOCTYPE html>
<html lang="en fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Risque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Risque&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/default.css">
    <?php if(isset($link)){echo $link;}?>

    
    <title>Zoo Arcadia</title>
</head>
<body class="m-5">
    <header >
        <nav class="navbar navbar-expand-xl" data-bs-theme="secondary">
            <div class="container-fluid m-3">
                <img src="assets\logo\logo.jpg" alt="logo"><a class="navbar-brand img-fluid logo" href="/"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon m-2"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/">Accueil</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/habitat">Habitats</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/service">Services</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/contact">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <button class=" btn btn-light ms-4">Se connecter</button>
                        </li>
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
              <a href=""><img src="assets/logo/logo.jpg" alt="Logo" class="logo ms-3"></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-facebook"></i></a>
          </div>
          <div class="second-line">
              <p>&copy; Frédéric LESIEUR 2024</p>
              <a href="">Mentions légales</a>
          </div>
      </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>


   