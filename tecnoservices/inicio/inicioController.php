<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("tecnoservices","inicio");
    }

    public function index() {
        $this->_view->titulo = 'TECNOSERVICES - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'tecnoservices');
    }
}
