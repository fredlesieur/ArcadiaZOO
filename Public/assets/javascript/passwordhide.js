document.querySelectorAll('.togglePassword').forEach(function (toggleButton) {
    toggleButton.addEventListener('click', function () {
        const passwordInput = this.parentElement.querySelector('input');
        const togglePasswordIcon = this.querySelector('i');

        // Basculer entre type 'password' et 'text'
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    });
});

document.querySelector('#loginForm').addEventListener('submit', function (e) {
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#mdp').value;

    // Vérifier que les champs ne sont pas vides et que le mot de passe a au moins 8 caractères
    if (!email || password.length < 5) {
        e.preventDefault(); // Annuler l'envoi du formulaire
        alert("L'email doit être valide et le mot de passe doit contenir au moins 5 caractères.");
    }
});

