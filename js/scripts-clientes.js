document.addEventListener('DOMContentLoaded', function() {
    // Modal de Reserva
    $(document).ready(function() {
        // Evento al hacer clic en "Ver detalles" para cargar datos en el modal
        $('.ver-detalles').click(function() {
            var nombre = $(this).data('nombre');
            var ubicacion = $(this).data('ubicacion');
            var precio = $(this).data('precio');
            var descripcion = $(this).data('descripcion');
            var imagen = $(this).data('imagen');

            // Llenar el modal con los datos obtenidos
            $('#modalNombre').text(nombre);
            $('#modalUbicacion').text('Ubicación: ' + ubicacion);
            $('#modalPrecio').text('Precio: $' + precio);
            $('#modalDescripcion').text(descripcion);
            $('#modalImagen').attr('src', imagen);
        });
    });



    document.getElementById('logoutBtn').addEventListener('click', function() {
        window.location.href = 'php/logout.php';
    });
});
        
