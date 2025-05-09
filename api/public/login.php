<?php
require_once '../../public/models/AuthModel.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica si los parámetros están presentes
    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        exit;
    }

    try {
        $authModel = new AuthModel();
        $user = $authModel->login($email, $password);

        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];

            echo json_encode(['status' => 'ok', 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Credenciales incorrectas']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error en el servidor']);
    }
}
?>

