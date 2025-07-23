<?php
require_once '../config/db.php';

class AuthModel {
    private $conn;

    public function __construct() {
        $this->conn = getDBConnection();
    }

    public function register($nombre, $email, $password) {
        if (!$nombre || !$email || !$password) {
            return ['status' => false, 'msg' => 'Faltan datos'];
        }

        // Verificar si el email ya existe
        $checkQuery = "SELECT COUNT(*) FROM users WHERE email = :email";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();
        $exists = $checkStmt->fetchColumn();

        if ($exists > 0) {
            return ['status' => false, 'msg' => 'El correo ya está registrado'];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        try {
            $stmt->execute();
            return ['status' => true, 'msg' => 'Usuario registrado con éxito'];
        } catch (PDOException $e) {
            return ['status' => false, 'msg' => 'Error al registrar el usuario: ' . $e->getMessage()];
        }
    }

    public function login($email, $password) {
        if (!$email || !$password) {
            return ['status' => false, 'msg' => 'Faltan datos'];
        }
    
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
    
        try {
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verificar si el usuario fue encontrado
            if ($user && password_verify($password, $user['password'])) {
                // Verificar que los índices existan antes de usarlos
                if (isset($user['id']) && isset($user['name']) && isset($user['email'])) {
                    $_SESSION['user_id'] = $user['id']; 
                    $_SESSION['user_name'] = $user['name']; 
                    return ['status' => true, 'msg' => 'Login exitoso'];
                } else {
                    return ['status' => false, 'msg' => 'Datos de usuario incompletos'];
                }
            } else {
                return ['status' => false, 'msg' => 'Credenciales incorrectas'];
            }
        } catch (PDOException $e) {
            return ['status' => false, 'msg' => 'Error al verificar las credenciales: ' . $e->getMessage()];
        }
    }
     

    public function logout() {
        session_start();
        session_destroy();
        return ['status' => true, 'msg' => 'Sesión cerrada con éxito'];
    }
}
?>