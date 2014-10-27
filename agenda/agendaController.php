<?php

class agendaController extends Controller {

    public function __construct() {
        parent::__construct("agenda");
    }

    public function index() {
        $this->_view->titulo = 'Agenda';
        $this->_view->renderizar('repagenda', 'default');
    }
    public function gestion() {
        $this->_view->titulo = 'Gestión Agenda';
        $this->_view->renderizar('gesagenda', 'default');
    }
}
