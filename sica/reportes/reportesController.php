<?php

class reportesController extends Controller {

    public function __construct() {
        parent::__construct("sica", "reportes");
    }

    public function index() {
    $this->_view->titulo = 'reportes';
        $this->_view->renderizar('inicio', 'sica');
    }
    public function imprimir() {
        $this->_view->titulo = 'Imprimir Formato';
        $this->_view->renderizar('formato', 'formatos');
    }
    public function imprimir2() {
        $this->_view->titulo = 'Imprimir Formato';
        $this->_view->renderizar('formato2', 'formatos');
    }
}