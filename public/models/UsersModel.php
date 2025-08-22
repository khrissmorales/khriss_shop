<?php
require_once '../config/db.php';

class UsersModel {
    private $conn;

    public function __construct() {
        $this->conn = getDBConnection();
    }
    private function validarDatosPerfil($nombre, $correo, $claveNueva = ''){
        $errores = [];

        if ($nombre === '') {
            $errores[] = 'El nombre no puede estar vacío o solo contener espacios.';
        }

        if ($correo === '') {
            $errores[] = 'El correo no puede estar vacío o solo contener espacios.';
        }
        if ($claveNueva === '') {
            $errores[] = 'La nueva contraseña no puede ser solo espacios en blanco.';
        }
        return $errores;
    }

    public function getUserProfile($id) {
        try {
            $sql = "SELECT id, name, email, fecha_registro, rol
                    FROM users
                    WHERE id = :id
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                return [
                    'status' => true,
                    'data' => $usuario
                ];
            } else {
                return [
                    'status' => false,
                    'msg' => 'Usuario no encontrado o inactivo'
                ];
            }

        } catch (PDOException $e) {
            return [
                'status' => false,
                'msg' => 'Error al obtener el perfil: ' . $e->getMessage()
            ];
        }
    }

    public function updateProfile($id, $data) {
        try {
            $nombre = trim($data['nombre'] ?? '');
            $correo = trim($data['correo'] ?? '');
            $claveActual = $data['clave_actual'] ?? '';
            $claveNueva  = trim($data['clave_nueva'] ?? '');

            $errores = $this->validarDatosPerfil($nombre, $correo, $claveNueva);
            if (!empty($errores)) {
                return ['status' => false, 'msg' => implode(' ', $errores)];
            }

            // Obtener contraseña actual para validar si es necesario
            $stmt = $this->conn->prepare("SELECT password FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) {
                return ['status' => false, 'msg' => 'Usuario no encontrado'];
            }

            $claveHash = null;
            $logoutRequired = false;

            if (!empty($claveNueva)) {
                if (!password_verify($claveActual, $usuario['password'])) {
                    return ['status' => false, 'msg' => 'La contraseña actual es incorrecta'];
                }

                $claveHash = password_hash($claveNueva, PASSWORD_BCRYPT);
                $logoutRequired = true; // Marcar que debe cerrarse sesión después del update
            }

            // Preparar la consulta
            $sql = "UPDATE users SET name = :nombre, email = :correo";
            if ($claveHash) {
                $sql .= ", password = :clave";
            }
            $sql .= " WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            if ($claveHash) {
                $stmt->bindParam(':clave', $claveHash);
            }
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            if ($logoutRequired) {
                session_destroy();
                return ['status' => true, 'msg' => 'Contraseña actualizada. Por seguridad debes iniciar sesión de nuevo.', 'forceLogout' => true];
            }
            // Actualizar variable de sesión
            $_SESSION['user']['name'] = $nombre;
            return [
                'status' => true,
                'msg' => 'Perfil actualizado correctamente',
                'data' => [
                    'name' => $nombre
                ]
            ];

        } catch (PDOException $e) {
            return ['status' => false, 'msg' => 'Error: ' . $e->getMessage()];
        }
    }


    public function changePassword($id, $oldPass, $newPass) {
    
    }

    public function emailExists($email) {
    
    }

    public function listUsers() {
    
    }
}