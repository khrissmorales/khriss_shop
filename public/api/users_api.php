<?php
require_once '../models/UsersModel.php';

header('Content-Type: application/json');
// Crear instancia del modelo
$users = new UsersModel();
$method = $_SERVER['REQUEST_METHOD'];

// Detectar 'action' según método
parse_str(file_get_contents("php://input"), $inputData); // Captura datos en DELETE si vienen como x-www-form-urlencoded
$action = $_POST['action'] ?? $inputData['action'] ?? $_GET['action'] ?? '';

// Lista blanca de acciones permitidas
$accionesPermitidas = ['getUserProfile', 'updateProfile', 'deleteUser'];
if (empty($action) || !in_array($action, $accionesPermitidas)) {
    echo json_encode(['status' => false, 'msg' => 'Acción no válida o no especificada']);
    exit;
}

// Iniciar sesión si se requiere
$sesionStart = ['getUserProfile', 'updateProfile', 'deleteUser'];
if (in_array($action, $sesionStart)) {
    session_start();
}

$idUsuario = $_SESSION['user']['id'] ?? null;
if (!$idUsuario) {
    echo json_encode(['status' => false, 'msg' => 'Usuario no autenticado']);
    exit;
}

switch ($method) {
    case 'GET':
        switch ($action) {
            case 'getUserProfile':
                echo json_encode($users->getUserProfile($idUsuario));
                break;

            default:
                echo json_encode(['status' => false, 'msg' => 'Acción GET no reconocida']);
                break;
        }
        break;

    case 'POST':
        switch ($action) {
            case 'updateProfile':
                $data = [
                    'nombre'       => $_POST['nombre'] ?? '',
                    'correo'       => $_POST['correo'] ?? '',
                    'clave_actual' => $_POST['clave_actual'] ?? '',
                    'clave_nueva'  => $_POST['clave_nueva'] ?? ''
                ];
                echo json_encode($users->updateProfile($idUsuario, $data));
                break;

            default:
                echo json_encode(['status' => false, 'msg' => 'Acción POST no reconocida']);
                break;
        }
        break;

    case 'DELETE':
        switch ($action) {
            case 'deleteUser':
                echo json_encode($users->deleteUser($idUsuario));
                break;

            default:
                echo json_encode(['status' => false, 'msg' => 'Acción DELETE no reconocida']);
                break;
        }
        break;

    default:
        echo json_encode(['status' => false, 'msg' => 'Método HTTP no soportado']);
        break;
}