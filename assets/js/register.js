// Registro
$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        const formData = $(this).serialize() + '&action=register';

        $.ajax({
            url: '../api/api.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    Toast.fire({
                        icon: 'success',
                        title: response.msg || 'Guardado con éxito'
                    });
                    $('#registerForm')[0].reset();
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
