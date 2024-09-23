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


//cacher les images en fonction des ecrans
document.addEventListener('DOMContentLoaded', function() {
  // Sélectionner tous les éléments représentant des animaux
  const animals = document.querySelectorAll('.row .col-lg-3');

  function displayAnimals() {
      let itemsToShow = 12; // Par défaut, on affiche 12 images sur les grands écrans

      // Vérifier la largeur de la fenêtre
      if (window.innerWidth < 768) {
          itemsToShow = 6; // 6 images sur les petits écrans (mobile)
      }

      animals.forEach(function(animal, index) {
          // Masquer tous les animaux au départ
          animal.classList.add('hidden');

          // Afficher seulement le nombre d'animaux voulu
          if (index < itemsToShow) {
              animal.classList.remove('hidden');
          }
      });
  }

  // Exécuter la fonction pour la première fois au chargement
  displayAnimals();

  // Ré-exécuter la fonction lorsque la taille de la fenêtre change
  window.addEventListener('resize', displayAnimals);
});

