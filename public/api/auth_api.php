<?php
require_once '../models/AuthModel.php';

header('Content-Type: application/json');

$auth = new AuthModel();

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'msg' => 'Método no permitido']);
    exit;
}

$action = $_POST['action'] ?? '';

// Lista blanca de acciones válidas
$accionesPermitidas = ['register', 'login', 'logout'];

if (!in_array($action, $accionesPermitidas)) {
    echo json_encode(['status' => false, 'msg' => 'Acción no válida o no especificada']);
    exit;
}

// Iniciar sesión si es necesario
$sessionStart = ['login', 'logout'];
if (in_array($action, $sessionStart)) {
    session_start();
}

switch ($action) {
    case 'register':
        $nombre = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        echo json_encode($auth->register($nombre, $email, $password));
        break;

    case 'login':
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        echo json_encode($auth->login($email, $password));
        break;

    case 'logout':
        echo json_encode($auth->logout());
        break;

    default:
        echo json_encode(['status' => false, 'msg' => 'Acción POST no reconocida']);
}