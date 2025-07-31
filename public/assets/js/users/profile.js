document.addEventListener('DOMContentLoaded', async () => {
    const form = document.getElementById('perfilForm');
    const btnEditar = document.getElementById('btnEditar');
    const btnGuardar = document.getElementById('btnGuardar');

    const nombre = document.getElementById('nombre');
    const correo = document.getElementById('correo');

    const grupoClaveActual = document.getElementById('grupoClaveActual');
    const grupoClaveNueva = document.getElementById('grupoClaveNueva');
    const claveActual = document.getElementById('claveActual');
    const claveNueva = document.getElementById('claveNueva');

    // Cargar datos del perfil
    try {
        const response = await fetch('api/users_api.php?action=getUserProfile', {
            method: 'GET'
        });

        const data = await response.json();
        if (data.status) {
            nombre.value = data.data.name;
            correo.value = data.data.email;
        } else {
            Toast.fire({
                icon: 'error',
                title: data.msg || 'Error al cargar el perfil'
            });
        }
    } catch (error) {
        Toast.fire({
            icon: 'error',
            title: 'Error al conectar con el servidor GET'
        });
    }

    // Habilitar edición
    btnEditar.addEventListener('click', () => {
        nombre.disabled = false;
        correo.disabled = false;

        btnGuardar.classList.remove('d-none');
        btnEditar.classList.add('d-none');

        grupoClaveActual.classList.remove('d-none');
        grupoClaveNueva.classList.remove('d-none');
    });

    // Guardar cambios
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('action', 'updateProfile');
        formData.append('nombre', nombre.value);
        formData.append('correo', correo.value);

        formData.append('clave_actual', claveActual.value);
        formData.append('clave_nueva', claveNueva.value);


        try {
            const response = await fetch('api/users_api.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status) {
                Toast.fire({
                    icon: 'success',
                    title: data.msg || 'Perfil actualizado correctamente'
                });

                if (data.forceLogout) {
                    setTimeout(() => {
                        window.location.href = '?controller=views&action=login';
                    }, 1000);
                    return;
                }

                nombre.disabled = true;
                correo.disabled = true;

                btnGuardar.classList.add('d-none');
                btnEditar.classList.remove('d-none');
            } else {
                Toast.fire({
                    icon: 'error',
                    title: data.msg || 'No se pudo actualizar el perfil'
                });
            }
        } catch (error) {
            Toast.fire({
                icon: 'error',
                title: 'Error al conectar con el servidor POST'
            });
        }
    });
});