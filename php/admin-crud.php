<?php
require_once ('db_connect.php');
function insertarLugar($nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete)
{
    global $conn;
    $fechaCreacion = date('Y-m-d H:i:s');
    $fechaActualizacion = $fechaCreacion;

    $sql = "INSERT INTO lugaresviaje (NombrePaquete, TipoPaquete, UbicacionPaquete, PrecioPaquete, CaracteristicasPaquete, DetallesPaquete, ImagenPaquete, FechaCreacion, FechaActualizacion) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisssss", $nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete, $fechaCreacion, $fechaActualizacion);

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function listarlugares()
{
    global $conn;
    $sql = "SELECT * FROM lugaresviaje";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {       
        while ($row = $resultado->fetch_assoc()) {
            // Construir la fila de la tabla para cada lugar de viaje
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['NombrePaquete']) . '</td>';
            echo '<td>' . htmlspecialchars($row['UbicacionPaquete']) . '</td>';
            echo '<td>' . htmlspecialchars($row['DetallesPaquete']) . '</td>';
            echo '<td>S/ ' . htmlspecialchars($row['PrecioPaquete']) . '</td>';
            echo '<td><button class="btn btn-danger eliminar" data-id="' . htmlspecialchars($row['IdPaquete']) . '">Eliminar</button></td>';
            echo '</tr>';
        }
    } else {
        echo '<p>No se encontraron lugares de viaje disponibles.</p>';
    }

    // Liberar resultado
    $resultado->free();
}
// Función para eliminar un registro
function eliminarRegistro($id) {
    global $conn;

    // Preparar y ejecutar la consulta
    $sql = "DELETE FROM lugaresviaje WHERE IdPaquete = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

// Manejar solicitud de eliminación
if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    error_log("ID recibido para eliminar: " . $id);
    if (eliminarRegistro($id)) {
        echo 'success';
    } else {
        echo 'error';
    }
    exit();
}


///buscar// Función para buscar un lugar por nombre
function buscarLugar($nombreLugar) {
    global $conn;
    $sql = "SELECT * FROM lugaresviaje WHERE NombrePaquete = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombreLugar);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $lugar = $resultado->fetch_assoc();
    $stmt->close();
    return $lugar;
}

// Función para modificar un lugar
function modificarLugar($idLugar, $nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete) {
    global $conn;
    $fechaActualizacion = date('Y-m-d H:i:s');

    $sql = "UPDATE lugaresviaje SET NombrePaquete = ?, TipoPaquete = ?, UbicacionPaquete = ?, PrecioPaquete = ?, CaracteristicasPaquete = ?, DetallesPaquete = ?, ImagenPaquete = ?, FechaActualizacion = ? WHERE IdPaquete = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissssi", $nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete, $fechaActualizacion, $idLugar);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

// Manejar solicitud de búsqueda
if (isset($_POST['action']) && $_POST['action'] === 'buscar' && isset($_POST['nombreLugar'])) {
    $nombreLugar = $_POST['nombreLugar'];
    $lugar = buscarLugar($nombreLugar);
    if ($lugar) {
        echo json_encode(['success' => true, 'data' => $lugar]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

// Manejar solicitud de modificación
if (isset($_POST['action']) && $_POST['action'] === 'modificar' && isset($_POST['datosLugar'])) {
    parse_str($_POST['datosLugar'], $datosLugar);
    $idLugar = intval($datosLugar['idLugar']);
    $nombrePaquete = $datosLugar['nombrePaquete'];
    $tipoPaquete = $datosLugar['tipoPaquete'];
    $ubicacionPaquete = $datosLugar['ubicacionPaquete'];
    $precioPaquete = $datosLugar['precioPaquete'];
    $caracteristicasPaquete = $datosLugar['caracteristicasPaquete'];
    $detallesPaquete = $datosLugar['detallesPaquete'];
    $imagenPaquete = $datosLugar['imagenPaquete'];

    if (modificarLugar($idLugar, $nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}




function listarClientes()
{
    global $conn;
    $sql = "SELECT * FROM usuarios";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {       
        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['Nombre']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Correo']) . '</td>';
            echo '<td>' . str_repeat('*', 8) . '</td>'; // No mostrar la contraseña real
            echo '<td><button class="btn btn-danger eliminar-cliente" data-id-cliente="' . htmlspecialchars($row['id']) . '">Eliminar</button></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="4">No se encontraron clientes.</td></tr>';
    }
}

// Función para insertar un cliente
function insertarCliente($nombre, $numeroMovil, $correo, $contraseña)
{
    global $conn;
    $fechaRegistro = date('Y-m-d H:i:s');
    $fechaActualizacion = $fechaRegistro;

    $sql = "INSERT INTO usuarios (Nombre, NumeroMovil, Correo, Contraseña, FechaRegistro, FechaActualizacion, esAdmin) 
            VALUES (?, ?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $numeroMovil, $correo, $contraseña, $fechaRegistro, $fechaActualizacion);

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

// Función para buscar un cliente por nombre
function buscarCliente($nombreCliente)
{
    global $conn;
    $sql = "SELECT * FROM usuarios WHERE Nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeNombre = "%$nombreCliente%";
    $stmt->bind_param("s", $likeNombre);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $cliente = $resultado->fetch_assoc();
    $stmt->close();
    return $cliente;
}

// Manejar solicitud de búsqueda de cliente
if (isset($_POST['action']) && $_POST['action'] === 'buscarCliente' && isset($_POST['nombreCliente'])) {
    $nombreCliente = $_POST['nombreCliente'];
    $cliente = buscarCliente($nombreCliente);
    if ($cliente) {
        echo json_encode(['success' => true, 'data' => $cliente]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

// Función para modificar un cliente
// Función para modificar un cliente
function modificarCliente($id, $nombre, $numeroMovil, $correo, $contraseña)
{
    global $conn;
    $fechaActualizacion = date('Y-m-d H:i:s');

    $sql = "UPDATE usuarios SET Nombre = ?, NumeroMovil = ?, Correo = ?, Contraseña = ?, FechaActualizacion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $numeroMovil, $correo, $contraseña, $fechaActualizacion, $id);

    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

if (isset($_POST['action']) && $_POST['action'] === 'modificarCliente' && isset($_POST['datosCliente'])) {
    parse_str($_POST['datosCliente'], $datosCliente);
    error_log("Datos del cliente: " . print_r($datosCliente, true)); // Agrega esto para depurar

    $idCliente = intval($datosCliente['idCliente']);
    $nombre = $datosCliente['nombreCliente'];
    $numeroMovil = $datosCliente['numeroMovil'];
    $correo = $datosCliente['correoCliente'];
    $contraseña = $datosCliente['contraseñaCliente'];

    if (modificarCliente($idCliente, $nombre, $numeroMovil, $correo, $contraseña)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}
///eliminar
function eliminarCliente($id) {
    global $conn;

    // Preparar y ejecutar la consulta
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

// Manejar solicitud de eliminación de cliente
if (isset($_POST['action']) && $_POST['action'] === 'deleteCliente' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    error_log("ID recibido para eliminar cliente: " . $id);
    if (eliminarCliente($id)) {
        echo 'success';
    } else {
        echo 'error';
    }
    exit();
}