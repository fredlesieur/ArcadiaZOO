window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM entièrement chargé et analysé');

    document.querySelectorAll('a[href^="/animal/viewAnimal"]').forEach(button => {
        console.log("Bouton trouvé : ", button);
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche la redirection immédiate
            const animalId = this.getAttribute('href').split('/').pop(); // Récupère l'ID de l'animal à partir de l'URL
            console.log("ID de l'animal : ", animalId);

            const animalLink = this.getAttribute('href'); // Récupère le lien de la fiche de l'animal

            // Récupérer le token CSRF depuis le champ hidden dans la page
            const csrfToken = document.querySelector('#csrf_token').value;

            // Envoi de la requête AJAX pour incrémenter le compteur de vues
            fetch(`/animal/incrementViews/${animalId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    csrf_token: csrfToken // Envoi du token CSRF dans le corps de la requête
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Réponse serveur :', data);
                if (data.success) {
                    console.log('Redirection vers la fiche de l\'animal après la mise à jour.');
                    window.location.href = animalLink; // Redirection après mise à jour
                }
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour du compteur de vues', error);
            });
        });
    });
});


