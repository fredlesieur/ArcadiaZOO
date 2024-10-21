document.addEventListener("DOMContentLoaded", function() {
    const toggleTextButtons = document.querySelectorAll('.toggle-text-btn'); // Cibler tous les boutons
    const longTexts = document.querySelectorAll('.long-text'); // Cibler tous les textes longs

    toggleTextButtons.forEach(function(button, index) {
        const correspondingText = longTexts[index]; 

        if (button && correspondingText) {
            button.addEventListener('click', function() {
                // Basculer la classe show
                if (correspondingText.classList.contains('show')) {
                    correspondingText.classList.remove('show');
                    button.textContent = 'Afficher le texte';
                } else {
                    correspondingText.classList.add('show');
                    button.textContent = 'Cacher le texte';
                }
            });
        }
    });
});
