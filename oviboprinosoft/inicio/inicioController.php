<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("oviboprinosoft","inicio");
    }

    public function index() {
        $this->_view->titulo = 'OVIBOPRINOSOFT - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'oviboprinosoft'); 
    }

/*
    public function rutinarios() {
        $data = $this->loadModel('inicio');
        $this->_view->datos = $data->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->renderizar('consolidado', 'default');
    }
 */
}
