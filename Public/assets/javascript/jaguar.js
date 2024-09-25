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
