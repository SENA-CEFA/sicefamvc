<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("elecciones", "procesos");
    }

    public function index() {
        $this->_view->titulo = 'Como ELegir';
        $this->_view->renderizar('inicio', 'elecciones');
    }

    public function habilita() {
        $this->_view->titulo = 'Habilitar Aprendiz para Votar';
        $this->_view->renderizar('habilita', 'elecciones');
    }
    
    public function buscapersona($argum = false){
        $this->_view->id = $argum;
        $data = $this->loadModel('sis', 'procesos');
        $this->_view->datospersona = $data->onepersona($argum);
        $this->_view->renderizar('conspersona', 'blank');

    }

}
