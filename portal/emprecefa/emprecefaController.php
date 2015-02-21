<?php

class emprecefaController extends Controller {

    public function __construct() {
        parent::__construct("portal", "emprecefa");
    }

    public function index() {
        $this->_view->titulo = 'Emprecefa';
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
    }

    public function presentacion() {
        $this->_view->titulo = 'Emprecefa';
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
    }

    public function organigrama() {
        $this->_view->titulo = 'Organigrama Emprecefa';
        $this->_view->renderizar('organigrama', DEFAULT_LAYOUT);
    }

    public function areas() {
        $this->_view->titulo = 'Areas y Unidades Productivas';
        $this->_view->renderizar('areas', DEFAULT_LAYOUT);
    }

}
