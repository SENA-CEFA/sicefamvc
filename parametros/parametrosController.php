<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("parametros");
    }

    public function index() {
        $this->_view->titulo = 'Parametros Generales';
        $this->_view->renderizar('parametros', 'default');
    }

}
