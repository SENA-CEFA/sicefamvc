<?php

class inventarioModel extends Model {

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
            $count = $this->_db->exec("INSERT INTO trimestres (tresId, tresNombre, tresAnual, tresFechaInicio, tresFechaFin, tresEstado)"
                    . "VALUES ('" . $_POST['txtId'] . "', '" . $_POST['txtNombreTipo'] . "', '" . $_POST['txtAnual'] . "', '" . $_POST['txtFecha1'] . "', '" . $_POST['txtFecha2'] . "', 'A')
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
