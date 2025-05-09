<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'khriss_shop'); 
define('DB_USER', 'root');
define('DB_PASS', '');

function getDBConnection() {
    try {
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASS
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo("Conexión exitosa!!!!!!!!!!!!!");
        return $conn;
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
        die();
    }
}
?>