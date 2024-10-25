// compteur.js
document.addEventListener("DOMContentLoaded", function () {
    // Variable de contrôle pour éviter les appels multiples
    let viewIncremented = false;

    // Détecte si l'ID de l'animal est présent sur la page
    const animalIdElement = document.getElementById("animalId");

    if (animalIdElement && !viewIncremented) {
        const animalId = animalIdElement.value;
        console.log("Incrémentation pour l'ID animal : ", animalId);

        // Marquer l'incrémentation comme effectuée
        viewIncremented = true;

        // Effectue un appel fetch pour incrémenter les vues
        fetch(`/animal/incrementViews`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": document.getElementById("csrf_token").value // Assure la protection CSRF
            },
            body: JSON.stringify({ id: animalId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Vue incrémentée avec succès");
            } else {
                console.log("Erreur lors de l'incrémentation des vues:", data.message);
            }
        })
        .catch(error => console.error("Erreur:", error));
    }
});
