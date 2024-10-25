// compteur.js

document.addEventListener("DOMContentLoaded", function () {
    const viewButtons = document.querySelectorAll(".btn-info");

    viewButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const animalId = button.getAttribute("href").split("/").pop();
            const csrfToken = document.getElementById("csrf_token").value;

            fetch(`/api/incrementViews`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": csrfToken
                },
                body: JSON.stringify({ id: animalId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = button.getAttribute("href");
                } else {
                    console.error("Erreur d'incrémentation du compteur de vues.");
                    alert("Erreur d'incrémentation.");
                }
            })
            .catch(error => {
                console.error("Erreur de requête : ", error);
                alert("Une erreur s'est produite. Veuillez réessayer.");
            });
        });
    });
});
