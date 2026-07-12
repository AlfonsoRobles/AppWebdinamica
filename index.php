<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestor de Tareas</title>
  <!-- Bootstrap para interfaz responsiva -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- DataTables y jQuery UI -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!-- Estilos propios -->
  <link rel="stylesheet" href="Css/estilos.css">
</head>
<body class="bg-light">
  <div class="container mt-4">
    <h1 class="text-center mb-4">📋 Gestor de Tareas</h1>

    <!-- Login -->
    <form id="loginForm" class="card p-3 shadow-sm mb-4">
      <input type="text" id="username" class="form-control mb-2" placeholder="Usuario">
      <input type="password" id="password" class="form-control mb-2" placeholder="Contraseña">
      <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>

    <!-- Sección de tareas -->
    <div id="taskSection" style="display:none;">
      <!-- Formulario para agregar tareas -->
      <form id="taskForm" class="card p-3 shadow-sm mb-4">
        <div class="row g-2">
          <div class="col-md-6"><input type="text" id="taskTitle" class="form-control" placeholder="Título" required></div>
          <div class="col-md-6"><input type="text" id="taskTipo" class="form-control" placeholder="Tipo (Foro, Buzón)"></div>
          <div class="col-md-3"><input type="number" id="taskValor" class="form-control" placeholder="Valor"></div>
          <div class="col-md-3"><input type="number" id="taskDuracion" class="form-control" placeholder="Duración (días)"></div>
          <div class="col-md-3"><input type="text" id="taskInicio" class="form-control" placeholder="Fecha inicio"></div>
          <div class="col-md-3"><input type="text" id="taskEntrega" class="form-control" placeholder="Fecha entrega"></div>
        </div>
        <button type="submit" class="btn btn-success mt-3 w-100">Agregar tarea</button>
      </form>

      <!-- Tabla -->
      <table id="tasksTable" class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th><th>Tarea</th><th>Tipo</th><th>Valor</th><th>Días</th>
            <th>Inicio</th><th>Entrega</th><th>Acciones</th><th>Estado</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
