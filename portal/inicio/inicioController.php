<?php
class inicioController extends Controller {

    public function __construct() {
        parent::__construct("portal","inicio");
    }

    public function index() {
        $this->_view->titulo = 'Portal SICEFA';
        $data = $this->loadModel('sgth', 'parametros');
        $this->_view->aplicativos = $data->listaplicativos();
        $this->_view->renderizar('inicio', DEFAULT_LAYOUT); 
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
