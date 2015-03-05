<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("sigac","inicio");
    }

    public function index() {
        $this->_view->titulo = 'SIGAC - Gestion Academica';
        $this->_view->renderizar('inicio', 'sigac'); 
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
