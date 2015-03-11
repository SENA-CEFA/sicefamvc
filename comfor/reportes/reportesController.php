<?php

class reportesController extends Controller {

    public function __construct() {
        parent::__construct("comfor","reportes");
    }

    public function index() {
        $this->_view->titulo = 'Consolidado Por Vigencia';
        $this->_view->renderizar('consolidadovigencia', 'comfor');
    }
     public function distrimateriales() {
        $this->_view->titulo = 'Distribucion De Materiales Por Titulacion';
        $this->_view->renderizar('distrimateriales', 'comfor');
    }
}

