<?php
// admin.php
spl_autoload_register(function ($class) {
    if (file_exists("admin/controllers/$class.php")) {
        require_once "admin/controllers/$class.php";
    }
});

$controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'ProductController'; // Default admin controller
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index'; // Default action

if (class_exists($controllerName)) {
    $controller = new $controllerName();

    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        echo "Error: Método '$actionName' no encontrado en el controlador '$controllerName'.";
    }
} else {
    echo "Error: Controlador '$controllerName' no encontrado.";
}