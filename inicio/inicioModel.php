<?php

class inicioModel extends Model
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
    function consolidar(){
        $data = $this->_db->query("SELECT categorias.Id, categorias.Nombre, COUNT(pesos) AS cantidad, SUM(pesos) AS valor FROM categorias LEFT JOIN NEGOCIO ON categorias.Id=negocio.categoria
GROUP BY categorias.Id");
        return $data->fetchall();
    }

}


?>
