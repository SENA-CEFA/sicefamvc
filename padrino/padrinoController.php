<?php

class padrinoController extends Controller {

    public function __construct() {
        parent::__construct("padrino");
    }

    public function index() {
        $data = $this->loadModel('padrino');
        $this->_view->datos = $data->lista();
        $this->_view->titulo = 'Listado de Eventos';
        $this->_view->renderizar('padrino', 'default');
    }

    public function ver($arg = false) {
        $data = $this->loadModel('padrino');
        $this->_view->datos = $data->get($arg);
        $this->_view->titulo = 'Detalle Evento';
        $this->_view->renderizar('ver', 'default');
    }

    public function borrar($arg = false) {
        $data = $this->loadModel('padrino');
        $this->_view->datos = $data->get($arg);
        $this->_view->id = $arg;
        $this->_view->titulo = 'Detalle Evento a Borrar';
        $this->_view->renderizar('borrar', 'default');
    }

    public function eliminar($arg = false) {
        $data = $this->loadModel('padrino');
        $cont = $data->delete($arg);
        if ($cont > 0) {
            echo "<script>alert('Registro Eliminado')</script>";
            $this->_view->datos = $data->lista();
            $this->_view->titulo = 'Listado de Eventos';
            $this->_view->renderizar('padrino', 'default');
        } else {
            echo "<script>alert('No se puedo eliminar, intentelo de nuevo')</script>";
            $this->_view->datos = $data->get($arg);
            $this->_view->id = $arg;
            $this->_view->titulo = 'Detalle Evento a Borrar';
            $this->_view->renderizar('borrar', 'default');
        }
    }

    public function editar($arg = false) {
        $data = $this->loadModel('padrino');
        $this->_view->datos = $data->get($arg);
        $this->_view->admin = $data->getadmin();
        $this->_view->id = $arg;
        $this->_view->titulo = 'Editar Evento';
        $this->_view->renderizar('editar', 'default');
    }

    public function modificar($arg = false) {
        $data = $this->loadModel('padrino');
        $cont = $data->edit($arg);
        if ($cont > 0) {
            echo "<script>alert('Registro Modificado')</script>";
            $this->_view->datos = $data->lista();
            $this->_view->titulo = 'Listado de Eventos';
            $this->_view->renderizar('padrino', 'default');
        } else {
            echo "<script>alert('No se puedo modificar, intentelo de nuevo')</script>";
            $this->_view->datos = $data->get($arg);
            $this->_view->id = $arg;
            $this->_view->titulo = 'Detalle Evento a Editar';
            $this->_view->renderizar('editar', 'default');
        }
    }

    public function nuevo() {
        $data = $this->loadModel('padrino');
        $this->_view->admin = $data->getadmin();
        $this->_view->titulo = 'Agregar Evento';
        $this->_view->renderizar('nuevo', 'default');
    }

    public function insertar() {
        $data = $this->loadModel('padrino');
        $cont = $data->set();
        if ($cont > 0) {
            echo "<script>alert('Registro Agregado')</script>";
            $this->_view->datos = $data->lista();
            $this->_view->titulo = 'Listado de Eventos';
            $this->_view->renderizar('padrino', 'default');
        } else {
            echo "<script>alert('No se puedo Agregar, intentelo de nuevo')</script>";
            $this->_view->admin = $data->getadmin();
            $this->_view->titulo = 'Agregar Evento';
            $this->_view->renderizar('nuevo', 'default');
        }
    }
    public function buscar(){
         $data = $this->loadModel('padrino');
        $this->_view->titulo = 'Listado de Eventos';
        $this->_view->renderizar('buscar', 'default');       
    }
    
    public function encontrar(){
        $data = $this->loadModel('padrino');
        if($_POST){
            $id=$data->buscarnombre();
            if($id)
            {
            $controller = new padrinoController();
            call_user_func_array(array($controller, 'ver'), $id[0]);
            }
            else
            {
        $this->_view->titulo = 'Listado de Eventos';
        $this->_view->renderizar('padrino', 'default');       
           
                
            }
        }
        
    }
            

}
