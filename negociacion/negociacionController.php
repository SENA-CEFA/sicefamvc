<?php

class negociacionController extends Controller {

    public function __construct() {
        parent::__construct("negociacion");
    }

    public function index() {
        $_SESSION['cita'] = '';
        $param = $this->loadModel('parametros');
        $this->_view->horas = $param->horas();
        $this->_view->titulo = 'Inicio de Sesion';
        $this->_view->renderizar('negociacion', 'timer');
    }

    public function ingresar() {
        $data = $this->loadModel('negociacion');
        if ($_POST) {
            $data->validar();
        }

        if ($_SESSION['cita'] != '') {
            if ($_SESSION['asistente'] != '') {
                $data = $this->loadModel('negociacion');
                $this->_view->datos = $data->cita();
                $this->_view->titulo = 'Tiempo de Negociación';
                $this->_view->renderizar('timer', 'timer');
            } else {
                $this->_view->titulo = 'Inicio de Sesion';
                $param = $this->loadModel('parametros');
                $this->_view->horas = $param->horas();
                $this->_view->mensaje = 'Cedula Incorrecta, Intente de Nuevo';
                $this->_view->renderizar('negociacion', 'timer');
            }
        } else {

            $this->_view->titulo = 'Inicio de Sesion';
            $param = $this->loadModel('parametros');
            $this->_view->horas = $param->horas();
            $this->_view->mensaje = 'Cita no encontrada, Intente de Nuevo';
            $this->_view->renderizar('negociacion', 'timer');
        }
    }

    public function timer() {
        $data = $this->loadModel('negociacion');
        $this->_view->datos = $data->cita();
        $this->_view->titulo = 'Empezar Negociacion';
        $this->_view->renderizar('timer', 'timer');
    }

    public function evaluacion() {
        $data = $this->loadModel('negociacion');
        $this->_view->datos = $data->cita();
        $this->_view->titulo = 'Evaluar al Vendedor';
        $this->_view->productos = $data->productos();
        $this->_view->renderizar('evaluacion', 'timer');
    }

    public function guardar() {
        if ($_SESSION['cita'] != '') {
            $negocio = $this->loadModel('negociacion');
            $negocio->evaluacion();
            $count = $negocio->negocio();


            if ($count > 0) {
                echo "<script>alert('Registro Agregado')</script>";
                $this->_view->titulo = 'Inicio de Sesion';
                $this->_view->renderizar('negociacion', 'timer');
            } else {
                echo "<script>alert('No se puede Guardar su calificación, intentelo de nuevo')</script>";
                $this->evaluacion();
            }
        } else {
            $this->index();
        }
    }

}
