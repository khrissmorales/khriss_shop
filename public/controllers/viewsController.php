<?php
class viewsController {
    // Autenticación
    public function index() {
        $contenido = 'views/store/home.php';
        $titulo = 'Inicio';
        require_once "views/base.php";
    }
    public function login() {
        $contenido = 'views/auth/login.html';
        $titulo = 'Iniciar sesión';
        require_once "views/base.php";
    }
    public function register() {
        $contenido = 'views/auth/register.php';
        $titulo = 'Regístrate';
        require_once "views/base.php";
    }
    public function profile() {
        $contenido = 'views/users/profile.html';
        $titulo = 'Perfil';
        require_once "views/base.php";
    }

    // Navegación
    public function boys() {
        $contenido = 'views/store/boys.php';
        $titulo = 'Niños';
        require_once "views/base.php";
    }
    public function womens() {
        $contenido = 'views/store/womens.php';
        $titulo = 'Mujeres';
        require_once "views/base.php";
    }
    public function mens() {
        $contenido = 'views/store/mens.php';
        $titulo = 'Hombres';
        require_once "views/base.php";
    }
    public function accesorios() {
        $contenido = 'views/store/accesorios.php';
        $titulo = 'Accesorios';
        require_once "views/base.php";
    }
    public function ofertas() {
        $contenido = 'views/store/ofertas.php';
        $titulo = 'Ofertas';
        require_once "views/base.php";
    }
}