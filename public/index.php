<?php

// Autocargar controladores
spl_autoload_register(function ($class) {
    if (file_exists("controllers/$class.php")) {
        require_once "controllers/$class.php";
    }
});

// Obtener ruta desde la URL, por ejemplo: ?controller=Home&action=index
$controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'viewsController';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// Verificar si el controlador existe
if (class_exists($controllerName)) {
    $controller = new $controllerName();

    // Verificar si el método existe
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        echo "Error: Método '$actionName' no encontrado en el controlador '$controllerName'.";
    }
} else {
    echo "Error: Controlador '$controllerName' no encontrado.";
}