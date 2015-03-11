<?php

class reportesController extends Controller {

    public function __construct() {
        parent::__construct("elecciones", "reportes");
    }

    public function index() {
        $data = $this->loadModel('elecciones', 'reportes');
        $this->_view->votantes = $data->votantes();
        $this->_view->titulo = 'Como ELegir';
        $this->_view->renderizar('votantes', 'elecciones');
    }
    
    public function votos() {
        $data = $this->loadModel('elecciones', 'reportes');
        $this->_view->votostotal = $data->votostotal();
        $this->_view->votos = $data->votos();
        $this->_view->titulo = 'Como ELegir';
        $this->_view->renderizar('votos', 'elecciones');
    }

}
