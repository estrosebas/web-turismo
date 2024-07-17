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

$sql = "SELECT * FROM consultas";
$result = $conn->query($sql);

$consultas = array();
while($row = $result->fetch_assoc()) {
    $consultas[] = $row;
}

$conn->close();

echo json_encode($consultas);
?>
