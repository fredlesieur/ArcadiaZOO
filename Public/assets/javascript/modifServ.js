function toggleNewCategoryField(selectElement) {
    const newCategoryField = document.getElementById('new-category-field');
    if (selectElement.value === 'autre') {
        newCategoryField.style.display = 'block';
    } else {
        newCategoryField.style.display = 'none';
    }
}