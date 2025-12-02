$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        const email = $('#username').val().trim();
        const password = $('#password').val().trim();
        const loginMessage = $('#login-message');

        // Validación básica de campos vacíos en el lado del cliente
        if (email.trim() === '' || password.trim() === '') {
            loginMessage.text('Por favor, completa todos los campos.').removeClass('success-message').addClass('error-message');
            return;
        }

        // Validación del formato de email
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailRegex.test(email)) {
            loginMessage.text('Por favor, ingresa un correo electrónico válido.').removeClass('success-message').addClass('error-message');
            return;
        }

        $.ajax({
            url: '../backend/loginvalidacion.php',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loginMessage.text(response.message).removeClass('error-message').addClass('success-message');
                    // Redirige al usuario a la página de reservas
                    window.location.href = 'reservar.html';
                } else {
                    loginMessage.text(response.message).removeClass('success-message').addClass('error-message');
                }
            },
            error: function() {
                loginMessage.text('Error de conexión con el servidor.').removeClass('success-message').addClass('error-message');
            }
        });
    });
});