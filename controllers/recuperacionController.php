<?php
require_once __DIR__ . '/../models/UsuarioModel.php';

class RecuperacionController {
    private $model;
    private $alert;

    public function __construct($conexion) {
        $this->model = new UsuarioModel($conexion);
        $this->alert = '';
    }

    public function procesarRecuperacion($correo) {
        if (empty($correo)) {
            $this->alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                              <div>No se ingreso ningun correo</div>
                            </div>';
        } else {
            if ($this->model->verificarCorreo($correo)) {
                header("Location: ../controllers/enviarCorreo.php?correo=$correo");
            } else {
                $this->alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                  <div>El correo no existe</div>
                                </div>';
            }
        }
    }

    public function getAlert() {
        return $this->alert;
    }
}
?>
