<?php
require_once '../public/models/AuthModel.php';
session_start();
header('Content-Type: application/json');

$auth = new AuthModel();

// Verifica que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'msg' => 'Método no permitido']);
    exit;
}

// Lista blanca de acciones válidas
$accionesPermitidas = ['register', 'login', 'logout'];

// Captura la acción del POST
$action = $_POST['action'] ?? '';

// Validación
if (empty($action) || !in_array($action, $accionesPermitidas)) {
    echo json_encode(['status' => false, 'msg' => 'Acción no válida o no especificada']);
    exit;
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
        echo json_encode(['status' => false, 'msg' => 'Acción no válida']);
}
