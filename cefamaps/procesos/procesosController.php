<?php
class procesosController extends Controller {

    public function __construct() {
        parent::__construct("cefamaps","procesos");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Incio';
        $this->_view->renderizar('inicio', 'cefamaps');
    }
    
    public function trazarareas(){
        $this->_view->titulo = 'Trazar Areas';
        $this->_view->renderizar('trazar', 'cefamaps');
    }
}
