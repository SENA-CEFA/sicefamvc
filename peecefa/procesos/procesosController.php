<?php //

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("pee-cefa", "procesos");
    }

    public function index() {
        $this->_view->titulo = 'SIGAC - Gestion Academica';
        $this->_view->renderizar('inicio', 'pee-cefa');
    }
    
    public function buscapersona($argum = false){
        $this->_view->id = $argum;
        $data = $this->loadModel('pee-cefa', 'procesos');
         $this->_view->info = $data->marca($argum);
        $this->_view->renderizar('informacionequipo', 'blank');

    }

    public function trimestre() {
        $this->_view->titulo = 'Trimestres Academicos';
        $data = $this->loadModel('pee-cefa', 'procesos');
        $this->_view->trimestres = $data->listtrimestre();
        $this->_view->renderizar('trimestre', 'pee-cefa');
    }

    public function viewtrimestre($argum = false) {

        $this->_view->titulo = 'Trimestres Academicos';
        $this->_view->titulopanel = 'Agregar Trimestre Academico';
        if ($argum != "") {
            $data = $this->loadModel('pee-cefa', 'procesos');
            $this->_view->untrimestre = $data->onetrimestre($argum);
            $this->_view->titulopanel = 'Modificar Trimestre Academico';
        }else
        {
            $this->_view->untrimestre = array(5);
        }
        $this->_view->renderizar('viewtrimestre', 'pee-cefa');
    }

    public function savetrimestre() {
        if ($_POST) {
            $id = $_POST['txtId'];
        } else {
            $id = '';
        }
        $dbtrim = $this->loadModel('sigac', 'procesos');
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
            $dbtrim = $this->loadModel('pee-cefa', 'procesos');
            $count = $dbtrim->deletetrimestre($argum);
            if ($count > 0) {
                echo "<script>alert('Registro Eliminado')</script>";
            } else {
                echo "<script>alert('El Registro NO fue Eliminado, Intente de Nuevo')</script>";
            }
            $this->trimestre();
        }
    }
    
    
     
    
    public function prestamo(){
        $this->_view->titulo = 'Registrar Prestamo ';
        $this->_view->renderizar('prestamo', 'pee-cefa');
    }
        public function recibido(){
        $this->_view->titulo = 'Registrar Recibido';
        $this->_view->renderizar('recibido', 'pee-cefa');
    }
     public function sanciones(){
        $this->_view->titulo = 'Registrar Sanciones';
        $this->_view->renderizar('sanciones', 'pee-cefa');
    }
    
    
    
}



