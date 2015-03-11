<?php

class inicioController extends Controller {

    public function __construct() {
        parent::__construct("peecefa","inicio");
    }

    public function index() {
        $this->_view->titulo = 'PEE-CEFA - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'peecefa');
    }
     public function vencidos() {
        $this->_view->titulo = 'Equipos Vencidos';
        $this->_view->renderizar('vencidos', 'peecefa');
    }
}
