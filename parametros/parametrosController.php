<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("parametros");
    }

    public function index() {
        $data = $this->loadModel('parametros');
        $this->_view->datos = $data->get();
        $this->_view->titulo = 'Parametros Generales';
        $this->_view->renderizar('parametros', 'default');
    }
    
    public function guardar(){
        $data = $this->loadModel('parametros');
        $cont=$data->edit();
        if ($cont > 0) {
            echo "<script>alert('Registro Modificado')</script>";
        }
        $this->_view->datos = $data->get();
        $this->_view->titulo = 'Parametros Generales';
        $this->_view->renderizar('parametros', 'default');   
    }
          

}
