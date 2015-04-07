<?php

class parametrosController extends Controller {

    public function __construct() {
        parent::__construct("sigac", "parametros");
    }

    public function index() {
        $this->_view->titulo = 'SIGAC - Gestion Academica';
        $this->_view->renderizar('inicio', 'sigac');
    }

    public function trimestre() {
        $this->_view->titulo = 'Trimestres Academicos';
        $data = $this->loadModel('sigac', 'parametros');
        $this->_view->trimestres = $data->listtrimestre();
        $this->_view->renderizar('trimestre', 'sigac');
    }

    public function viewtrimestre($argum = false) {

        $this->_view->titulo = 'Trimestres Academicos';
        $this->_view->titulopanel = 'Agregar Trimestre Academico';
        if ($argum != "") {
            $data = $this->loadModel('sigac', 'parametros');
            $this->_view->untrimestre = $data->onetrimestre($argum);
            $this->_view->titulopanel = 'Modificar Trimestre Academico';
        } else {
            $this->_view->untrimestre = array(5);
        }
        $this->_view->renderizar('viewtrimestre', 'blank');
    }

    public function savetrimestre() {
        if ($_POST) {
            $id = $_POST['txtId'];
        } else {
            $id = '';
        }
        $dbtrim = $this->loadModel('sigac', 'parametros');
        $count = $dbtrim->edittrimestre();
        if ($count > 0) {
            $_SESSION['mensaje'] = 'Registro Guardado';
            $_SESSION['tipomensaje'] = 'alert-success';
        } else {
            $_SESSION['mensaje'] = 'El Registro NO fue Guardado, Intente de Nuevo';
            $_SESSION['tipomensaje'] = 'alert-danger';
        }
        header('Location: trimestre');
        exit();
    }

    public function deltrimestre($argum = false) {
        if ($argum == false) {
            $_SESSION['mensaje'] = 'No hay Registro a Eliminar';
            $_SESSION['tipomensaje'] = 'alert-info';
            header('Location: trimestre');
            exit();
        } else {
            $dbtrim = $this->loadModel('sigac', 'parametros');
            $count = $dbtrim->deletetrimestre($argum);
            if ($count > 0) {
                $_SESSION['mensaje'] = 'Registro Eliminado';
                $_SESSION['tipomensaje'] = 'alert-warning';
            } else {
                $_SESSION['mensaje'] = 'El Registro NO fue Eliminado, Intente de Nuevo';
                $_SESSION['tipomensaje'] = 'alert-danger';
            }
            header('Location: ../trimestre');
            exit();
        }
    }

    public function redesylineas() {
        $this->_view->titulo = 'Redes y Lineas Tecnológicas';
        $data = $this->loadModel('sigac', 'parametros');
        $this->_view->redeslineas = $data->listredeslineas();
        $this->_view->renderizar('redesylineas', 'sigac');
    }

    public function viewredeslineas($argum = false) {

        $this->_view->titulo = 'Redes y Lineas Tecnológicas';
        $this->_view->titulopanel = 'Agregar Redes y Lineas Tecnológica';
        if ($argum != "") {
            $data = $this->loadModel('sigac', 'parametros');
            $this->_view->unred = $data->onered($argum);
            $this->_view->linea = $data->lineas($argum);
            $this->_view->titulopanel = 'Modificar Redes y Lineas Tecnológica';
        } else {
            $this->_view->unred = array(5);
        }
        $this->_view->renderizar('viewredesylineas', 'sigac');
    }

}
