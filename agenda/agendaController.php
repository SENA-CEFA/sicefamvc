<?php

class agendaController extends Controller {

    public function __construct() {
        parent::__construct("agenda");
    }

    public function index() {
        $data = $this->loadModel('parametros');
        $this->_view->datos = $data->get();
        $this->_view->titulo = 'Agenda';
        $this->_view->renderizar('repagenda', 'default');
    }

    public function buscar() {
        $param = $this->loadModel('parametros');
        $this->_view->param = $param->get();
        $this->_view->horas = $param->horas();
        $empresa = $this->loadModel('empresa');
        $this->_view->vende = $empresa->numvende();
        $this->_view->compra = $empresa->numcompra();
        $padrino = $this->loadModel('padrino');
        $this->_view->padrino = $padrino->lista();
        $data = $this->loadModel('agenda');
        $this->_view->datos = $data->get();
        $this->_view->titulo = 'Busqueda Agenda';
        $this->_view->renderizar('busagenda', 'default');
    }

    public function gestion() {
        $empresa = $this->loadModel('empresa');
        $arg = '';
        if ($_POST && $_POST['cmbCategoria'] != '') {
            $arg = $_POST['cmbCategoria'];
        }
        $this->_view->vende = $empresa->vende($arg);
        $this->_view->compra = $empresa->compra($arg);
        $this->_view->intencion = $empresa->intencion();
        $this->_view->productos = $empresa->productos();
        $categorias = $this->loadModel('inicio');
        $this->_view->categorias = $categorias->consolidar();
        $this->_view->titulo = 'Consolidado';
        $this->_view->titulo = 'Gestión Agenda';
        $this->_view->renderizar('gesagenda', 'default');
    }

    public function editar($arg = false) {
        $param = $this->loadModel('parametros');
        $this->_view->param = $param->get();
        $this->_view->horas = $param->horas();
        $empresa = $this->loadModel('empresa');
        $this->_view->vende = $empresa->numvende();
        $this->_view->compra = $empresa->numcompra();
        $data = $this->loadModel('agenda');
        $this->_view->datos = $data->get($arg);
        $this->_view->id = $arg;
        $this->_view->titulo = 'Editar Cita';
        $this->_view->renderizar('editar', 'default');
    }

    public function modificar($arg = false) {
        $data = $this->loadModel('agenda');
        $cont = $data->edit($arg);
        if ($cont > 0) {
            echo "<script>alert('Cita Modificada')</script>";
            $_POST['cmbPadrinoCompra']='';
            $_POST['cmbPadrinoVende']='';
            $this->buscar();
        } else {
            echo "<script>alert('No se puedo Modificar, intentelo de nuevo')</script>";
            $this->_view->datos = $data->get($arg);
            $this->_view->id = $arg;
            $this->_view->titulo = 'Detalle Cita a Editar';
            $this->_view->renderizar('editar', 'default');
        }
    }

    public function borrar($arg = false) {
        $data = $this->loadModel('agenda');
        $this->_view->datos = $data->get($arg);
        $this->_view->id = $arg;
        $this->_view->titulo = 'Detalle Cita a Cancelar';
        $this->_view->renderizar('borrar', 'default');
    }

    public function eliminar($arg = false) {
        $data = $this->loadModel('agenda');
        $cont = $data->delete($arg);
        if ($cont > 0) {
            echo "<script>alert('Cita Cancelada')</script>";
            $this->buscar();
        } else {
            echo "<script>alert('No se puedo Cancelar o ya esta cancelada, verifique e intentelo de nuevo')</script>";
            $this->_view->datos = $data->get($arg);
            $this->_view->id = $arg;
            $this->_view->titulo = 'Detalle Cita a Borrar';
            $this->_view->renderizar('borrar', 'default');
        }
    }

    public function encontrar() {
        $data = $this->loadModel('agenda');
        //$this->_view->datos = $data->get($arg);
        //$this->_view->id = $arg;
        $this->_view->titulo = 'Detalle de Cita';
        $this->_view->renderizar('encontrar', 'default');
    }

}
