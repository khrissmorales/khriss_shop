<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="assets/img/icon.svg">

    <script>
        const darkMode = localStorage.getItem('darkMode');
        if (darkMode === 'true') {
            document.documentElement.classList.add('dark-mode');
        }
    </script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/base.css">
    <title><?= $titulo ?></title>
</head>
<body id="mainBody" class="">
<?php
    session_start();
    $userLoggedIn = isset($_SESSION['user']);
?>
    <!-- Encabezado común -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="?controller=views&action=index">LKZ STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'index') ? 'current-category' : '' ?>" href="?controller=views&action=index">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'mens') ? 'current-category' : '' ?>" href="?controller=views&action=mens">Hombres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'womens') ? 'current-category' : '' ?>" href="?controller=views&action=womens">Mujeres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'boys') ? 'current-category' : '' ?>" href="?controller=views&action=boys">Niños</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'ofertas') ? 'current-category' : '' ?>" href="?controller=views&action=ofertas">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($_GET['action'] === 'accesorios') ? 'current-category' : '' ?>" href="?controller=views&action=accesorios">Accesorios</a>
                    </li>
                </ul>

                <form class="d-flex me-3" role="search">
                    <input class="form-control input-search me-2" type="search" placeholder="Buscar productos" aria-label="Buscar">
                    <button class="btn btn-outline-dark search-button" type="submit">Buscar</button>
                </form>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                        <a class="nav-link position-relative" href="#">
                            <i class="bi bi-cart3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                                <span class="visually-hidden">Productos en carrito</span>
                            </span>
                        </a>
                    </li>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-success" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['user']['name']) ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="?controller=views&action=profile">Mi perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a id="logoutBtn" class="dropdown-item text-danger" href="#">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-primary me-2" href="?controller=views&action=login">Acceder</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success" href="?controller=views&action=register">Regístro</a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
            <div class="form-check form-switch ms-3">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                <label class="form-check-label" for="darkModeSwitch">🌙</label>
            </div>
        </div>
    </nav>
    
    <!-- Contenido dinámico -->
    <div class="container mt-4">
        <?php require_once($contenido); ?>
    </div>
    
    <!-- CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/darkmode.js"></script>
    <script src="assets/js/logout.js"></script>

    <!-- Scripts cargados dinámicamente de acuerdo a la vista -->
    <?php if (isset($contenido)): ?>
        <?php
            $scripts = [
                'views/auth/login.html'       => 'assets/js/auth/login.js',
                'views/auth/register.html'    => 'assets/js/auth/register.js',
                'views/user/profile.html'     => 'assets/js/user/profile.js',
                'views/store/boys.php'        => 'assets/js/store/boys.js',
                'views/store/womens.php'      => 'assets/js/store/womens.js',
                'views/store/mens.php'        => 'assets/js/store/mens.js',
            ];

            if (isset($scripts[$contenido])) {
                echo '<script src="' . $scripts[$contenido] . '"></script>';
            }
        ?>
    <?php endif; ?>

    <footer class="py-5 mt-5 border-top" id="mainFooter">
        <div class="container">
            <div class="row">
                <!-- Logo y descripción -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">LKZ STORE</h5>
                    <p>Moda, estilo y calidad al alcance de un clic. ¡Descubre nuestras colecciones para toda la familia!</p>
                </div>

                <!-- Enlaces útiles -->
                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold">Enlaces</h6>
                    <ul class="list-unstyled">
                        <li><a href="?controller=views&action=index" class="text-decoration-none nav-link">Inicio</a></li>
                        <li><a href="?controller=views&action=ofertas" class="text-decoration-none nav-link">Ofertas</a></li>
                    </ul>
                </div>

                <!-- Contacto y redes -->
                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold">Contáctanos</h6>
                    <p>
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:khriss201403@gmail.com" class="text-decoration-none text-reset">khriss201403@gmail.com</a>
                    </p>
                    <p>
                        <i class="bi bi-phone"></i>
                        <a href="tel:+573005352422" class="text-decoration-none text-reset">+57 300 535 24 22</a>
                    </p>
                    <div>
                        <a href="https://www.facebook.com/khrissmoraless" target="_blank" rel="noopener" class="text-redes me-3">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="text-redes me-3">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="text-redes">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <small class="text-muted">&copy; <?= date('Y') ?> LKZ STORE. Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>
</body>
</html>