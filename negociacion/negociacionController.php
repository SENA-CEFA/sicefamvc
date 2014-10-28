<?php

class negociacionController extends Controller {

    public function __construct() {
        parent::__construct("negociacion");
    }

    public function index() {
        $this->_view->titulo = 'Login Comprador';
        $this->_view->renderizar('negociacion', 'default');
    }

    public function timer($arg = false) {
        $this->_view->titulo = 'Empezar Negociación';
        $this->_view->renderizar('timer', 'default');
    }

    public function evaluacion($arg = false) {
        $this->_view->titulo = 'Evaluar Negociación';
        $this->_view->renderizar('evaluacion', 'default');
    }

}
