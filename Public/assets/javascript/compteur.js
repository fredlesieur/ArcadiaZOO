// compteur.js

document.addEventListener("DOMContentLoaded", function () {
    const viewButtons = document.querySelectorAll(".btn-info");

    viewButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            
            console.log("Clic sur le bouton pour incrémenter la vue");

            const animalId = button.getAttribute("href").split("/").pop();
            const csrfToken = document.getElementById("csrf_token").value;

            fetch(`/animal/incrementViews`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": csrfToken
                },
                body: JSON.stringify({ id: animalId })
            })
            .then(response => response.text()) // Change de .json() à .text() pour voir le contenu complet
            .then(data => {
                console.log("Réponse du serveur :", data);  // Afficher la réponse brute
                try {
                    const jsonData = JSON.parse(data);  // Tenter de parser en JSON
                    if (jsonData.success) {
                        window.location.href = button.getAttribute("href");
                    } else {
                        console.error("Erreur d'incrémentation du compteur de vues.");
                        alert("Erreur d'incrémentation.");
                    }
                } catch (e) {
                    console.error("Erreur lors du parsing JSON :", e);
                }
            })
            .catch(error => {
                console.error("Erreur de requête :", error);
                alert("Une erreur s'est produite. Veuillez réessayer.");
            });
        });
    });
});
