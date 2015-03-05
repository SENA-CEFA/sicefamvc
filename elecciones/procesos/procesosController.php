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

    public function buscapersona($argum = false) {
        $this->_view->id = $argum;
        $data = $this->loadModel('sis', 'procesos');
        $this->_view->datospersona = $data->onepersona($argum);
        if (count($this->_view->datospersona) > 0) {
            $this->_view->encuentra = '1';
        } else {
            $this->_view->datospersona=array(25);
            $this->_view->encuentra = '0';
        }
        $this->_view->renderizar('conspersona', 'blank');
    }

}
