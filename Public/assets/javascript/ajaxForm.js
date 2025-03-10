document.addEventListener('DOMContentLoaded', () => {
    // Sélectionne tous les formulaires ayant la classe "ajax"
    document.querySelectorAll('form.ajax').forEach(form => {
      form.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de page
  
        let formData = new FormData(this);
        // Si nécessaire, ajoutez ici des champs communs comme le token CSRF ou une action
        // formData.append('csrf_token', 'VOTRE_TOKEN_CSRF');
        // formData.append('action', this.getAttribute('data-action')); // optionnel
  
        fetch(this.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'  // Pour que le serveur sache qu'il s'agit d'une requête AJAX
          }
        })
        .then(response => response.json())
        .then(data => {
          // Affichez la réponse dans un élément dédié, par exemple un div avec l'id "responseMessage"
          const responseMessage = document.getElementById('responseMessage');
          if (responseMessage) {
            responseMessage.innerText = data.message;
          }
          // Vous pouvez aussi faire d'autres traitements (vider le formulaire, rediriger, etc.)
        })
        .catch(error => console.error('Erreur:', error));
      });
    });
  });
  