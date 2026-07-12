<?php
// Conexión a MySQL en Railway usando variables de entorno
$host = getenv("MYSQLHOST");       // Host público (ej. tokaido.proxy.rlwy.net)
$port = getenv("MYSQLPORT");       // Puerto asignado (ej. 3306 o dinámico como 51112)
$user = getenv("MYSQLUSER");       // Usuario (ej. root o generado por Railway)
$pass = getenv("MYSQLPASSWORD");   // Contraseña
$db   = getenv("MYSQLDATABASE");   // Nombre de la base (ej. railway)

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar charset para evitar problemas con acentos/ñ
$conexion->set_charset("utf8");

// Mensaje opcional para confirmar
// echo "Conexión exitosa a la base de datos";
?>
