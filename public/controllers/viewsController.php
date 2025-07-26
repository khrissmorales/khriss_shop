<?php

class viewsController {
    // Autenticación
    public function index() {
        $contenido = 'views/home.php';
        $titulo = 'Inicio';
        require_once "views/base.php";
    }
    public function login() {
        $contenido = 'views/login.html';
        $titulo = 'Iniciar sesión';
        require_once "views/base.php";
    }
    public function register() {
        $contenido = 'views/register.html';
        $titulo = 'Regístrate';
        require_once "views/base.php";
    }
    public function logout() {
        $contenido = 'views/logout_modal.html';
        $titulo = 'Regístrate';
        require_once "views/base.php";
    }
    public function profile() {
        $contenido = 'views/profile.html';
        $titulo = 'Perfil';
        require_once "views/base.php";
    }

    // Navegación
    public function boys() {
        $contenido = 'views/boys.php';
        $titulo = 'Niños';
        require_once "views/base.php";
    }
    public function womens() {
        $contenido = 'views/womens.php';
        $titulo = 'Mujeres';
        require_once "views/base.php";
    }
    public function mens() {
        $contenido = 'views/mens.php';
        $titulo = 'Hombres';
        require_once "views/base.php";
    }
    public function accesorios() {
        $contenido = 'views/accesorios.php';
        $titulo = 'Accesorios';
        require_once "views/base.php";
    }
    public function ofertas() {
        $contenido = 'views/ofertas.php';
        $titulo = 'Ofertas';
        require_once "views/base.php";
    }
}