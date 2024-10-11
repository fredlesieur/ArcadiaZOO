document.querySelectorAll('.animal-card').forEach(card => {
    card.addEventListener('click', function() {
        const animalId = this.dataset.animalId;

        // Envoi de la requête AJAX
        fetch(`/increment-views/${animalId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: animalId }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Compteur de vues mis à jour avec succès', data);
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du compteur de vues', error);
        });
    });
});