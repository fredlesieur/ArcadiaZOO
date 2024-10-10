document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('mdp');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    // Bascule la visibilité du mot de passe
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
