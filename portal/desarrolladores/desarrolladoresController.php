<?php
class desarrolladoresController extends Controller {

    public function __construct() {
        parent::__construct("portal","desarrolladores");
    }

    public function index() {
        $this->_view->titulo = 'Desarrolladores';
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT); 
    }

    public function busca($argum = false) {
        $this->_view->dato=$argum;
        $this->_view->renderizar('prueba', 'blank'); 
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
