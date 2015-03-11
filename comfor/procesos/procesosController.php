<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("comfor","procesos");
    }

    public function index() {
        $this->_view->titulo = 'Registrar Elementos';
        $this->_view->renderizar('registroelementos', 'comfor');
    }
    public function AsignacionPresupuestal() {
        $this->_view->titulo = 'Asignación Presupuestal';
        $this->_view->renderizar('asignarpresupuesto', 'comfor');
    }
     public function PresupuestoTitulacion() {
        $this->_view->titulo = 'Presupuesto Titulacion';
        $this->_view->renderizar('presupuestotitulacion', 'comfor');
    }
     public function ValidarSolicitudElementos() {
        $this->_view->titulo = 'Validar Solicitud Elementos';
        $this->_view->renderizar('validarsolicitud', 'comfor');
    }
     public function FinalizarSolicitudElementos() {
        $this->_view->titulo = 'Finalizar Solicitud Elementos';
        $this->_view->renderizar('finalizarsolicitud', 'comfor');
    }
}
