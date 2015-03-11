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
     public function tipobien() {
        $this->_view->titulo = 'Elementos Tipo Bien';
        $this->_view->renderizar('eletipobien', 'comfor');
    }
    public function tipoelemento() {
        $this->_view->titulo = ' Tipo De Elementos';
        $this->_view->renderizar('tipoelementos', 'comfor');
    }
     
}
