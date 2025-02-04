<?php
// models/UsuarioModel.php
class UsuarioModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function autenticarUsuario($nombreUsuario, $contraseña) {
        $nombreUsuario = mysqli_real_escape_string($this->conexion, $nombreUsuario);
        $contraseña = mysqli_real_escape_string($this->conexion, $contraseña);

        $query = "SELECT * FROM usuario WHERE NombreUsuario='$nombreUsuario' AND Contraseña='$contraseña'";
        $resultado = mysqli_query($this->conexion, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return false;
        }
    }
    public function verificarCorreo($correo) {
        $correo = mysqli_real_escape_string($this->conexion, $correo);
        $query = "SELECT * FROM usuario WHERE correo='$correo'";
        $result = mysqli_query($this->conexion, $query);
        return mysqli_num_rows($result) > 0;
    }
}?>