<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("sia","inicio");
    }

    public function index() {
        $this->_view->titulo = 'SIA - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'sia');
    }

}
