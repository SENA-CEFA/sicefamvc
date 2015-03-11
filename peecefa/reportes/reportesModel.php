<?php

class reportesModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function listtrimestre() {
        $sql = $this->_db->query("SELECT tresId, tresNombre, tresAnual, tresFechaInicio, tresFechaFin FROM trimestres WHERE tresEstado='A'");
        return $sql->fetchall();
    }

    function onetrimestre($arg = false) {
        $sql = $this->_db->query("SELECT tresId, tresNombre, tresAnual, tresFechaInicio, tresFechaFin FROM trimestres WHERE tresEstado='A' AND tresId=" . $arg);
        return $sql->fetchall();
    }

    function edittrimestre() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO registro (numeroinventario,tipoequipoelemento,marca,caracteristicas,fecharegistro,estado)"
                    . "VALUES ('" . $_POST['txtNombreTipo'] . "', '" . $_POST['txtNombreTipo1'] . "', '" . $_POST['txtNombreTipo2'] . "', '" .  $_POST['txtNombreTipo3'] . "', '" .  $_POST['txtFecha'] . "', '" . $_POST['txtNombreTipo4'] . "');
                        ON DUPLICATE KEY UPDATE 
                       tresNombre = '" . $_POST['txtNombreTipo'] . "' , tresAnual = '" . $_POST['txtAnual'] . "' , tresFechaInicio = '" . $_POST['txtFecha1'] . "' , tresFechaFin = '" . $_POST['txtFecha2'] . "' ;");
            return $count;
        } else {
            return 0;
        }
    }

    function deletetrimestre($arg = false) {
        if ($arg != false) {
            $count = $this->_db->exec("UPDATE trimestres SET "
                    . "tresEstado = 'I' WHERE tresId = '".$arg."' ;");
            return $count;
        } else {
            return 0;
        }
    }

}

?>
