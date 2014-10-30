<?php

class parametrosModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        if ($_POST) {
            $horainiM = $_POST['txtInicioMH'] . ":" . $_POST['txtInicioMM'] . ":00";
            $horainiT = $_POST['txtInicioTH'] . ":" . $_POST['txtInicioTM'] . ":00";
            $this->_db->exec("TRUNCATE TABLE Horas");
            $newhora = $horainiM;
            for ($i = 0; $i < $_POST['txtCitasM']; $i++) {
                $this->_db->exec("INSERT INTO Horas SET Hora='" . $newhora . "'");
                $newhora = $this->calhora($newhora, $_POST['txtMinutos']);
            }
            $newhora = $horainiT;
            for ($i = 0; $i < $_POST['txtCitasT']; $i++) {
                $this->_db->exec("INSERT INTO Horas SET Hora='" . $newhora . "'");
                $newhora = $this->calhora($newhora, $_POST['txtMinutos']);
            }
            $count = $this->_db->exec("UPDATE parametros SET Mesas = '" . $_POST['txtMesas'] . "', Minutos = '" . $_POST['txtMinutos'] . "', InicioM = '" . $horainiM . "', CitasM = '" . $_POST['txtCitasM'] . "', InicioT = '" . $horainiT . "', CitasT = '" . $_POST['txtCitasT'] . "', Cols='" . $_POST['cmbCols'] . "' WHERE Id=1");
            return $count;
        } else {
            return 0;
        }
    }

    function calhora($hora, $min) {
        return date('H:i:s', strtotime($hora) + $min * 60);
    }

    function get($arg = false) {
        $data = $this->_db->query("SELECT Id, Mesas, Minutos, DATE_FORMAT(InicioM,'%H') AS InicioMH, DATE_FORMAT(InicioM,'%i') AS InicioMM, CitasM, DATE_FORMAT(InicioT,'%H') AS InicioTH, DATE_FORMAT(InicioT,'%i') AS InicioTM, CitasT, Cols FROM parametros where Id=1");
        return $data->fetchall();
    }

    function horas() {
        $data = $this->_db->query("SELECT Id, DATE_FORMAT(Hora,'%H:%i') AS Hora FROM horas");
        return $data->fetchall();
    }

    function set() {
        
    }

}

?>
