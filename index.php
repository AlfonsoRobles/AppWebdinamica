<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestor de Tareas</title>
  <link rel="stylesheet" href="Css/estilos.css"> <!-- 👈 ruta original con carpeta 'Css' -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- jQuery UI (para datepicker) -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <!-- JS personalizado -->
  <script src="js/main.js"></script>
</head>
<body>
  <h1>Gestor de Tareas LDSW UDG</h1>

  <!-- Login -->
  <form id="loginForm">
    <input type="text" id="username" placeholder="Usuario">
    <input type="password" id="password" placeholder="Contraseña">
    <button type="submit" class="btn-login">Ingresar</button>
  </form>

  <!-- Sección de tareas -->
  <div id="taskSection" style="display:none;">
    <form id="taskForm">
      <input type="text" id="taskTitle" placeholder="Título de la tarea" required>
      <input type="text" id="taskTipo" placeholder="Tipo">
      <input type="number" id="taskValor" placeholder="Valor">
      <input type="number" id="taskDuracion" placeholder="Duración">
      <input type="text" id="taskInicio" placeholder="Fecha inicio">
      <input type="text" id="taskEntrega" placeholder="Fecha entrega">
      <button type="submit" class="btn-save">Guardar</button>
    </form>

    <table id="tasksTable" class="display">
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
        <!-- Se llena dinámicamente con main.js -->
      </tbody>
    </table>
  </div>
</body>
</html>
