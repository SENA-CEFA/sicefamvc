<?php

class agendaController extends Controller {

    public function __construct() {
        parent::__construct("agenda");
    }

    public function index() {
        $data = $this->loadModel('parametros');
        $this->_view->datos = $data->get();
        $this->_view->horas = $data->horas();
        $data = $this->loadModel('agenda');
        $this->_view->citas = $data->reporte();
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
        $categoria = filter_input(INPUT_POST, 'cmbCategoria');
        if ($categoria != '') {
            $arg = $categoria;
        }
        $param = $this->loadModel('parametros');
        $this->_view->param = $param->get();
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
            $_POST['cmbPadrinoCompra'] = '';
            $_POST['cmbPadrinoVende'] = '';
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
        
    }

    public function accion() {
        $enviar = filter_input(INPUT_POST, 'enviar');
        if ($enviar) {
            if ($enviar == 'rapida') {
                $postmesa = filter_input(INPUT_POST, 'cmbMesa');
                if ($postmesa != '') {
                    $data = $this->loadModel('agenda');
                    $disp = $data->rapido();
                    if ($disp != 0) {
                        echo "<script>alert('Registro Exitoso')</script>";
                        $this->gestion();
                    } else {
                        echo "<script>alert('No se pudo realiza el registro, por favor revise disponibilidad')</script>";
                        $this->gestion();
                    }
                } else {
                    echo "<script>alert('Debe Seleccionar una Mesa')</script>";
                    $this->gestion();
                }
            } elseif ($enviar == 'disponibilidad') {
                $param = $this->loadModel('parametros');
                $this->_view->param = $param->get();
                $this->_view->horas = $param->horas();
                $empresa = $this->loadModel('empresa');
                $v = $_POST['ven'];
                $c = $_POST['com'];
                $this->_view->vende = $empresa->nombrevende($v[0]);
                $this->_view->compra = $empresa->nombrecompra($c[0]);
                $data = $this->loadModel('agenda');
                $disp = $data->nodisponible();
                if ($disp == 0) {
                    echo "<script>alert('Ya Existe una Cita registrada para Comprador y Vendedor')</script>";
                    $this->gestion();
                } else {
                    $this->_view->nodisponible = $disp;

                    $this->_view->titulo = 'Disponibilidad';
                    $this->_view->renderizar('disponible', 'default');
                }
            }
        } else {
            $this->gestion();
        }
    }

    public function guardar() {
        $data = $this->loadModel('agenda');
        $cont = $data->guardar();
        if ($cont > 0) {
            echo "<script>alert('Cita Guardada')</script>";
            $this->gestion();
        } else {
            echo "<script>alert('No se puedo Guardar la Cita o ya esta Registrada, verifique e intentelo de nuevo')</script>";
            $this->gestion();
        }
    }

}
