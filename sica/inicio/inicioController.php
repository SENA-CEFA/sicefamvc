<?php
class inicioController extends Controller {

    public function __construct() {
        parent::__construct("sica","inicio");
    }

    public function index() {
        $this->_view->titulo = 'SICA - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'sica');
    }
}
