<?php
require_once '../models/AuthModel.php';

header('Content-Type: application/json');

$auth = new AuthModel();
$method = $_SERVER['REQUEST_METHOD'];
$action = $_POST['action'] ?? '';

// Lista blanca de acciones válidas
$accionesPermitidas = ['register', 'login', 'logout'];

if (empty($action) || !in_array($action, $accionesPermitidas)) {
    echo json_encode(['status' => false, 'msg' => 'Acción no válida o no especificada']);
    exit;
}

// Solo iniciamos sesión donde se necesita
$sesionStart = ['login', 'logout'];

if (in_array($action, $sesionStart)) {
    session_start();
}

switch ($method) {
    case 'GET':
        break;
        
    case 'POST':
        switch ($action){
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
                echo json_encode(['status' => false, 'msg' => "Acción no reconocida"]);
        }
    case 'DELETE':
        break;

    case 'PUT':
        break;

    default:
        echo json_encode(['status' => false, 'msg' => 'Petición no reconocida']);
}