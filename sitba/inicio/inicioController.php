<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("sitba","inicio");
    }

    public function index() {
        $this->_view->titulo = 'SITBA - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'sitba');
    }
}
