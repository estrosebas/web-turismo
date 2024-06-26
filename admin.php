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
        <p>¡Gracias por visitar nuestra página de administración de turismo!</p>
      </div>
      <!--lugares-->
      <div id="lugares-registrar" class="section" style="display: none;">
        <h2>Registrar lugar</h2>
        <form>
          <div class="form-group">
            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <label for="monto">Monto de entrada:</label>
            <input type="number" id="monto" name="monto" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Registrar Lugar</button>
        </form>
      </div>

      <!--MODIFICAR LUGAR-->
      <div id="lugares-modificar" class="section" style="display: none;" >
        <h2>Modificar Lugar</h2>
        <!-- Formulario para modificar lugar -->
        <div class="form-group">
            <label for="buscar-lugar">Buscar Lugar:</label>
            <input type="text" id="buscar-lugar" class="form-control">
            <button type="button" class="btn btn-primary" onclick="buscarLugar()">Buscar</button>
        </div>
        <form id="formulario-modificar-lugar" style="display: none;">
            <div class="form-group">
                <label for="lugar">Lugar:</label>
                <input type="text" id="lugar" name="lugar" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="monto">Monto de entrada:</label>
                <input type="number" id="monto" name="monto" class="form-control" required>
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
                <tr>
                    <td>Plaza de Armas</td>
                    <td>Arequipa, Perú</td>
                    <td>La Plaza de Armas de Arequipa es una plaza principal ubicada en el centro histórico de la ciudad de Arequipa.</td>
                    <td>S/ 50.00</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Misti</td>
                    <td>Arequipa, Perú</td>
                    <td>El Misti es un estratovolcán al sur del Perú, ubicado cerca de la ciudad de Arequipa.</td>
                    <td>S/ 200.00</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td>Monasterio de Santa Catalina</td>
                    <td>Arequipa, Perú</td>
                    <td>El Monasterio de Santa Catalina es un convento de monjas de la Orden de Santo Domingo, ubicado en Arequipa.</td>
                    <td>S/ 10.00</td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>





      <div id="clientes-registrar" class="section" style="display: none;">
        <h2>Registrar Clientes</h2>
        <form>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </form>
      </div>
      <!--clientes modificar-->
      <div id="clientes-modificar" class="section" style="display: none;">
        <h2>Modificar Cliente</h2>
        <!-- Formulario para modificar clientes -->
        <div class="form-group">
            <label for="buscar-cliente">Buscar Cliente:</label>
            <input type="text" id="buscar-cliente" class="form-control">
            <button type="button" class="btn btn-primary" onclick="buscarCliente()">Buscar</button>
        </div>
        <form id="formulario-modificar-cliente" style="display: none;">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
              <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>john123</td>
                <td>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </td>
              </tr>
              <tr>
                  <td>Jane Smith</td>
                  <td>jane@example.com</td>
                  <td>jane123</td>
                  <td>
                      <button class="btn btn-primary">Editar</button>
                      <button class="btn btn-danger">Eliminar</button>
                  </td>
              </tr>
            </tbody>
        </table>
      </div>

      <!--reportes-->
      <div id="reportes" class="section" style="display: none;">
        <h2>Generar Reportes</h2>
        <!-- Formulario para generar reportes -->
        <form>
          <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="fecha_fin">Fecha de Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/scripts-admin.js"></script>
</body>
</html>
