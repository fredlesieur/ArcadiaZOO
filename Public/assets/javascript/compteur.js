console.log("Fichier compteur.js chargé avec succès.");

document.addEventListener("DOMContentLoaded", function () {
    const animalIdElement = document.getElementById("animalId");
    console.log("Incrémentation pour l'ID animal : ", animalIdElement ? animalIdElement.value : "Aucun ID détecté");

    if (animalIdElement) {
        const animalId = animalIdElement.value;

       // Ajoute un log pour chaque appel fetch
        console.log("Appel à l'incrémentation de vue pour l'ID :", animalId);
        fetch(`/animal/incrementViews`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": document.getElementById("csrf_token").value
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
