<?php

class viewsController {
    public function index() {
        $contenido = 'views/home.html';
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
}