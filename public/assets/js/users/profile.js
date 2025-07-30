document.addEventListener('DOMContentLoaded', async () => {
    const form = document.getElementById('perfilForm');
    const btnEditar = document.getElementById('btnEditar');
    const btnGuardar = document.getElementById('btnGuardar');

    const nombre = document.getElementById('nombre');
    const correo = document.getElementById('correo');
    const clave = document.getElementById('clave');

    // Cargar datos del perfil
    try {
        const response = await fetch('api/users_api.php?action=getUserProfile', {
            method: 'GET'
        });

        const result = await response.json();
        if (result.status) {
            nombre.value = result.nombre;
            correo.value = result.correo;
            clave.value = ''; // por seguridad
        } else {
            Toast.fire({
                icon: 'error',
                title: result.msg || 'Error al cargar el perfil'
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
        clave.disabled = false;

        btnGuardar.classList.remove('d-none');
        btnEditar.classList.add('d-none');
    });

    // Guardar cambios
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('action', 'updateProfile');
        formData.append('nombre', nombre.value);
        formData.append('correo', correo.value);
        formData.append('clave', clave.value);

        try {
            const response = await fetch('api/users_api.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.status) {
                Toast.fire({
                    icon: 'success',
                    title: result.msg || 'Perfil actualizado correctamente'
                });

                nombre.disabled = true;
                correo.disabled = true;
                clave.disabled = true;

                btnGuardar.classList.add('d-none');
                btnEditar.classList.remove('d-none');
            } else {
                Toast.fire({
                    icon: 'error',
                    title: result.msg || 'No se pudo actualizar el perfil'
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