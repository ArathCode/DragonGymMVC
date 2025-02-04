
<?php
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ .  '/../config/database.php';

$conexion = new mysqli("localhost", "root", "", "dragongymp");
$controller = new LoginController($conexion);

$alert = $controller->autenticar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dragon Gym</title>
    <link rel="stylesheet" href="public/css/login.css"><!-- Ruta corregida -->
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="content">
            <img src="public/imgs/logo.jpg" alt="Logo" class="logo"><!-- Ruta corregida -->
            </div>
        </div>
        <div class="right-section">
            <h2>Hola, Bienvenido</h2>
            <p>Sistema Dragon' Gym</p>
            <form method="POST">
                <div>
                    <?php echo isset($alert) ? $alert : ""; ?>
                </div>
                <div class="input-group">
                    <input type="text" id="nombre" name="nombre" required>
                    <label for="nombre">Usuario</label>
                </div>
                <div class="input-group">
                    <input type="password" id="contra" name="contra" required>
                    <label for="contra">Contraseña</label>
                </div>
                <a href="views/recuperacion.php">¿Olvidó la contraseña?</a>
                <button type="submit" class="login">
                    <span>Ingresar</span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>