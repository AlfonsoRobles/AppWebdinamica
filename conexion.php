<?php
// Conexión a MySQL en Railway usando MYSQL_URL
$url = getenv("MYSQL_URL");
$parts = parse_url($url);

$host = $parts['host'];
$port = $parts['port'];
$user = $parts['user'];
$pass = $parts['pass'];
$db   = ltrim($parts['path'], '/');

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar charset para evitar problemas con acentos/ñ
$conexion->set_charset("utf8");
?>
