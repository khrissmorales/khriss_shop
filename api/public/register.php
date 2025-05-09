<?php
require_once '../../public/models/AuthModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica si los parámetros están presentes
    if (empty($nombre) || empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
        exit;
    }

    try {
        $authModel = new AuthModel();
        $response = $authModel->register($nombre, $email, $password);
        echo json_encode($response);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Ocurrió un error en el servidor']);
    }
}
?>
