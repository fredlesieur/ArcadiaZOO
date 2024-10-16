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


