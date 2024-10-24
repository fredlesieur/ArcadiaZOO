document.querySelectorAll('.btn-info').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Empêche la redirection immédiate

        const animalId = this.getAttribute('href').split('/').pop(); // Récupère l'ID de l'animal à partir de l'URL
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
            if (data.success) {
                console.log('Compteur de vues mis à jour avec succès', data);
                // Redirection vers la fiche de l'animal après mise à jour du compteur
                window.location.href = animalLink;
            } else {
                console.error('Erreur lors de la mise à jour du compteur de vues', data.message);
                window.location.href = animalLink;
            }
        })
        .catch(error => {
            console.error('Erreur lors de la mise à jour du compteur de vues', error);
            window.location.href = animalLink;
        });
    });
});
