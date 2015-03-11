<?php

class creditosController extends Controller {

    public function __construct() {
        parent::__construct("sica", "creditos");
    }

    public function index() {
    $this->_view->titulo = 'Creditos';
        $this->_view->renderizar('creditos', 'sica');
    }
}