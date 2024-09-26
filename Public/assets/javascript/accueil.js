document.getElementById('show-text-btn').addEventListener('click', function() {
  const presentationText = document.getElementById('presentation-text');
  if (presentationText.classList.contains('d-none')) {
      // Montrer le texte si caché
      presentationText.classList.remove('d-none');
      this.textContent = 'Cacher le texte'; // Changer le texte du bouton
  } else {
      // Cacher le texte
      presentationText.classList.add('d-none');
      this.textContent = 'Afficher le texte'; // Changer le texte du bouton
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


