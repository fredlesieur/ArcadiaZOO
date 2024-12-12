document.getElementById('animal_id').addEventListener('change', function() {
   let animalId = this.value;
    if (animalId) {
        // Envoi d'une requête AJAX pour récupérer le dernier rapport de l'animal
        fetch('/rapport/get_last_rapport/' + animalId)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    // Remplir les champs nourriture_preconisee et grammage_preconise
                    document.getElementById('nourriture_preconisee').value = data.nourriture_preconisee || '';
                    document.getElementById('grammage_preconise').value = data.grammage_preconise || '';
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
});

