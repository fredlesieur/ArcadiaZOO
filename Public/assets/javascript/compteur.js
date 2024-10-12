document.querySelectorAll('.animal-card').forEach(card => {
    card.addEventListener('click', function(event) {
        event.preventDefault(); // Empêche la redirection immédiate

        const animalId = this.dataset.animalId;
        const animalLink = this.querySelector('.button').getAttribute('href'); // Récupère le lien de la fiche de l'animal

        // Envoi de la requête AJAX pour incrémenter le compteur de vues
        fetch(`/animal/incrementViews/${animalId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: animalId }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Compteur de vues mis à jour avec succès', data);
            // Redirection vers la fiche de l'animal après mise à jour du compteur
            window.location.href = animalLink;
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du compteur de vues', error);
            // En cas d'erreur, redirection vers la fiche de l'animal
            window.location.href = animalLink;
        });
    });
});