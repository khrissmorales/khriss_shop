// Regístro
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registerForm');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        formData.append('action', 'register');

        try {
            const response = await fetch('api/auth_api.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status) {
                if(result.rol == 1){
                    form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: result.msg + ' **** Usuario administrador creado **** ',
                        didClose: () => {
                            window.location.href = '?controller=views&action=login';
                        }
                    });
                } else {
                    form.reset();
                    Toast.fire({
                        icon: 'success',
                        title: result.msg || 'Usuario registrado con éxito',
                        didClose: () => {
                            window.location.href = '?controller=views&action=login'
                        }
                    });
                }
            } else {
                Toast.fire({
                    icon: 'error',
                    title: result.msg || 'Ocurrió un error inesperado'
                });
            }
        } catch (error) {
            Toast.fire({
                icon: 'error',
                title: 'Error al conectar con el servidor'
            });
        }
    });
});