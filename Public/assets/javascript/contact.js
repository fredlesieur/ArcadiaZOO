document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi par défaut du formulaire

    // Récupérer les données du formulaire
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Construire un objet pour les données du formulaire
    const formData = new URLSearchParams();
    formData.append('nom', nom);
    formData.append('prenom', prenom);
    formData.append('email', email);
    formData.append('message', message);

    // Envoyer les données avec fetch
    fetch('/Contact/envoyerMessage', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: formData.toString() // Transformer l'objet en chaîne de requête
    })
    .then(response => {
        // Vérifier si la réponse est OK (statut 200)
        if (!response.ok) {
            throw new Error('Erreur lors de l\'envoi du message.');
        }
        return response.json(); // Lire la réponse JSON
    })
    .then(data => {
        if (data.success) {
            alert('Message envoyé avec succès!');
        } else {
            alert('Erreur lors de l\'envoi du message.');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de l\'envoi du message.');
    });
});

