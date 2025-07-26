// Cerrar sesión
document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logoutBtn');

    if (logoutBtn) {
        logoutBtn.addEventListener('click', async () => {
            const formData = new FormData();
            formData.append('action', 'logout');

            try {
                const response = await fetch('api/auth_api.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status) {
                    Toast.fire({
                        icon: 'success',
                        title: result.msg || 'Sesión cerrada'
                    });
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 2000);
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: result.msg || 'No se pudo cerrar sesión'
                    });
                }
            } catch (error) {
                Toast.fire({
                    icon: 'error',
                    title: 'Error al conectar con el servidor'
                });
            }
        });
    }
});
