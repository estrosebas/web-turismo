<?php
require_once('php/db_connect.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_nombre = $_SESSION['usuario_nombre'];
$usuario_correo = $_SESSION['usuario_correo'];
$usuario_telefono = $_SESSION['usuario_telefono'];

////////////////////lugares
// Consulta SQL para obtener lugares de viaje
$sql = "SELECT * FROM lugaresviaje";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página de Turismo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-clientes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Navbar -->
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">WikiTour</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-calendar-alt"></i> Ofertas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart"></i> Carrito
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#cuentaModal">
                            <i class="far fa-user"></i> Mi Cuenta
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <section id="lugares" class="pt-5">
        <div class="container">
            <h2 class="text-center mb-4">Bienvenido, <?php echo $usuario_nombre; ?>!</h2>
            <div class="row">
            <?php
            // Iterar sobre los resultados de la consulta
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    // Construir el card para cada lugar de viaje
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row['ImagenPaquete'] . '" class="card-img-top w-90 pt-3 mx-auto d-block" alt="' . $row['NombrePaquete'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['NombrePaquete'] . '</h5>';
                    echo '<p class="card-text">Ubicación: ' . $row['UbicacionPaquete'] . '</p>';
                    echo '<p class="card-text">Precio: $' . $row['PrecioPaquete'] . '</p>';
                    echo '<button class="btn btn-primary ver-detalles" data-toggle="modal" data-target="#reservaModal" data-nombre="' . $row['NombrePaquete'] . '" data-ubicacion="' . $row['UbicacionPaquete'] . '" data-precio="' . $row['PrecioPaquete'] . '" data-descripcion="' . $row['DetallesPaquete'] . '" data-imagen="' . $row['ImagenPaquete'] . '">Ver detalles</button>';
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

            // Cerrar conexión
            $conn->close();
            ?>
            </div>
        </div>
    </section>

    <!-- Modals -->
    <div class="modal fade" id="reservaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Lugar de Viaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="modalImagen" src="" class="img-fluid mb-3" alt="Imagen del Lugar de Viaje">
                    </div>
                    <h5 id="modalNombre"></h5>
                    <p id="modalUbicacion"></p>
                    <p id="modalPrecio"></p>
                    <p id="modalDescripcion"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Reservar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuenta Modal -->
    <div class="modal fade" id="cuentaModal" tabindex="-1" role="dialog" aria-labelledby="cuentaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuentaModalLabel">Detalles de la Cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Nombre: <?php echo $usuario_nombre; ?></h5>
                    <p>Email: <?php echo $usuario_correo; ?></p>
                    <p>Teléfono: <?php echo $usuario_telefono; ?></p>
                    <?php if (isset($_SESSION['esAdmin']) && $_SESSION['esAdmin']) { ?>
                        <p>Administrador</p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-secondary" id="logoutBtn">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts-clientes.js"></script>
</body>
</html>
