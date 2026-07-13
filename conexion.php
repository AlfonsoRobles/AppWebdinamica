<?php
$host     = getenv("MYSQLHOST");     // Host público de Railway
$user     = getenv("MYSQLUSER");     // Usuario
$password = getenv("MYSQLPASSWORD"); // Contraseña
$dbname   = getenv("MYSQLDATABASE"); // Nombre de la base (tareasdb)
$port     = getenv("MYSQLPORT");     // Puerto público asignado

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
