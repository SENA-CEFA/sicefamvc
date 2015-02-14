<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("puntodeventa","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Punto de Venta';
        $this->_view->renderizar('inicio', 'puntodeventa'); 
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
