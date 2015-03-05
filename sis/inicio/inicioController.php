<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("sis","inicio");
    }

    public function index() {
        $this->_view->titulo = 'SYSTEM REGISTER - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'sis');
    }
}
