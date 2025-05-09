<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title><?= $titulo ?></title>
</head>
<body id="mainBody" class="bg-light text-dark">
<?php
    session_start();
    $userLoggedIn = isset($_SESSION['user_id']);
?>
    <!-- Encabezado común -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">LKZ STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" href="?controller=views&action=index">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Hombres</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Mujeres</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Niños</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Ofertas</a>
                    </li>
                </ul>

                <form class="d-flex me-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Buscar">
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-2">
                    <a class="nav-link position-relative" href="#">
                        <i class="bi bi-cart3"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">productos en carrito</span>
                        </span>
                    </a>
                    </li>
                    <?php session_start(); ?>
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="dropdown">
                            <a class="btn btn-outline-success dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['user']['name']) ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="?controller=views&action=profile">Mi perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="?controller=auth&action=logout">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="?controller=views&action=login">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="?controller=views&action=register">Registrarse</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/js/darkmode.js"></script>

    <!-- Scripts cargados dinámicamente de acuerdo a la vista -->
    <?php if (isset($contenido)): ?>
        <?php if ($contenido === 'views/register.html'): ?>
            <script src="../assets/js/register.js"></script>
        <?php elseif ($contenido === 'views/login.html'): ?>
            <script src="../assets/js/login.js"></script>
        <?php elseif ($contenido === 'views/producto_detalle.html'): ?>
            <script src="assets/js/producto_detalle.js"></script>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>