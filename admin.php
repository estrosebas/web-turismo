<?php
require_once ('php/db_connect.php');
session_start();
require_once ("php/admin-crud.php");

if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit();
}

$admin_nombre = $_SESSION['usuario_nombre'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['nombrePaquete'])) {
    // Lógica para registrar lugar
    $nombrePaquete = $_POST['nombrePaquete'];
    $tipoPaquete = $_POST['tipoPaquete'];
    $ubicacionPaquete = $_POST['ubicacionPaquete'];
    $precioPaquete = $_POST['precioPaquete'];
    $caracteristicasPaquete = $_POST['caracteristicasPaquete'];
    $detallesPaquete = $_POST['detallesPaquete'];
    $imagenPaquete = $_POST['imagenPaquete'];

    $resultado = insertarLugar($nombrePaquete, $tipoPaquete, $ubicacionPaquete, $precioPaquete, $caracteristicasPaquete, $detallesPaquete, $imagenPaquete);

    echo json_encode(['success' => $resultado]);
  } elseif (isset($_POST['nombreCliente'])) {
    // Lógica para registrar cliente
    $nombreCliente = $_POST['nombreCliente'];
    $numeroMovil = $_POST['numeroMovil'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $resultado = insertarCliente($nombreCliente, $numeroMovil, $correo, $contraseña);

    echo json_encode(['success' => $resultado]);
  }
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administración</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles-admin.css">
  <script src="https://kit.fontawesome.com/1ce12f88b7.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="d-flex">
    <div id="sidebar" class="bg-dark p-4">
      <h4 class="text-center">Admin</h4>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('lugares-registrar')">
            <i class="fa-solid fa-map"></i>
            <span class="link-text">Registrar lugares</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('lugares-modificar')">
            <i class="fa-solid fa-pencil"></i>
            <span class="link-text">Modificar lugares</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('lugares-revisar')">
            <i class="fa-solid fa-layer-group"></i>
            <span class="link-text">Revisar lugares</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('clientes-registrar')">
            <i class="fas fa-users"></i>
            <span class="link-text">Registrar Clientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('clientes-modificar')">
            <i class="fa-solid fa-pencil"></i>
            <span class="link-text">Modificar Clientes</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('clientes-revisar')">
            <i class="fa-solid fa-layer-group"></i>
            <span class="link-text">Revisar Clientes</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="showSection('reportes')">
            <i class="fas fa-chart-line"></i>
            <span class="link-text">Generar Reportes</span>
          </a>
        </li>
      </ul>
    </div>



    <!--SECCIONESSSSS-->
    <div id="content" class="flex-grow-1">
      <div id="bienvenida" class="bienvenida">
        <h1><i class="fas fa-star"></i> Bienvenido <i class="fas fa-star"></i></h1>
        <p><?php echo $admin_nombre; ?>!</p>
        <p>¡Gracias por visitar nuestra página de administración de turismo!</p>
      </div>

      <!--lugares-->
      <div id="lugares-registrar" class="section" style="display: none;">
        <h2>Registrar lugar</h2>
        <form id="registrarLugarForm" method="POST">
          <div class="form-group">
            <label for="nombrePaquete">Nombre del Paquete</label>
            <input type="text" id="nombrePaquete" name="nombrePaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tipoPaquete">Tipo de Paquete</label>
            <input type="text" id="tipoPaquete" name="tipoPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ubicacionPaquete">Ubicación del Paquete</label>
            <input type="text" id="ubicacionPaquete" name="ubicacionPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="precioPaquete">Precio del Paquete</label>
            <input type="number" id="precioPaquete" name="precioPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="caracteristicasPaquete">Características del Paquete</label>
            <textarea id="caracteristicasPaquete" name="caracteristicasPaquete" class="form-control" rows="3"
              required></textarea>
          </div>
          <div class="form-group">
            <label for="detallesPaquete">Detalles del Paquete</label>
            <textarea id="detallesPaquete" name="detallesPaquete" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="imagenPaquete">URL de la Imagen del Paquete</label>
            <input type="text" id="imagenPaquete" name="imagenPaquete" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>

      <div id="lugares-modificar" class="section" style="display: none;">
        <h2>Modificar Lugar</h2>
        <!-- Formulario para buscar lugar -->
        <div class="form-group">
          <label for="buscar-lugar">Buscar Lugar:</label>
          <input type="text" id="buscar-lugar" class="form-control">
          <button type="button" class="btn btn-primary" onclick="buscarLugar()">Buscar</button>
        </div>
        <!-- Formulario para modificar lugar -->
        <form id="formulario-modificar-lugar" style="display: none;" onsubmit="return modificarLugar(event)">
          <input type="hidden" id="idLugar" name="idLugar">
          <div class="form-group">
            <label for="nombrePaqueteModificar">Nombre del Paquete</label>
            <input type="text" id="nombrePaqueteModificar" name="nombrePaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tipoPaqueteModificar">Tipo de Paquete</label>
            <input type="text" id="tipoPaqueteModificar" name="tipoPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ubicacionPaqueteModificar">Ubicación del Paquete</label>
            <input type="text" id="ubicacionPaqueteModificar" name="ubicacionPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="precioPaqueteModificar">Precio del Paquete</label>
            <input type="number" id="precioPaqueteModificar" name="precioPaquete" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="caracteristicasPaqueteModificar">Características del Paquete</label>
            <textarea id="caracteristicasPaqueteModificar" name="caracteristicasPaquete" class="form-control" rows="3"
              required></textarea>
          </div>
          <div class="form-group">
            <label for="detallesPaqueteModificar">Detalles del Paquete</label>
            <textarea id="detallesPaqueteModificar" name="detallesPaquete" class="form-control" rows="3"
              required></textarea>
          </div>
          <div class="form-group">
            <label for="imagenPaqueteModificar">URL de la Imagen del Paquete</label>
            <input type="text" id="imagenPaqueteModificar" name="imagenPaquete" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Modificar Lugar</button>
        </form>
      </div>
      <!-- revisar lugares-->
      <div id="lugares-revisar" class="section" style="display: none;">
        <h2>Revisar Lugares</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Lugar</th>
              <th>Ubicación</th>
              <th>Descripción</th>
              <th>Monto de Entrada</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tabla-lugares">
            <?php listarlugares(); ?>
          </tbody>
        </table>
      </div>





      <!-- clientes -->
      <div id="clientes-registrar" class="section" style="display: none;">
        <h2>Registrar Cliente</h2>
        <form id="registrarClienteForm" method="POST">
          <div class="form-group">
            <label for="nombreCliente">Nombre</label>
            <input type="text" id="nombreCliente" name="nombreCliente" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="numeroMovil">Número Móvil</label>
            <input type="text" id="numeroMovil" name="numeroMovil" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" id="contraseña" name="contraseña" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>

      <div id="clientes-modificar" class="section" style="display: none;">
        <h2>Modificar Cliente</h2>
        <!-- Formulario para buscar cliente -->
        <div class="form-group">
          <label for="buscar-cliente">Buscar Cliente:</label>
          <input type="text" id="buscar-cliente" class="form-control">
          <button type="button" class="btn btn-primary" onclick="buscarCliente()">Buscar</button>
        </div>
        <!-- Formulario para modificar cliente -->
        <form id="formulario-modificar-cliente" style="display: none;" onsubmit="return modificarCliente(event)">
          <input type="hidden" id="idCliente" name="idCliente">
          <div class="form-group">
            <label for="nombreClienteModificar">Nombre</label>
            <input type="text" id="nombreClienteModificar" name="nombreCliente" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="numeroMovilModificar">Número Móvil</label>
            <input type="text" id="numeroMovilModificar" name="numeroMovil" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="correoClienteModificar">Correo</label>
            <input type="email" id="correoClienteModificar" name="correoCliente" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="contraseñaClienteModificar">Contraseña</label>
            <input type="password" id="contraseñaClienteModificar" name="contraseñaCliente" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
      </div>

      <div id="clientes-revisar" class="section" style="display: none;">
        <h2>Revisar Clientes</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo Electrónico</th>
              <th>Contraseña</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tabla-clientes">
            <?php listarClientes() ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/scripts-admin.js"></script>
</body>

</html>