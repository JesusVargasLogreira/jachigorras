document.addEventListener('DOMContentLoaded', function() {
    // Cambiar entre formularios
    document.getElementById('show-register').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('register-form').style.display = 'block';
    });

    document.getElementById('show-login').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('register-form').style.display = 'none';
        document.getElementById('login-form').style.display = 'block';
    });

    // Validaciones de formularios
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    loginForm.addEventListener('submit', validateLogin);
    registerForm.addEventListener('submit', validateRegister);

    function validateLogin(e) {
        const email = document.getElementById('login-email').value;
        const password = document.getElementById('login-password').value;

        if(!validateEmail(email) || password.length < 6) {
            e.preventDefault();
            alert('Por favor verifica tus datos');
        }
    }

    function validateRegister(e) {
        const username = document.getElementById('reg-name').value;
        const email = document.getElementById('reg-email').value;
        const password = document.getElementById('reg-password').value;

        if(username.length < 3 || !validateEmail(email) || password.length < 6) {
            e.preventDefault();
            alert('Por favor verifica tus datos');
        }
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});