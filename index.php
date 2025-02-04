
<?php
// index.php
require_once 'config/database.php';
require_once 'controllers/LoginController.php';

$controller = new LoginController($conexion);
include 'views/login.php';

?>