<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("comfor","inicio");
    }

    public function index() {
        $this->_view->titulo = 'COMFOR - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'comfor');
    }
}
