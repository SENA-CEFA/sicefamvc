<?php

class procesosModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        
    }

    function set($arg = false) {
        
    }

    function fecha($arg = false) {
        $sql = $this->_db->query("SELECT Id,Fecha FROM turnos");
        return $sql->fetchall();
    }
    function titulaciones($arg = false) {
        $sql = $this->_db->query("SELECT Id, Nombre AS nomtitulaciones,Ficha AS fichatitulaciones FROM titulaciones ");
        return $sql->fetchall();
    }
    function turnos($arg = false) {
        $sql = $this->_db->query("SELECT Id,Nombre FROM tipo_turno");
        return $sql->fetchall();
    }
    function areas($arg = false) {
        $sql = $this->_db->query("SELECT Id,Nombre FROM areas");
        return $sql->fetchall();
    }

    function get($arg = false) {
        if (isset($_POST['cmbTitulacion'])) {
            $ficha = $_POST['cmbTitulacion'];
        } else {
            $ficha = 0;
        }
        $sql = $this->_db->query("SELECT usuarios.Id AS Id,titulaciones.Nombre AS Nomtitu,usuarios.Identificacion AS ideapren,usuarios.Nombre AS Nomapren FROM titulaciones INNER JOIN usuarios ON usuarios.Titulacion=titulaciones.id WHERE usuarios.Titulacion=" . $ficha);
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
        $sql = $this->_db->query("SELECT  usuarios.Nombre AS nombreaprendiz FROM usuarios INNER JOIN turnos ON usuarios.Id=turnos.IdAprendiz WHERE turnos.Area='" . $area ."' AND turnos.Fecha='" . $fecha ."' AND turnos.Estado='A'");
        return $sql->fetchall();
    }
    function guardarturno($arg = false){
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
            $count = $this->_db->exec("INSERT INTO turnos (IdAprendiz,Fecha, TipoTurno, Area, Estado) VALUES ('" . $_POST['txtId'] . "','" . $_POST['txtFecha1'] . "', '" . $tipoturno . "','" . $area . "', 'A')");
            return $count;
        } else {
            return 0;
        }
    }
}

?>
