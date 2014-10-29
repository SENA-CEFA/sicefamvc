<?php

class agendaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        
    }

    function get($arg = false) {
    
    }

    function set($arg = false) {
        
    }
    function cprogramada(){
        $sql = $this->_db->query("SELECT Id FROM cita");
        $num = $sql->fetchall();
        return count($num);        
    }
    function cfinalizada(){
        $sql = $this->_db->query("SELECT Id FROM cita WHERE Estado='F'");
        $num = $sql->fetchall();
        return count($num);        
    }

}


?>
