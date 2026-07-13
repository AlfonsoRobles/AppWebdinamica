<?php
require_once __DIR__ . '/conexion.php';

header('Content-Type: application/json');

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

switch ($accion) {
    case 'listar':
        try {
            $stmt = $conn->query("SELECT * FROM tareas");
            $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // 👇 DataTables necesita la clave "data"
            echo json_encode(["data" => $tareas]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
        break;

    case 'agregar':
        $titulo = $_POST['titulo'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $valor = $_POST['valor'] ?? '';
        $duracion = $_POST['duracion'] ?? '';
        $date_start = $_POST['date_start'] ?? '';
        $date_end = $_POST['date_end'] ?? '';
        try {
            $stmt = $conn->prepare("INSERT INTO tareas (titulo, tipo, valor, duracion, date_start, date_end, completed) 
                                    VALUES (?, ?, ?, ?, ?, ?, 0)");
            $stmt->execute([$titulo, $tipo, $valor, $duracion, $date_start, $date_end]);
            echo json_encode(["success" => true]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
        break;

    case 'editar':
        $id = $_POST['id'] ?? 0;
        $titulo = $_POST['titulo'] ?? '';
        $tipo = $_POST['tipo'] ?? '';
        $valor = $_POST['valor'] ?? '';
        $duracion = $_POST['duracion'] ?? '';
        $date_start = $_POST['date_start'] ?? '';
        $date_end = $_POST['date_end'] ?? '';
        try {
            $stmt = $conn->prepare("UPDATE tareas SET titulo=?, tipo=?, valor=?, duracion=?, date_start=?, date_end=? WHERE id=?");
            $stmt->execute([$titulo, $tipo, $valor, $duracion, $date_start, $date_end, $id]);
            echo json_encode(["success" => true]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
        break;

    case 'cambiarEstado':
        $id = $_POST['id'] ?? 0;
        $completed = $_POST['completed'] ?? 0;
        try {
            $stmt = $conn->prepare("UPDATE tareas SET completed=? WHERE id=?");
            $stmt->execute([$completed, $id]);
            echo json_encode(["success" => true]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
        break;

    case 'eliminar':
        $id = $_POST['id'] ?? 0;
        try {
            $stmt = $conn->prepare("DELETE FROM tareas WHERE id=?");
            $stmt->execute([$id]);
            echo json_encode(["success" => true]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
        }
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}
?>
