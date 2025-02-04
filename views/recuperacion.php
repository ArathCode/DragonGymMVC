<?php
// Recuperacion.php
require_once __DIR__ . '/../controllers/recuperacionController.php';
require_once __DIR__ .  '/../config/database.php';


$controller = new RecuperacionController($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $controller->procesarRecuperacion($correo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cliente/css/recuperacion.css">
    <title>Recuperación</title>
</head>
<body>
    <div class="encabezado">
        <div class="imagen">
            <img src="../cliente/imgs/logo.jpg" alt="" class="logo">
        </div>
    </div>

    <div class="main">
        <div class="titulo">
            <h2>Recuperación de contraseña</h2>
        </div>
        
        <div class="formulario">
            <form method="POST">
                <?php echo $controller->getAlert(); ?>
                <div class="contenidoIn">
                    <div class="input-group">
                        <input type="email" id="correo" name="correo" required>
                        <label for="correo">Correo electrónico</label>
                    </div>
                </div>
                <div class="boton">
                    <button type="submit" class="pushable">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front">Enviar correo</span>
                    </button>
                </div>
                <div class="regresar">
                    <a href="../index.php" type="button" class="btn btn-danger">Regresar</a>
                </div>
            </form>  
        </div>
    </div>
</body>
</html>