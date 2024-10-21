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


