// Registrar un nuevo usuario.
$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '../api/public/register.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                alert(response.message);

                if (response.status === 'ok') {
                    $('#registerForm')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud:');
                console.error(xhr);  // Muestra el objeto de la respuesta de error
                console.error(status);
                console.error(error);
        
                alert('Ocurrió un error al registrar el usuario.');
            }
        });
    });
});
