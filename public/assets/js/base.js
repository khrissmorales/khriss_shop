// Toats
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    // Aplica automáticamente el modo oscuro si el sistema lo usa
    const usarModoOscuro = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (usarModoOscuro) {
        document.documentElement.classList.add('dark-mode');
    } else {
        document.documentElement.classList.remove('dark-mode');
    }

    // Opcional: Escuchar si el usuario cambia el tema del sistema en tiempo real
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (e.matches) {
            document.documentElement.classList.add('dark-mode');
        } else {
            document.documentElement.classList.remove('dark-mode');
        }
    });
});