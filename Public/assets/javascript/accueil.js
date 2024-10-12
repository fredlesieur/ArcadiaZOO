document.addEventListener("DOMContentLoaded", function() {
    const showTextBtn = document.getElementById('show-text-btn');
    const presentationText = document.getElementById('presentation-text');

    if (showTextBtn && presentationText) {
        showTextBtn.addEventListener('click', function() {
            // Affiche ou cache le texte
            if (presentationText.classList.contains('d-none')) {
                presentationText.classList.remove('d-none');
                showTextBtn.textContent = 'Cacher le texte';
            } else {
                presentationText.classList.add('d-none');
                showTextBtn.textContent = 'Afficher le texte';
            }
        });
    } else {
        console.error("L'élément n'a pas été trouvé dans le DOM.");
    }
});


    // Liste des images du jaguar en course
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

// Cibler tous les éléments avec la classe "jaguar"
const jaguarElements = document.querySelectorAll('.jaguar');

// Appliquer l'animation à chaque jaguar
jaguarElements.forEach(function(imgElement) {
  let index = 0; // Suivre l'étape actuelle de l'animation
  function animerJaguar() {
    imgElement.src = imagesJaguar[index]; // Changer l'image
    index = (index + 1) % imagesJaguar.length; // Passer à l'image suivante, et revenir à la première après la dernière
  }
  // Lancer l'animation toutes les 70 ms pour chaque jaguar
  setInterval(animerJaguar, 60);
});

    // Cache le message des avis après 3 secondes
    document.addEventListener('DOMContentLoaded', function() {
      const successMessage = document.getElementById('message-success');
      const errorMessage = document.getElementById('message-error');

      if (successMessage) {
          setTimeout(() => {
              successMessage.style.display = 'none';
          }, 3000); // 3000 ms = 3 secondes
      }

      if (errorMessage) {
          setTimeout(() => {
              errorMessage.style.display = 'none';
          }, 3000); // 3000 ms = 3 secondes
      }
  });


