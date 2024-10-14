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
