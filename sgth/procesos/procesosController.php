<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("sgth","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Inicio';
        $this->_view->renderizar('inicio', 'sgth');
    }
}
