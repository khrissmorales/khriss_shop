// Iniciar sesión
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize() + '&action=login';

        $.ajax({
            url: '../api/api.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    Toast.fire({
                        icon: 'success',
                        title: response.msg || 'Inicio de sesión exitoso'
                    });
                    setTimeout(function() {
                        window.location.href = '?controller=views&action=index';
                    }, 3000);
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.msg || 'Ocurrió un error inesperado'
                    });
                }
            },
            error: function(_xhr) {
                Toast.fire({
                    icon: 'error',
                    title: 'Error al conectar con el servidor'
                });
            }
        });
    });
});