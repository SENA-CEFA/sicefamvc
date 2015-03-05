<?php
class procesosController extends Controller {

    public function __construct() {
        //('aplicacion','controlador')
        parent::__construct("puntodeventa","procesos");
    }

    public function index() {
        $this->_view->titulo = 'Punto de Venta';
        //('vista','layout')
        $this->_view->renderizar('ventas', 'puntodeventa'); 
    }

/*
    public function rutinarios() {
        $data = $this->loadModel('inicio');
        $this->_view->datos = $data->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->renderizar('consolidado', 'default');
    }
 */
}
