// Login
document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(loginForm);
        formData.append('action', 'login');

        try {
            const response = await fetch('api/auth_api.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status) {
                Toast.fire({
                    icon: 'success',
                    title: result.msg || 'Inicio de sesión exitoso',
                    didClose: () => {
                        window.location.href = '?controller=views&action=index';
                    }
                });
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