<?php

class parametrosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        if ($_POST) {
            $count = $this->_db->exec("UPDATE parametros SET Mesas = '".$_POST['txtMesas']."', Minutos = '".$_POST['txtMinutos']."', InicioM = '".$_POST['txtInicioMH'].":".$_POST['txtInicioMM'].":00', CitasM = '".$_POST['txtCitasM']."', InicioT = '".$_POST['txtInicioTH'].":".$_POST['txtInicioTM'].":00', CitasT = '".$_POST['txtCitasT']."', Cols='".$_POST['cmbCols']."' WHERE Id=1");
            return $count;
        } else {
            return 0;
        }
    }

    function get($arg = false) {
        $data = $this->_db->query("SELECT Id, Mesas, Minutos,  DATE_FORMAT(InicioM,'%H') AS InicioMH, DATE_FORMAT(InicioM,'%i') AS InicioMM, CitasM, DATE_FORMAT(InicioT,'%H') AS InicioTH, DATE_FORMAT(InicioT,'%i') AS InicioTM, CitasT, Cols FROM parametros where Id=1");
        return $data->fetchall();
    }

    function set() {
            
    }
    

}


?>
