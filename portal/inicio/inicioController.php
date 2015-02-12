<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("portal","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Portal SICEFA';
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT); 
    }

    public function emprecefa() {
        $this->_view->titulo = 'Emprecefa';
        $this->_view->renderizar('emprecefa', DEFAULT_LAYOUT);    
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
