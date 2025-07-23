// Toats
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
});

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('darkModeSwitch');
    const body = document.getElementById('mainBody');
    const navbar = document.querySelector('.navbar');

    function activarModoOscuro() {
        body.classList.replace('bg-light', 'bg-dark');
        body.classList.replace('text-dark', 'text-light');

        navbar.classList.replace('navbar-light', 'navbar-dark');
        navbar.classList.replace('bg-light', 'bg-dark');

        localStorage.setItem('darkMode', 'true');
    }

    function desactivarModoOscuro() {
        body.classList.replace('bg-dark', 'bg-light');
        body.classList.replace('text-light', 'text-dark');

        navbar.classList.replace('navbar-dark', 'navbar-light');
        navbar.classList.replace('bg-dark', 'bg-light');

        localStorage.setItem('darkMode', 'false');
    }

    // Aplicar configuración guardada
    if (localStorage.getItem('darkMode') === 'true') {
        activarModoOscuro();
        toggle.checked = true;
    }

    toggle.addEventListener('change', () => {
        if (toggle.checked) {
            activarModoOscuro();
        } else {
            desactivarModoOscuro();
        }
    });
});
