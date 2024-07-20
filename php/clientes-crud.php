<?php
require_once ('db_connect.php');

function listar()
{
    global $conn;
    $sql = "SELECT * FROM lugaresviaje";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            // Construir el card para cada lugar de viaje
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<img src="' . htmlspecialchars($row['ImagenPaquete']) . '" class="card-img-top w-90 pt-3 mx-auto d-block" alt="' . htmlspecialchars($row['NombrePaquete']) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['NombrePaquete']) . '</h5>';
            echo '<p class="card-text">Ubicación: ' . htmlspecialchars($row['UbicacionPaquete']) . '</p>';
            echo '<p class="card-text">Precio: $' . htmlspecialchars($row['PrecioPaquete']) . '</p>';
            echo '<button class="btn btn-primary ver-detalles" data-toggle="modal" data-target="#reservaModal" 
                data-id="' . htmlspecialchars($row['IdPaquete']) . '"
                data-nombre="' . htmlspecialchars($row['NombrePaquete']) . '" 
                data-ubicacion="' . htmlspecialchars($row['UbicacionPaquete']) . '" 
                data-precio="' . htmlspecialchars($row['PrecioPaquete']) . '" 
                data-descripcion="' . htmlspecialchars($row['DetallesPaquete']) . '" 
                data-imagen="' . htmlspecialchars($row['ImagenPaquete']) . '">Ver detalles</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="col">';
        echo '<p>No se encontraron lugares de viaje disponibles.</p>';
        echo '</div>';
    }

    // Liberar resultado
    $resultado->free();
    $conn->close();
}

// Function to insert reservation data into the database
function insertar($idPaquete, $correoUsuario, $fechaInicio, $fechaFin, $comentario)
{
    global $conn;
    $estado = 1;
    $canceladoPor = null;
    $fechaRegistro = date('Y-m-d H:i:s');

    $sql = "INSERT INTO reservas (IdPaquete, CorreoUsuario, FechaInicio, FechaFin, Comentario, FechaRegistro, Estado, CanceladoPor, FechaActualizacion) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssiis", $idPaquete, $correoUsuario, $fechaInicio, $fechaFin, $comentario, $fechaRegistro, $estado, $canceladoPor, $fechaRegistro);

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
function listarReservas($correoUsuario)
{
    global $conn;
    $sql = "SELECT * FROM reservas WHERE CorreoUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correoUsuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['IdPaquete']) . '</td>';
            echo '<td>' . htmlspecialchars($row['FechaInicio']) . '</td>';
            echo '<td>' . htmlspecialchars($row['FechaFin']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Comentario']) . '</td>';
            echo '<td>' . htmlspecialchars($row['FechaRegistro']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Estado']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No se encontraron reservas.</td></tr>';
    }

    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == 'listarReservas') {
    if (isset($_POST['correoUsuario'])) {
        listarReservas($_POST['correoUsuario']);
    }
}
// Cerrar conexión
//insertar(1,"estrosebas@gmail.com","12/05/2000","15/05/2000","hola");
//listarReservas("estrosebas@gmail.com");