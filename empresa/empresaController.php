<?php

class empresaController extends Controller {

    public function __construct() {
        parent::__construct("empresa");
    }
    public function index() {
        $empresa = $this->loadModel('empresa');
        $this->_view->vende = $empresa->numvende();
        $this->_view->compra = $empresa->numcompra(); 
        $this->_view->intencion = $empresa->intencion();
        $this->_view->productos = $empresa->productos();
        $this->_view->titulo = 'Empresas';
        $this->_view->renderizar('repempresa', 'default');
    }
    public function gestion() {
        $data = $this->loadModel('empresa');
        $this->_view->datos = $data->lista();
        $this->_view->titulo = 'Lista Empresas';
        $this->_view->renderizar('empresa', 'default');
    }
    
    public function nuevo() {
        $data = $this->loadModel('empresa');
        $this->_view->titulo = 'Registro';
        $this->_view->renderizar('nuevo', 'default');
    }

    public function insertar() {
        $data = $this->loadModel('empresa');
        $this->_view->titulo = 'Confirmar registro';
        $this->_view->renderizar('confirmarreg', 'default');
    }
}
