document.addEventListener('DOMContentLoaded', function () {
    // Modal de Reserva
    $(document).ready(function () {
        // Evento al hacer clic en "Ver detalles" para cargar datos en el modal
        $('.ver-detalles').click(function () {
            var id = $(this).data('id');
            var nombre = $(this).data('nombre');
            var ubicacion = $(this).data('ubicacion');
            var precio = $(this).data('precio');
            var descripcion = $(this).data('descripcion');
            var imagen = $(this).data('imagen');

            // Llenar el modal con los datos obtenidos
            $('#idPaquete').val(id);
            $('#modalNombre').text(nombre);
            $('#modalUbicacion').text('Ubicación: ' + ubicacion);
            $('#modalPrecio').text('Precio: $' + precio);
            $('#modalDescripcion').text(descripcion);
            $('#modalImagen').attr('src', imagen);
        });

        $('#reservaForm').on('submit', function (e) {
            e.preventDefault(); // Previene el comportamiento por defecto del formulario
            $.ajax({
                url: 'clientes.php', // Cambia a la URL correcta para el manejo de reservas
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    alert('Reserva realizada con éxito');
                    $('#reservaModal').modal('hide');
                },
                error: function () {
                    alert('Error al realizar la reserva. Inténtalo de nuevo.');
                }
            });
        });
        // Nueva función para cargar las reservas en el modal del carrito
        function cargarReservas() {
            $.ajax({
                url: 'php/clientes-crud.php',
                type: 'POST',
                data: {
                    action: 'listarReservas',
                    correoUsuario: usuarioCorreo
                },
                success: function(response) {
                    $('#carritoBody').html(response);
                },
                error: function() {
                    alert('Error al cargar las reservas. Por favor, inténtalo de nuevo.');
                }
            });
        }

        // Evento para cargar las reservas cuando se abre el modal del carrito
        $('#carritoModal').on('show.bs.modal', function () {
            cargarReservas();
        });
    });


    document.getElementById('logoutBtn').addEventListener('click', function () {
        window.location.href = 'php/logout.php';
    });


});

