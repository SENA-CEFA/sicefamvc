<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("elecciones","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Elecciones';
        $this->_view->renderizar('inicio', 'elecciones'); 
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
