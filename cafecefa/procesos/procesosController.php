<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("cafecefa", "procesos");
    }

    public function index() {
        $this->_view->titulo = 'Pagina de Incio';
        $this->_view->renderizar('entr', 'cafecefa');
    }
    
   
}
