<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("comfor","parametros");
    }

    public function index() {
        $this->_view->titulo = 'Lineas De Compras';
        $this->_view->renderizar('lineacompras', 'comfor');
    }
    public function rubros() {
        $this->_view->titulo = 'Rubros';
        $this->_view->renderizar('rubros', 'comfor');
    }
     public function presupuestos() {
        $this->_view->titulo = 'Presupuestos';
        $this->_view->renderizar('presupuesto', 'comfor');
    }
     public function elementos() {
        $this->_view->titulo = 'Elementos';
        $this->_view->renderizar('elementos', 'comfor');
    }
     
}
