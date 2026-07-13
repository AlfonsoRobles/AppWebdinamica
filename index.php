<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de Tareas</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <!-- Tu CSS personalizado -->
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container mt-4">
    <h1 class="mb-4">Gestor de Tareas</h1>

    <!-- Login -->
    <div id="loginForm" class="mb-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <input type="text" id="username" class="form-control mb-2" placeholder="Usuario">
          <input type="password" id="password" class="form-control mb-2" placeholder="Contraseña">
          <button type="submit" class="btn btn-primary btn-login w-100">Ingresar</button>
        </div>
      </div>
    </div>

    <!-- Sección de tareas -->
    <div id="taskSection" style="display:none;">
      <!-- Formulario de nueva tarea -->
      <form id="taskForm" class="mb-4">
        <div class="row g-2">
          <div class="col-md-4">
            <input type="text" id="taskTitle" class="form-control" placeholder="Título de la tarea" required>
          </div>
          <div class="col-md-2">
            <input type="text" id="taskTipo" class="form-control" placeholder="Tipo">
          </div>
          <div class="col-md-2">
            <input type="number" id="taskValor" class="form-control" placeholder="Valor">
          </div>
          <div class="col-md-2">
            <input type="number" id="taskDuracion" class="form-control" placeholder="Duración">
          </div>
          <div class="col-md-2">
            <input type="text" id="taskInicio" class="form-control" placeholder="Fecha inicio">
          </div>
          <div class="col-md-2">
            <input type="text" id="taskEntrega" class="form-control" placeholder="Fecha entrega">
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-success btn-save w-100">Guardar</button>
          </div>
        </div>
      </form>

      <!-- Tabla de tareas -->
      <div class="table-responsive">
        <table id="tasksTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Tipo</th>
              <th>Valor</th>
              <th>Duración</th>
              <th>Inicio</th>
              <th>Entrega</th>
              <th>Acciones</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <!-- Las filas se llenan dinámicamente con main.js -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- jQuery UI (para datepicker) -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Tu JS personalizado -->
  <script src="js/main.js"></script>
</body>
</html>
