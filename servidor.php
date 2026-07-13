<?php
header("Content-Type: application/json; charset=UTF-8");
include 'conexion.php';

// Detectar la acción desde la petición
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'list':
        $result = $conn->query("SELECT * FROM tareas ORDER BY id ASC");
        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        // 👇 DataTables necesita la clave "data"
        echo json_encode(["data" => $tasks]);
        break;

    case 'add':
        $title     = $_POST['title'];
        $tipo      = $_POST['tipo'];
        $valor     = $_POST['valor'];
        $duration  = $_POST['duration'];
        $dateStart = $_POST['date_start'];
        $dateEnd   = $_POST['date_end'];

        $stmt = $conn->prepare("INSERT INTO tareas (title, tipo, valor, duration, date_start, date_end, completed) VALUES (?, ?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("ssisss", $title, $tipo, $valor, $duration, $dateStart, $dateEnd);
        $stmt->execute();

        echo json_encode(["success" => true, "id" => $stmt->insert_id]);
        break;

    case 'edit':
        $id        = $_POST['id'];
        $title     = $_POST['title'];
        $tipo      = $_POST['tipo'];
        $valor     = $_POST['valor'];
        $duration  = $_POST['duration'];
        $dateStart = $_POST['date_start'];
        $dateEnd   = $_POST['date_end'];

        $stmt = $conn->prepare("UPDATE tareas SET title=?, tipo=?, valor=?, duration=?, date_start=?, date_end=? WHERE id=?");
        $stmt->bind_param("ssisssi", $title, $tipo, $valor, $duration, $dateStart, $dateEnd, $id);
        $stmt->execute();

        echo json_encode(["success" => true]);
        break;

    case 'status':
        $id        = $_POST['id'];
        $completed = $_POST['completed'];

        $stmt = $conn->prepare("UPDATE tareas SET completed=? WHERE id=?");
        $stmt->bind_param("ii", $completed, $id);
        $stmt->execute();

        echo json_encode(["success" => true]);
        break;

    case 'delete':
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM tareas WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo json_encode(["success" => true]);
        break;

    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}

$conn->close();
?>
