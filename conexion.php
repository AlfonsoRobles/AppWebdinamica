<?php
// Leer variables de entorno definidas en Railway
$host     = getenv("MYSQLHOST");
$user     = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$dbname   = getenv("MYSQLDATABASE");
$port     = getenv("MYSQLPORT");

// Crear conexión con MySQL
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Verificar si hubo error
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional: establecer charset para evitar problemas con acentos
$conn->set_charset("utf8");
?>
