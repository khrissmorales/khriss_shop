// Iniciar sesión de usuario.
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '../api/public/login.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                alert(response.message);

                if (response.status === 'ok') {
                    window.location.href = '?controller=views&action=index';
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud:');
                console.error(xhr);
                console.error(status);
                console.error(error);

                alert('Ocurrió un error al iniciar sesión.');
            }
        });
    });
});