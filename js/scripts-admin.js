function showSection(sectionId) {
  // Oculta el div de bienvenida
  document.getElementById('bienvenida').style.display = 'none';

  // Oculta todas las secciones
  document.querySelectorAll('.section').forEach(section => {
    section.style.display = 'none';
  });

  // Muestra la sección correspondiente
  document.getElementById(sectionId).style.display = 'block';
}


function buscarLugar() {
  var nombreLugar = document.getElementById('buscar-lugar').value;
  
  $.ajax({
    url: 'php/admin-crud.php',
    type: 'POST',
    data: { action: 'buscar', nombreLugar: nombreLugar },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        // Llenar el formulario con los datos del lugar
        document.getElementById('idLugar').value = response.data.IdPaquete;
        document.getElementById('nombrePaqueteModificar').value = response.data.NombrePaquete;
        document.getElementById('tipoPaqueteModificar').value = response.data.TipoPaquete;
        document.getElementById('ubicacionPaqueteModificar').value = response.data.UbicacionPaquete;
        document.getElementById('precioPaqueteModificar').value = response.data.PrecioPaquete;
        document.getElementById('caracteristicasPaqueteModificar').value = response.data.CaracteristicasPaquete;
        document.getElementById('detallesPaqueteModificar').value = response.data.DetallesPaquete;
        document.getElementById('imagenPaqueteModificar').value = response.data.ImagenPaquete;

        document.getElementById('formulario-modificar-lugar').style.display = 'block';
      } else {
        alert('Lugar no encontrado');
      }
    },
    error: function() {
      alert('Error en la comunicación con el servidor');
    }
  });
}

function buscarCliente() {
  var nombreCliente = document.getElementById('buscar-cliente').value;
  
  $.ajax({
    url: 'php/admin-crud.php',
    type: 'POST',
    data: { action: 'buscarCliente', nombreCliente: nombreCliente },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        // Llenar el formulario con los datos del cliente
        document.getElementById('idCliente').value = response.data.id;
        document.getElementById('nombreClienteModificar').value = response.data.Nombre;
        document.getElementById('numeroMovilModificar').value = response.data.NumeroMovil;
        document.getElementById('correoClienteModificar').value = response.data.Correo;
        document.getElementById('contraseñaClienteModificar').value = response.data.Contraseña;

        document.getElementById('formulario-modificar-cliente').style.display = 'block';
      } else {
        alert('Cliente no encontrado');
      }
    },
    error: function() {
      alert('Error en la comunicación con el servidor');
    }
  });
}
/////insertar
$('#registrarLugarForm').on('submit', function (e) {
  e.preventDefault(); // Prevent default form submission

  $.ajax({
    url: 'admin.php',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        alert('Lugar registrado con éxito');
        // Clear the form
        $('#registrarLugarForm')[0].reset();
        // Optionally, you can redirect to another page or update the UI here
      } else {
        alert('Error al registrar el lugar. Por favor, inténtelo de nuevo.');
      }
    },
    error: function () {
      alert('Error en la comunicación con el servidor. Por favor, inténtelo de nuevo.');
    }
  });
});
////////////////eliminar
$(document).on('click', '.eliminar', function () {
  var id = $(this).data('id'); // Obtener el ID del atributo data-id
  console.log("ID para eliminar: " + id); // Log del ID para depuración
  if (confirm('¿Estás seguro de que deseas eliminar este lugar de viaje?')) {
      $.ajax({
          type: 'POST',
          url: 'php/admin-crud.php',
          data: { action: 'delete', id: id },
          success: function (response) {
              if (response.trim() === 'success') {
                  alert('Lugar de viaje eliminado exitosamente.');
                  location.reload(); // Recargar la página para actualizar la lista
              } else {
                  alert('Error al eliminar el lugar de viaje.');
              }
          },
          error: function () {
              alert('Ocurrió un error en la solicitud.');
          }
      });
  }
});
$('#formulario-modificar-lugar').on('submit', function(e) {
  e.preventDefault();

  var datosLugar = $(this).serialize();

  $.ajax({
    url: 'php/admin-crud.php',
    type: 'POST',
    data: { action: 'modificar', datosLugar: datosLugar },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        alert('Lugar modificado con éxito');
        location.reload();
      } else {
        alert('Error al modificar el lugar. Por favor, inténtelo de nuevo.');
      }
    },
    error: function() {
      alert('Error en la comunicación con el servidor');
    }
  });
});

$('#registrarClienteForm').on('submit', function (e) {
  e.preventDefault(); // Prevent default form submission

  $.ajax({
    url: 'admin.php',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        alert('Cliente registrado con éxito');
        // Clear the form
        $('#registrarClienteForm')[0].reset();
        // Optionally, you can redirect to another page or update the UI here
      } else {
        alert('Error al registrar el cliente. Por favor, inténtelo de nuevo.');
      }
    },
    error: function () {
      alert('Error en la comunicación con el servidor. Por favor, inténtelo de nuevo.');
    }
  });
});

$(document).ready(function() {
  // Función para manejar el envío del formulario de modificación de cliente
  $('#formulario-modificar-cliente').on('submit', function(e) {
    e.preventDefault();

    var datosCliente = $(this).serialize();

    $.ajax({
      url: 'php/admin-crud.php',
      type: 'POST',
      data: { action: 'modificarCliente', datosCliente: datosCliente },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          alert('Cliente modificado con éxito');
          location.reload();
        } else {
          alert('Error al modificar el cliente. Por favor, inténtelo de nuevo.');
        }
      },
      error: function() {
        alert('Error en la comunicación con el servidor');
      }
    });
  });
});
