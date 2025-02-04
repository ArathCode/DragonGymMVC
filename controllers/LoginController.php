
<?php
// controllers/LoginController.php

require_once __DIR__ . '/../models/UsuarioModel.php';

class LoginController {
    private $model;

    public function __construct($conexion) {
        $this->model = new UsuarioModel($conexion);
    }

    public function autenticar() {
        $alert = "";

        if (!empty($_POST)) {
            if (empty($_POST['nombre']) || empty($_POST['contra'])) {
                $alert = '<div class="alert alert-warning d-flex align-items-center" role="alert">
                            <div>Usuario y/o contraseña son obligatorios</div>
                          </div>';
            } else {
                $usuario = $_POST['nombre'];
                $contraseña = $_POST['contra'];

                $dato = $this->model->autenticarUsuario($usuario, $contraseña);

                if ($dato) {
                    session_start();
                    $_SESSION['activa'] = true;
                    $_SESSION['nombre'] = $dato['NombreUsuario'];
                    $_SESSION['rol'] = $dato['ID_Rol'];
                    header('location: cliente/home.php');
                    exit();
                } else {
                    $alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <div>Usuario y/o contraseña incorrecta!!!</div>
                              </div>';
                }
            }
        }

        return $alert;
    }
}
?>