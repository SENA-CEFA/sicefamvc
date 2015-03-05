<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("sica", "procesos");
    }

    public function index() {
        $data = $this->loadModel('sica', 'procesos');
        $this->_view->titulaciones = $data->titulaciones();
        $this->_view->titulo = 'Agsinasion de Turnos';
        $this->_view->renderizar('agsinarturnos', 'sica');
    }

    public function asistencia() {
        $data = $this->loadModel('sica', 'procesos');
        $this->_view->titulaciones = $data->titulaciones();
        $this->_view->areas = $data->areas();
        $this->_view->asistencia = $data->asistencia();
        $this->_view->titulo = 'Asistencia';
        $this->_view->renderizar('asistencia', 'sica');
    }
    public function listaaprendices($argum = false){
        $this->_view->id = $argum;
        $data = $this->loadModel('sica', 'procesos');
        $this->_view->turnos = $data->turnos();
        $this->_view->areas = $data->areas();
        $this->_view->datos = $data->get($argum);
        $this->_view->renderizar('aprendices', 'blank');

    }
    

     public function guardar() {
       $turno = $this->loadModel('sica', 'procesos');
        $count = $turno->guardarturno();
        if ($count > 0) {
            echo "<script>alert('Turnos Guardados')</script>";
            $this->index();
        } else {
            
            echo "<script>alert('No se puede guardar los Turnos')</script>";
            $this->index();
            
        }
    }

}
