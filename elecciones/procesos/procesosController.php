<?php

class procesosController extends Controller {

    public function __construct() {
        parent::__construct("elecciones", "procesos");
    }

    public function index() {
        $this->_view->titulo = 'Como ELegir';
        $this->_view->renderizar('habilita', 'elecciones');
    }

    public function habilitar() {
        $this->_view->titulo = 'Habilitar Aprendiz para Votar';
        $this->_view->renderizar('habilita', 'elecciones');
    }

    public function sethabilita() {
        $elec = $this->loadModel('elecciones', 'procesos');
        $jurado = $elec->onejurado();
        if (count($jurado) > 0) {
            $verifica = $elec->conshabilita($elec->eleactivo());
            if (count($verifica) > 0) {
                if ($verifica[0]['vtesEstado'] == 'A') {
                    echo "<script>alert('El Aprendiz ya se encuentra habilitado para votar')</script>";
                } else {
                    echo "<script>alert('El Aprendiz ya realizo el proceso de votación')</script>";
                }
            } else {
                $count = $elec->habilita($elec->eleactivo());
                if ($count > 0) {
                    echo "<script>alert('Registro Exitoso, Aprendiz Habilitado para votar')</script>";
                } else {
                    echo "<script>alert('El Registro NO fue Guardado, Intente de Nuevo')</script>";
                }
            }
        } else {
            echo "<script>alert('La clave de Jurado NO es válida, vuelva a intentarlo.')</script>";
        }
        $this->_view->titulo = 'Habilitar Aprendiz para Votar';
        $this->_view->renderizar('habilita', 'elecciones');
    }

    public function votar() {
        $this->_view->titulo = 'Validar Documento';
        $this->_view->renderizar('votar', 'elecciones');
    }

    public function tarjeton() {
        $_SESSION['vota'] = '';
        if ($_POST) {
            $elec = $this->loadModel('elecciones', 'procesos');
            $verifica = $elec->consverifica();
            if (count($verifica) > 0) {
                if ($verifica[0]['vtesEstado'] == 'A') {
                    //validar fecha
                    $fechaGuardada = $verifica[0]['enesFechHoraFin'];
                    $ahora = date("Y-n-j H:i:s");
                    $tiempo_transcurrido = (strtotime($ahora) - strtotime($fechaGuardada));
                    if ($tiempo_transcurrido > 0) {
                        echo "<script> alert('La Votacion ha terminado, no podemos registrar su voto')</script>";
                        $this->_view->titulo = 'Validar Documento';
                        $this->_view->renderizar('votar', 'elecciones');
                    } else {
                        $_SESSION['vota'] = $verifica[0]['vnesId'];
                        $candi = $elec->candidatos();
                        $this->_view->candidatos = $candi;
                        $this->_view->titulo = 'Tarjeta Electoral';
                        $this->_view->titulopanel = 'Tarjeta Electoral';
                        $this->_view->renderizar('tarjeton', 'elecciones');
                    }
                } else {
                    echo "<script>alert('El Aprendiz ya realizo el proceso de votación')</script>";
                    $this->_view->titulo = 'Validar Documento';
                    $this->_view->renderizar('votar', 'elecciones');
                }
            } else {
                echo "<script>alert('El Aprendiz no ha sido habilitado para votar')</script>";
                $this->_view->titulo = 'Validar Documento';
                $this->_view->renderizar('votar', 'elecciones');
            }
        } else {
            echo "<script>alert('Esta ingresando de manera indebida, por favor valide su Documento')</script>";
            $this->_view->titulo = 'Validar Documento';
            $this->_view->renderizar('votar', 'elecciones');
        }
    }

    public function registravoto($argum = false) {
        if ($_SESSION['vota'] <> '') {
            $elec = $this->loadModel('elecciones', 'procesos');
            $id1 = $argum;
            $id2 = $elec->eleactivo();
            $count2 = $elec->actvotante(array($_SESSION['vota'], $id2));
            $count1 = $elec->registravoto(array($id1, $id2));
            if ($count1 > 0 && $count2>0) {
                echo "<script>alert('Voto Exitoso')</script>";
            } else {
                echo "<script>alert('El Voto NO fue Guardado, Intente de Nuevo')</script>";
            }
            $_SESSION['vota'] = '';
        } else {
            echo "<script>alert('Esta ingresando de manera indebida, por favor valide su Documento')</script>";
        }
        $this->_view->titulo = 'Validar Documento';
        $this->_view->renderizar('votar', 'elecciones');
    }

    public function buscapersona($argum = false) {
        $data = $this->loadModel('sgth', 'procesos');
        $this->_view->datospersona = $data->onevinculado($argum);
        if (count($this->_view->datospersona) > 0) {
            $this->_view->encuentra = '1';
        } else {
            $this->_view->datospersona = array(25);
            $this->_view->encuentra = '0';
        }
        $this->_view->renderizar('conspersona', 'blank');
    }

}
