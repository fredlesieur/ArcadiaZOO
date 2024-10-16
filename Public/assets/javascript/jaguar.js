document.addEventListener("DOMContentLoaded", function () {
    const imagesJaguar = [
        'assets/images/jaquar1.jpg',
        'assets/images/jaquar2.jpg',
        'assets/images/jaquar3.jpg',
        'assets/images/jaquar4.jpg',
        'assets/images/jaquar5.jpg',
        'assets/images/jaquar6.jpg',
        'assets/images/jaquar7.jpg',
        'assets/images/jaquar8.jpg'
    ];

    let animationIntervals = [];

    function handleJaguarAnimation() {
        const jaguarElements = document.querySelectorAll('.jaguar');
        const screenWidth = window.innerWidth;

        jaguarElements.forEach(function (jaguar) {
            // Si on est sur un petit écran, désactiver l'animation
            if (screenWidth <= 768) {
                jaguar.style.animation = 'none';  // Désactive l'animation
                jaguar.style.position = 'relative';
                jaguar.style.left = '50%';
                jaguar.style.top = '50%';
                jaguar.style.transform = 'translate(-50%, -50%)';
                jaguar.style.width = 'auto';
                jaguar.style.height = 'auto';

                // Clear any running intervals to stop animation on small screens
                animationIntervals.forEach(interval => clearInterval(interval));
                animationIntervals = []; // Reset the array

            } else {
                // Si on est sur grand écran, activer l'animation
                jaguar.style.animation = 'moveRight 5s linear infinite';
                jaguar.style.position = 'absolute';
                jaguar.style.left = '0';
                jaguar.style.top = '50%';
                jaguar.style.transform = 'translateY(-50%)';
                jaguar.style.width = '4rem';
                jaguar.style.height = '3rem';

                // Si pas encore d'intervalle, en démarrer un pour changer l'image
                let index = 0;
                function animerJaguar() {
                    jaguar.src = imagesJaguar[index];
                    index = (index + 1) % imagesJaguar.length;
                }

                const interval = setInterval(animerJaguar, 60);
                animationIntervals.push(interval); // Stocker les intervals pour les arrêter plus tard si nécessaire
            }
        });
    }

    // Exécuter la fonction au chargement de la page
    handleJaguarAnimation();

    // Réexécuter la fonction au redimensionnement de la fenêtre
    window.addEventListener('resize', handleJaguarAnimation);
});
