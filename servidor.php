<?php
header('Content-Type: application/json');

// Depuración: mostrar qué valor tiene MYSQLDATABASE
var_dump(getenv("MYSQLDATABASE"));
exit;

// Conexión a MySQL usando variables de entorno de Railway
$conexion = new mysqli(
    getenv("MYSQLHOST"),
    getenv("MYSQLUSER"),
    getenv("MYSQLPASSWORD"),
    getenv("MYSQLDATABASE"),
    getenv("MYSQLPORT")
);

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "error" => $conexion->connect_error]);
    exit;
}

$accion = $_GET['accion'] ?? 'listar';

// Listar tareas
if ($accion === 'listar') {
    $resultado = $conexion->query("SELECT * FROM tareas ORDER BY date_start ASC");
    $tareas = [];
    while ($fila = $resultado->fetch_assoc()) {
        $tareas[] = $fila;
    }
    echo json_encode(["success" => true, "data" => $tareas]);
    exit;
}

// Agregar tarea
if ($accion === 'agregar') {
    $json = json_decode(file_get_contents("php://input"), true);
    $titulo   = $conexion->real_escape_string($json['title'] ?? '');
    $tipo     = $conexion->real_escape_string($json['tipo'] ?? '');
    $valor    = intval($json['valor'] ?? 0);
    $duracion = intval($json['duracion'] ?? 0);
    $inicio   = $conexion->real_escape_string($json['date_start'] ?? null);
    $entrega  = $conexion->real_escape_string($json['date_end'] ?? null);

    $conexion->query("INSERT INTO tareas (title, tipo, valor, duracion, date_start, date_end, completed) 
                      VALUES ('$titulo', '$tipo', $valor, $duracion, '$inicio', '$entrega', 0)");
    echo json_encode(["success" => true]);
    exit;
}

// Editar tarea
if ($accion === 'editar') {
    $json = json_decode(file_get_contents("php://input"), true);
    $id       = intval($json['id']);
    $titulo   = $conexion->real_escape_string($json['title'] ?? '');
    $entrega  = $conexion->real_escape_string($json['date_end'] ?? null);

    $conexion->query("UPDATE tareas SET title='$titulo', date_end='$entrega' WHERE id=$id");
    echo json_encode(["success" => true]);
    exit;
}

// Cambiar estado
if ($accion === 'estado') {
    $json = json_decode(file_get_contents("php://input"), true);
    $id = intval($json['id']);
    $completed = $json['completed'] ? 1 : 0;
    $conexion->query("UPDATE tareas SET completed=$completed WHERE id=$id");
    echo json_encode(["success" => true]);
    exit;
}

// Eliminar tarea
if ($accion === 'eliminar') {
    $json = json_decode(file_get_contents("php://input"), true);
    $id = intval($json['id']);
    $conexion->query("DELETE FROM tareas WHERE id=$id");
    echo json_encode(["success" => true]);
    exit;
}
