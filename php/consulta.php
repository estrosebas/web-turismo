<?php
// Datos de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistematurismo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para insertar una nueva consulta
function insertConsulta($redirectUrl) {
    global $conn;
    $nombreCompleto = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $numeroMovil = $_POST['numeroMovil'];
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $fechaPublicacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO consultas (NombreCompleto, Correo, NumeroMovil, Asunto, Descripcion, FechaPublicacion)
            VALUES ('$nombreCompleto', '$correo', '$numeroMovil', '$asunto', '$descripcion', '$fechaPublicacion')";

    if ($conn->query($sql) === TRUE) {
        header("Location: $redirectUrl");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Acción determinada por el parámetro "action" enviado desde el formulario
if(isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'insert':
            insertConsulta('../index.html?enviado=true');
            break;
        default:
            echo "Acción no válida";
    }
}

// Cerrar conexión
$conn->close();
?>
