<?php

class sesionController extends Controller {

    public function __construct() {
        parent::__construct("sesion");
    }

    public function index() {
        $this->_view->titulo = 'Inicio de Sesion';
        $this->_view->renderizar('sesion', 'sesion');
    }

    public function ingresar() {
        $data = $this->loadModel('sesion');
        if ($_POST) {
            $data->get();
        }

        if ($_SESSION['autentificado'] == 'Si') {
            $this->_view = new View('inicio');
            $this->_view->titulo = 'Pagina de Inicio';
            $this->_view->renderizar('inicio', 'default');
        } else {
            $this->_view->titulo = 'Inicio de Sesion';
            $this->_view->mensaje = 'Correo o Clave Incorrecta, Intente de Nuevo';
            $this->_view->renderizar('sesion', 'sesion');
        }
    }

    public function cerrar() {
            $_SESSION['autentificado'] = 'No';
            $_SESSION['perfil'] = '';
            $_SESSION['documento'] = '';
            $_SESSION['usuario'] = '';        
            $this->_view->titulo = 'Inicio de Sesion';
            $this->_view->mensaje = 'Ha cerrado sesión';
            $this->_view->renderizar('sesion', 'sesion');        
    }

}
