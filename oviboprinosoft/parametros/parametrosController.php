<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("oviboprinosoft", "parametros");
    }

    public function index() {
        $this->_view->titulo = 'OVIBOPRINOSOFT - Pagina de Inicio';
        $this->_view->renderizar('inicio', 'oviboprinosoft');
    }

    public function registroanimal() {
        $this->_view->titulo = 'Hoja De Vida Animal';
        $data = $this->loadModel('oviboprinosoft', 'parametros');
        //$this->_view->trimestres = $data->listtrimestre();
        $this->_view->renderizar('registroanimal', 'oviboprinosoft');
    }

    public function viewregistroanimal($argum = false) {

        $this->_view->titulo = 'Hoja De Vida Animal';
        $this->_view->titulopanel = 'Agregar Registro De Un Animal';
        if ($argum != "") {
            $data = $this->loadModel('oviboprinosoft', 'parametros');
            $this->_view->untrimestre = $data->onetrimestre($argum);
            $this->_view->titulopanel = 'Modificar Hoja de Vida Animal';
        }else
        {
            $this->_view->untrimestre = array(5);
        }
        $this->_view->renderizar('viewregistroanimal', 'oviboprinosoft');
    }

   public function savetrimestre() {
        if ($_POST) {
            $id = $_POST['txtId'];
        } else {
            $id = '';
        }
        $dbtrim = $this->loadModel('oviboprinosoft', 'parametros');
        $count = $dbtrim->edittrimestre();
        if ($count > 0) {
            echo "<script>alert('Registro Guardado')</script>";
            $this->trimestre();
        } else {
            echo "<script>alert('El Registro NO fue Guardado, Intente de Nuevo')</script>";
            $this->viewtrimestre($id);
        }
    }

    public function deltrimestre($argum = false) {
        if ($argum == false) {
            echo "<script>alert('No hay registro a Eliminar')</script>";
            $this->trimestre();
        } else {
            $dbtrim = $this->loadModel('oviboprinosoft', 'parametros');
            $count = $dbtrim->deletetrimestre($argum);
            if ($count > 0) {
                echo "<script>alert('Registro Eliminado')</script>";
                $this->trimestre();
            } else {
                echo "<script>alert('El Registro NO fue Eliminado, Intente de Nuevo')</script>";
                $this->viewtrimestre($id);
            }
        }
    }

}
