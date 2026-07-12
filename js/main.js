$(document).ready(function() {
  // Inicializar DataTable
  let table = $('#tasksTable').DataTable();

  // Activar calendarios en los campos de fecha
  $("#taskInicio, #taskEntrega").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: 0,
    showAnim: "fadeIn",
    changeMonth: true,
    changeYear: true
  });

  // Login básico (usuario: admin / contraseña: admin123)
  $('#loginForm').on('submit', function(e) {
    e.preventDefault();
    let user = $('#username').val();
    let pass = $('#password').val();

    if (user === "admin" && pass === "admin123") {
      $('#loginForm').hide();
      $('#taskSection').show();
      cargarTareas();
    } else {
      alert("Usuario o contraseña incorrectos ❌");
    }
  });

  // Función para cargar tareas desde servidor.php
  function cargarTareas() {
    $.ajax({
      url: 'servidor.php?accion=listar',
      method: 'GET',
      success: function(respuesta) {
        if (respuesta.success) {
          table.clear();
          respuesta.data.forEach(task => {
            let estadoTexto = task.completed == 1 ? "Completada" : "Pendiente";
            let acciones = `
              <button class="btn btn-warning btn-sm editBtn">Editar</button>
              <button class="btn btn-danger btn-sm deleteBtn">Eliminar</button>
              <input type="checkbox" class="statusCheckbox" data-id="${task.id}" ${task.completed == 1 ? "checked" : ""}>
            `;
            let rowNode = table.row.add([
              task.id,
              task.title,
              task.tipo || "",
              task.valor || "",
              task.duracion || "",
              task.date_start || "",
              task.date_end || "",
              acciones,
              estadoTexto
            ]).draw().node();

            // Estilos dinámicos según estado
            if (task.completed == 1) {
              $(rowNode).addClass("completed-row");
            } else {
              let hoy = new Date();
              let entrega = new Date(task.date_end);
              let diff = (entrega - hoy) / (1000 * 60 * 60 * 24);
              if (diff <= 2 && diff >= 0) {
                $(rowNode).addClass("warning-row");
                // Mostrar alerta en pantalla si está próxima a vencer
                alert(`⚠️ La tarea "${task.title}" vence pronto (fecha límite: ${task.date_end}).`);
              }
            }
          });
        }
      }
    });
  }

  // Agregar nueva tarea
  $('#taskForm').on('submit', function(e) {
    e.preventDefault();
    let nuevaTarea = {
      title: $('#taskTitle').val(),
      tipo: $('#taskTipo').val(),
      valor: $('#taskValor').val(),
      duracion: $('#taskDuracion').val(),
      date_start: $('#taskInicio').val(),
      date_end: $('#taskEntrega').val()
    };

    $.ajax({
      url: 'servidor.php?accion=agregar',
      method: 'POST',
      data: JSON.stringify(nuevaTarea),
      contentType: 'application/json',
      success: function(respuesta) {
        if (respuesta.success) {
          cargarTareas();
          alert(`✅ Tarea "${nuevaTarea.title}" agregada correctamente.`);
          $('#taskForm')[0].reset();
        }
      }
    });
  });

  // Eliminar tarea
  $('#tasksTable').on('click', '.deleteBtn', function() {
    let row = table.row($(this).parents('tr'));
    let id = row.data()[0];
    $.ajax({
      url: 'servidor.php?accion=eliminar',
      method: 'POST',
      data: JSON.stringify({ id }),
      contentType: 'application/json',
      success: function(respuesta) {
        if (respuesta.success) {
          cargarTareas();
          alert("❌ Tarea eliminada.");
        }
      }
    });
  });

  // Editar tarea
  $('#tasksTable').on('click', '.editBtn', function() {
    let row = table.row($(this).parents('tr'));
    let data = row.data();
    let nuevoTitulo = prompt("Editar título:", data[1]);
    let nuevaFecha = prompt("Editar fecha de entrega (YYYY-MM-DD):", data[6]);
    if (nuevoTitulo && nuevaFecha) {
      $.ajax({
        url: 'servidor.php?accion=editar',
        method: 'POST',
        data: JSON.stringify({ id: data[0], title: nuevoTitulo, date_end: nuevaFecha }),
        contentType: 'application/json',
        success: function(respuesta) {
          if (respuesta.success) {
            cargarTareas();
            alert("✏️ Tarea actualizada.");
          }
        }
      });
    }
  });

  // Cambiar estado de tarea
  $('#tasksTable').on('change', '.statusCheckbox', function() {
    let id = $(this).data('id');
    let completed = $(this).is(':checked');
    $.ajax({
      url: 'servidor.php?accion=estado',
      method: 'POST',
      data: JSON.stringify({ id, completed }),
      contentType: 'application/json',
      success: function(respuesta) {
        if (respuesta.success) {
          cargarTareas();
          alert(`🔄 Estado de la tarea actualizado.`);
        }
      }
    });
  });
});
