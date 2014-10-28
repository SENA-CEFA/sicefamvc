<?php

class empresaController extends Controller {

    public function __construct() {
        parent::__construct("empresa");
    }

    public function index() {
        $this->_view->titulo = 'Empresas';
        $this->_view->renderizar('repempresa', 'default');
    }
    public function gestion() {
        $data = $this->loadModel('empresa');
        $this->_view->datos = $data->lista();
        $this->_view->titulo = 'Lista Empresas';
        $this->_view->renderizar('empresa', 'default');
    }
}
