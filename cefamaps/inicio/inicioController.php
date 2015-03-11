<?php
class inicioController extends Controller {

    public function __construct() {
        parent::__construct("cefamaps","inicio");
    }

    public function index() {
        $this->_view->titulo = 'CEFAMAPS - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'cefamaps');
    }
}
