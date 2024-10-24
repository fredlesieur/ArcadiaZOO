document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('a[href^="/animal/viewAnimal"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche la redirection immédiate

            const animalId = this.getAttribute('href').split('/').pop(); // Récupère l'ID de l'animal
            const animalLink = this.getAttribute('href'); // Récupère le lien de la fiche de l'animal

            // Récupérer le token CSRF depuis le champ hidden dans la page
            const csrfToken = document.querySelector('#csrf_token').value;

            console.log("ID de l'animal : ", animalId);
            console.log("Token CSRF trouvé : ", csrfToken);

            // Envoi de la requête AJAX pour incrémenter le compteur de vues
            fetch(`/animal/incrementViews/${animalId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    csrf_token: csrfToken // Envoi du token CSRF dans le corps de la requête
                })
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Erreur dans la requête : ' + response.status);
                }
            })
            .then(data => {
                console.log('Réponse serveur :', data);
                if (data.success) {
                    window.location.href = animalLink; // Redirection après mise à jour
                } else {
                    console.error('Erreur côté serveur :', data.message);
                }
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour du compteur de vues', error);
            });
        });
    });
});
