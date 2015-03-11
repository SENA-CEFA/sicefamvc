<?php

class pqrsfController extends Controller {

    public function __construct() {
        parent::__construct("portal", "pqrsf");
    }

    public function index() {
        $this->_view->titulo = 'Buzon PQRSF';
        $data = $this->loadModel('sgth', 'parametros');
        $this->_view->aplicativos = $data->listaplicativos();
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
    }

    public function nueva() {
        $this->_view->titulo = 'Buzon PQRSF';
        $data = $this->loadModel('sgth', 'parametros');
        $this->_view->aplicativos = $data->listaplicativos();
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT);
    }

    public function consulta() {
        $this->_view->titulo = 'Consulta tu solicitud';
        $this->_view->renderizar('consulta', DEFAULT_LAYOUT);
    }

}
