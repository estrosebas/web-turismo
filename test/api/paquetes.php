<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistematurismo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM lugaresviaje";
$result = $conn->query($sql);

$paquetes = array();
while($row = $result->fetch_assoc()) {
    $paquetes[] = $row;
}

$conn->close();

echo json_encode($paquetes);
?>
