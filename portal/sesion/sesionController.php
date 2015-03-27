<?php

class sesionController extends Controller {

    public function __construct() {
        parent::__construct("portal", "sesion");
    }

    public function index() {
        $this->_view->titulo = 'Inicio de Sesión';
        $this->_view->renderizar('sesion', 'sesion');
    }

    public function ingresar() {
        $data = $this->loadModel('portal', 'sesion');
        if ($_POST) {
            $data->get();
        }

        if ($_SESSION['autentificado'] == 'Si') {
            $this->_view = new View('portal', 'inicio');
            $this->_view->titulo = 'Pagina de Inicio';
            $data = $this->loadModel('sgth', 'parametros');
            $this->_view->aplicativos = $data->listaplicativos();
            $men = new Menu;
            $this->_view->menu = $men->menurol('portal', 'Admin');
            $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
        } else {
            $this->_view->titulo = 'Inicio de Sesion';
            $this->_view->mensaje = 'Usuario o Clave Incorrecta, Intente de Nuevo';
            $this->_view->renderizar('sesion', 'sesion');
        }
    }

    public function cerrar() {
        $_SESSION['autentificado'] = 'No';
        $_SESSION['perfil'] = '';
        $_SESSION['documento'] = '';
        $_SESSION['usuario'] = '';
        $this->_view->titulo = 'Inicio de Sesión';
        $this->_view->mensaje = 'Ha cerrado sesión';
        $this->_view = new View('portal', 'inicio');
        $this->_view->titulo = 'Pagina de Inicio';
        $data = $this->loadModel('sgth', 'parametros');
        $this->_view->aplicativos = $data->listaplicativos();
        $men = new Menu;
        $this->_view->menu = $men->menurol('portal', 'Admin');
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
    }

}
