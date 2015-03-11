<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("cafecefa","inicio");
    }

    public function index() {
        $this->_view->titulo = 'cafecefa - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'cafecefa');
    }
}
