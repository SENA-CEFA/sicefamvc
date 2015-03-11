<?php

class validacionController extends Controller {

    public function __construct() {
        parent::__construct("sigac","validacion");
    }

    public function index() {
        $this->_view->titulo = 'Validar Programación de Instructores';
        $this->_view->renderizar('valida', DEFAULT_LAYOUT); 
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
