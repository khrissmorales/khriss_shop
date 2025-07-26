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

    function activarModoOscuro() {
        document.documentElement.classList.add('dark-mode');
        localStorage.setItem('darkMode', 'true');
    }

    function desactivarModoOscuro() {
        document.documentElement.classList.remove('dark-mode');
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