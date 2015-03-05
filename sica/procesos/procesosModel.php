<?php

class procesosModel extends Model {

    public function __construct() {
        parent::__construct();
    }
function titulaciones($arg = false) {
        $sql = $this->_db->query("SELECT tnesFicha, pmasNombre FROM titulaciones INNER JOIN programas ON titulaciones.tnesIdPrograma=programas.pmasId");
        return $sql->fetchall();
    }
    function turnos($arg = false) {
        $sql = $this->_db->query("SELECT trnoId,trnoNombre FROM tipo_turno");
        return $sql->fetchall();
    }
    function areas($arg = false) {
        $sql = $this->_db->query("SELECT uvasId,uvasNombre FROM unidadesproductivas");
        return $sql->fetchall();
    }

    function get($arg = false) {
        $sql = $this->_db->query("SELECT programas.pmasNombre,personalemprecefa.pefaId, datopersonales.dlesId,datopersonales.dlesNombre,datopersonales.dlesDocumento FROM datopersonales INNER JOIN vinculaciones   ON vinculaciones.vnesIdDatoPers=datopersonales.dlesId INNER JOIN aprendices ON vinculaciones.vnesId=aprendices.acesIdvinculacion INNER JOIN titulaciones ON titulaciones.tnesFicha=aprendices.acesIdFicha INNER JOIN programas ON titulaciones.tnesIdPrograma=programas.pmasId INNER JOIN personalemprecefa ON personalemprecefa.pefaIdVinculacion=vinculaciones.vnesId WHERE titulaciones.tnesFicha=". $arg);
        return $sql->fetchall();
    }
function asistencia($arg = false) {
        if (isset($_POST['cmbarea'])) {
            $area = $_POST['cmbarea'];
        } else {
            $area = 0;
        }
        if (isset($_POST['cmbfecha'])) {
            $fecha = $_POST['cmbfecha'];
        } else {
            $fecha = 0;
        }
        $sql = $this->_db->query("SELECT datopersonales.dlesNombre FROM datopersonales INNER JOIN vinculaciones ON vinculaciones.vnesIdDatoPers=datopersonales.dlesId INNER JOIN personalemprecefa ON personalemprecefa.pefaIdVinculacion=vinculaciones.vnesId INNER JOIN turnos ON turnos.tnosId=personalemprecefa.pefaId WHERE turnos.tnosIdUnidProd='" . $area ."' AND turnos.tnosFecha='" . $fecha ."' AND turnos.tnosEstado='A'");
        return $sql->fetchall();
    }
    function guardarturno(){
        if (isset($_POST['cmbTipoTurno'])) {
            $tipoturno = $_POST['cmbTipoTurno'];
        } else {
            $tipoturno = 0;
        }
        if (isset($_POST['cmbTipoUnidad'])) {
            $area = $_POST['cmbTipoUnidad'];
        } else {
            $area = 0;
        }
        
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO turnos (tnosIdPersoEmpre,tnosFecha, tnosIdTipoTurno, tnosIdUnidProd, tnosEstado) VALUES ('" . $_POST['txtId'] . "','" . $_POST['txtFecha1'] . "', '" . $tipoturno . "','" . $area . "', 'A')");
            return $count;
        } else {
            return 0;
        }
    }
}

?>
