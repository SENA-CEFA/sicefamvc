<?php

class procesosModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function onejurado($arg = false) {
        if ($_POST) {
            $sql = $this->_db->query("SELECT jdosId, jdosIdEleccion FROM jurados INNER JOIN elecciones ON jurados.`jdosIdEleccion`=elecciones.`enesId` WHERE enesEstado='A' AND jdosIdVinculacion='1' AND jdosContrasena='" . $_POST['txtPassword'] . "'");
            return $sql->fetchall();
        }
    }

    function conshabilita($arg = false) {
        if ($_POST) {
            $sql = $this->_db->query("SELECT vtesEstado FROM votantes WHERE vtesIdVinculacion='" . $_POST['txtId'] . "' and vtesIdEleccion='" . $arg . "'");
            return $sql->fetchall();
        }
        return 0;
    }

    function consverifica() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT vnesId, vtesEstado, enesFechHoraFin FROM vinculaciones INNER JOIN votantes ON vtesIdVinculacion=vnesId INNER JOIN elecciones ON vtesIdEleccion=enesId WHERE vnesIdDatoPers='" . $_POST['txtDocumento'] . "' and enesEstado='A'");
            return $sql->fetchall();
        }
        return 0;
    }

    function habilita($arg = false) {
        $count = $this->_db->exec("INSERT INTO votantes (vtesIdVinculacion, vtesIdJurado, vtesEstado, vtesFechaHora, vtesIdEleccion)"
                . "VALUES ('" . $_POST['txtId'] . "', '1', 'A', NOW(), '" . $arg . "') ;");
        return $count;
    }

    function candidatos() {
        if ($_POST) {
            $sql = $this->_db->query("SELECT catoId, CONCAT(dlesNombre,' ',dlesPrimerApellido,' ', dlesSegundoApellido) AS Nombre, catoNumero, catoImagen, pmasNombre 
FROM elecciones 
INNER JOIN candidatos ON enesId=catoIdEleccion INNER JOIN vinculaciones ON catoIdvinculacion=vnesId
INNER JOIN datopersonales ON vnesIdDatoPers=dlesDocumento INNER JOIN aprendices ON vnesId=acesIdVinculacion
INNER JOIN titulaciones ON acesIdFicha=tnesFicha INNER JOIN programas ON tnesIdPrograma=pmasId
WHERE enesEstado='A'");
            return $sql->fetchall();
        }
        return 0;
    }

    function eleactivo() {
        $sql = $this->_db->query("SELECT enesId FROM elecciones WHERE enesEstado='A'");
        $res = $sql->fetchall();
        return $res[0]['enesId'];
    }

    function registravoto($args) {
            $count = $this->_db->exec("INSERT INTO votos (vtosIdCandidato, vtosFechaHora, vtosIdEleccion)"
                    . "VALUES ('" . $args[0] . "', NOW(), '" . $args[1] . "') ;");
            return $count;
    }

    function actvotante($args) {
           $count = $this->_db->exec("UPDATE votantes SET vtesEstado = 'I' WHERE vtesIdVinculacion='".$args[0]."' AND vtesIdEleccion='".$args[1]."'");
            return $count;
    }
}

?>
