document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('categorie');
    const newCategoryField = document.getElementById('new-category-field');

    // Fonction pour basculer l'affichage du champ de nouvelle catégorie
    function toggleNewCategoryField() {
        if (categorySelect.value === 'autre') {
            newCategoryField.style.display = 'block';
        } else {
            newCategoryField.style.display = 'none';
        }
    }

    // Lancer l'événement onchange lors du changement de catégorie
    categorySelect.addEventListener('change', toggleNewCategoryField);

    // Initialiser au chargement de la page
    toggleNewCategoryField();
});
