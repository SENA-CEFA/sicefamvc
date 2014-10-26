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
        $this->_view->titulo = 'Gestión Empresas';
        $this->_view->renderizar('gesempresa', 'default');
    }
}
