console.log("compteur.js chargé");

document.querySelectorAll('a[href^="/animal/viewAnimal"]').forEach(button => {
    console.log("Bouton trouvé : ", button);
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Empêche la redirection immédiate
        const animalId = this.getAttribute('href').split('/').pop(); // Récupère l'ID de l'animal à partir de l'URL
        console.log("ID de l'animal : ", animalId);

        const animalLink = this.getAttribute('href'); // Récupère le lien de la fiche de l'animal

        // Envoi de la requête AJAX pour incrémenter le compteur de vues
        fetch(`/animal/incrementViews/${animalId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Réponse serveur :', data);
            if (data.success) {
                // Pour l'instant, on ne redirige pas, on log juste un message pour voir les erreurs
                console.log('Redirection vers la fiche de l\'animal après la mise à jour.');
                // window.location.href = animalLink; <-- Ligne commentée temporairement pour empêcher la redirection
            }
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du compteur de vues', error);
            // Pas de redirection en cas d'erreur pour qu'on puisse voir ce qu'il se passe
            // window.location.href = animalLink; <-- Ligne commentée temporairement
        });
    });
});
