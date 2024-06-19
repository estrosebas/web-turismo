<?php
session_start();
require_once('php/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Manejar el inicio de sesión
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $sql = "SELECT * FROM usuarios WHERE Correo = '$correo' AND Contraseña = '$contraseña'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Usuario y contraseña son correctos
            $row = $result->fetch_assoc();
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['Nombre'];
            $_SESSION['usuario_correo'] = $row['Correo'];
            $_SESSION['usuario_telefono']= $row['NumeroMovil'];
            $_SESSION['esAdmin'] = $row['esAdmin'];
            
            if ($row['esAdmin'] == 1) {
                header("Location: admin.php"); // Redirigir al dashboard de administrador
            } else {
                header("Location: clientes.php"); // Redirigir al dashboard de clientes
            }
            exit(); // Asegurarse de que no se ejecute más código después de la redirección
        } else {
            // Usuario o contraseña incorrectos
            $error = "Usuario o contraseña incorrectos";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'register') {
        // Manejar el registro
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $telefono = $_POST['telefono'];

        // Verificar si el correo ya está registrado
        $sql = "SELECT * FROM usuarios WHERE Correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (Nombre,NumeroMovil, Correo, Contraseña) VALUES ('$nombre', '$telefono', '$correo', '$contraseña')";
            if ($conn->query($sql) === TRUE) {
                // Registro exitoso
                $_SESSION['usuario_id'] = $conn->insert_id;
                $_SESSION['usuario_nombre'] = $nombre;
                $_SESSION['usuario_correo'] = $correo;
                $_SESSION['usuario_telefono'] = $telefono;
                
                header("Location: clientes.php"); // Redirigir al dashboard o página principal
                exit();
            } else {
                // Error al insertar el usuario
                $error = "Error al registrar el usuario: " . $conn->error;
            }
        } else {
            // El correo ya está registrado
            $error = "El correo ya está registrado";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Perú</title>
    <link rel="stylesheet" href="./css/style-login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="content">
        <div class="wrapper" id="loginForm">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1>Login</h1>
                <?php if(isset($error) && isset($_POST['action']) && $_POST['action'] === 'login') { ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php } ?>
                <input type="hidden" name="action" value="login">
                <div class="input-box">
                    <input type="text" name="correo" placeholder="Correo" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">Recordarmelo</label>
                    <a href="#">Olvide mi contraseña</a>
                </div>
                <button type="submit" class="btn">Ingresar</button>
                <div class="register-link">
                    <p>¿Aun no tienes una cuenta? <a href="#" onclick="showRegisterForm()">Regístrate</a></p>
                </div>
            </form>
        </div>

        <div class="wrapper" id="registerForm" style="display: none;">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h1>Registro</h1>
                <?php if(isset($error) && isset($_POST['action']) && $_POST['action'] === 'register') { ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php } ?>
                <input type="hidden" name="action" value="register">
                <div class="input-box">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="correo" placeholder="Correo Electrónico" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="telefono" placeholder="Teléfono" required>
                    <i class='bx bxs-phone'></i>
                </div>
                <button type="submit" class="btn">Registrar</button>
                <div class="register-link">
                    <p>¿Ya tienes una cuenta? <a href="#" onclick="showLoginForm()">Inicia Sesión</a></p>
                </div>
            </form>
        </div>

    </div>

    <script>
        function showRegisterForm() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        }

        function showLoginForm() {
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        }
    </script>
</body>

</html>
