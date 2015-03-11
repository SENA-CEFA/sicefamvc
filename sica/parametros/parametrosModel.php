<?php

class parametrosModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function listtturno() {
        $sql = $this->_db->query("SELECT trnoId, trnoNombre FROM trimestres WHERE trnoEstado='A'");
        return $sql->fetchall();
    }

    function oneturno($arg = false) {
        $sql = $this->_db->query("SELECT trnoId, trnoNombre, FROM trimestres WHERE tresEstado='A' AND trnoId=" . $arg);
        return $sql->fetchall();
    }

    function editturno() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO turnos (trnoId, trnoNombre,trnoEstado)"
                    . "VALUES ('" . $_POST['txtId'] . "', '" . $_POST['txtNombreTipo'] . "', 'A')
                        ON DUPLICATE KEY UPDATE 
                        trnoNombre = '" . $_POST['txtNombreTipo'] . "' ;");
            return $count;
        } else {
            return 0;
        }
    }

    function deletetipoturno($arg = false) {
        if ($arg != false) {
            $count = $this->_db->exec("UPDATE turnos SET "
                    . "trnoEstado = 'I' WHERE trnoId = '".$arg."' ;");
            return $count;
        } else {
            return 0;
        }
    }

}

?>
