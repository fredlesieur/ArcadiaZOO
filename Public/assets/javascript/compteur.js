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
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Compteur de vues mis à jour avec succès', data);
                // Redirection vers la fiche de l'animal après mise à jour du compteur
                window.location.href = animalLink;
            } else {
                console.error('Erreur lors de la mise à jour du compteur de vues', data.message);
                // Redirection vers la fiche de l'animal même en cas d'erreur
                window.location.href = animalLink;
            }
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du compteur de vues', error);
            // Redirection vers la fiche de l'animal en cas d'erreur réseau
            window.location.href = animalLink;
        });
    });
});
