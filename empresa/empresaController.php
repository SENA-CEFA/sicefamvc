<?php

class empresaController extends Controller {

    public function __construct() {
        parent::__construct("empresa");
    }
    public function index() {
        $empresa = $this->loadModel('empresa');
        $this->_view->vende = $empresa->numvende();
        $this->_view->compra = $empresa->numcompra(); 
        $this->_view->intencion = $empresa->intencion();
        $this->_view->productos = $empresa->productos();
        $this->_view->titulo = 'Empresas';
        $this->_view->renderizar('repempresa', 'default');
    }
    public function gestion() {
        $data = $this->loadModel('empresa');
        $this->_view->datos = $data->lista();
        $this->_view->titulo = 'Lista Empresas';
        $this->_view->renderizar('empresa', 'default');
    }
    
    public function nuevo() {
        $data = $this->loadModel('empresa');
        $this->_view->titulo = 'Registro';
        $padrino = $this->loadModel('padrino');
        $this->_view->padrino = $padrino->lista();
        $this->_view->renderizar('nuevo', 'default');
    }
    public function guardar() {

        $negocio = $this->loadModel('empresa');
        $count = $negocio->guardaempresa();
        if ($count > 0) {
            echo "<script>alert('Registro Agregado')</script>";
            $this->gestion();
        } else {
            echo "<script>alert('No se puede Registrar su Empresa')</script>";
            $this->nuevo();
        }
    }
      public function ver($arg = false) {
        $data = $this->loadModel('empresa');
        $this->_view->datos = $data->traer($arg);
        $this->_view->id = $arg;
        $this->_view->titulo = 'Editar Registro Empresa';
        $this->_view->renderizar('editar', 'default');
    }

    public function modificar($arg = false) {

        $data = $this->loadModel('empresa');
        $cont = $data->edit1($arg);
        if ($cont > 0) {
            echo "<script>alert('Registro Modificado')</script>";
            $this->_view->titulo = 'Listado de Eventos';
            $this->gestion();
        } else {
            echo "<script>alert('No se puedo modificar, intentelo de nuevo')</script>";
            $this->_view->datos = $data->traer($arg);
            $padrino = $this->loadModel('padrino');
            $this->_view->padrino = $padrino->lista();
            $this->_view->id = $arg;
            $this->_view->titulo = 'Detalle De Empresa a Editar';
            $this->_view->renderizar('editar', 'default');
        }
    }

    public function asistentes() {
        $data = $this->loadModel('empresa');
        $this->_view->datos = $data->setA();
        $this->_view->datos = $data->listaAsis();
        $this->_view->titulo = 'Asistentes';
        $this->_view->renderizar('asistentes', 'default');
    }

    
    public function insertar() {
        $data = $this->loadModel('empresa');
        $this->_view->titulo = 'Confirmar registro';
        $this->_view->renderizar('confirmarreg', 'default');
    }
}
