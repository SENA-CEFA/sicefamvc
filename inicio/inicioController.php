<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("inicio");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Incio';
        $this->_view->renderizar('inicio', 'default');
    }
    public function consolidado() {
        $data = $this->loadModel('inicio');
        $this->_view->datos = $data->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->renderizar('consolidado', 'default');
    }
}
