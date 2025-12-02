$(document).ready(function() {
    // Almacena el correo electrónico en una variable de forma temporal
    const userEmail = "admin@gmail.com"; 
    $('#user-display').text('Bienvenido, ' + userEmail);

    // Validación de fecha: solo a partir del día de hoy
    document.getElementById('fecha').min = new Date().toISOString().split('T')[0];

    $('#reservationForm').on('submit', function(e) {
        //e.preventDefault();

        // Limpiar mensajes de error anteriores
        $('.error-message').text('');
        let isValid = true;

        // Validar campos obligatorios
        if ($('#nombre').val().trim() === '') {
            $('#nombre').next('.error-message').text('El nombre es obligatorio.');
            isValid = false;
        }

        if ($('#telefono').val().trim() === '') {
            $('#telefono').next('.error-message').text('El teléfono es obligatorio.');
            isValid = false;
        }

        if ($('#servicio').val().trim() === '') {
            $('#servicio').next('.error-message').text('Selecciona un servicio.');
            isValid = false;
        }

        if ($('#fecha').val().trim() === '') {
            $('#fecha').next('.error-message').text('La fecha es obligatoria.');
            isValid = false;
        }

        if ($('#hora').val().trim() === '') {
            $('#hora').next('.error-message').text('La hora es obligatoria.');
            isValid = false;
        }

        // Validación de formato de email (si se ingresa)
        const email = $('#email').val().trim();
        if (email !== '' && !email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)) {
            $('#email').next('.error-message').text('Por favor, ingresa un correo válido.');
            isValid = false;
        }

        // Validación de términos y condiciones
        if (!$('#terminos').is(':checked')) {
            $('#terminos').parent().next('.error-message').text('Debes aceptar los términos y condiciones.');
            isValid = false;
        }

        // Validar que la fecha no sea domingo
        const selectedDate = new Date($('#fecha').val());
        if (selectedDate.getDay() === 0) { 
            $('#fecha').next('.error-message').text('Los domingos estamos cerrados.');
            isValid = false;
        }

        if (isValid) {
            //alert('¡Gracias por tu reserva! Te contactaremos pronto para confirmar tu cita.');
            // Aquí se enviaría el formulario si fuera a un servidor
            // this.submit();
        }
    });
});