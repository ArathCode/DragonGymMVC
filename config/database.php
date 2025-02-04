<?php
$conexion = new mysqli("localhost", "root", "", "dragongymp");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>