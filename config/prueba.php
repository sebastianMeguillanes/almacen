<?php
// Datos de la base de datos
define("DB_HOST", "181.188.156.195");
define("DB_NAME", "almacenUCB1");
define("DB_USERNAME", "admin");
define("DB_PASSWORD", "admin1234");
define("DB_PORT", "18010");
define("DB_ENCODE", "utf8");

try {
    // Intentar realizar la conexión a la base de datos
    $conn = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si la conexión es exitosa, imprimir un mensaje
    echo "Conexión a la base de datos establecida correctamente.";

    // Aquí puedes realizar consultas o cualquier otra operación con la base de datos

} catch (PDOException $e) {
    // Si hay un error en la conexión, imprimir el mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>