<?php

class procesosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
   
    
    function onepersona($arg = false){
         $sql = $this->_db->query("SELECT dlesDocumento, dlesTipoIdentificacion, dlesFechExpeDocu, dlesMuniExpeDocu, dlesNombre, 
	dlesPrimerApellido, dlesSegundoApellido, dlesFechaNacimiento, dlesMunicipioNacimiento, dlesTipoSangre, dlesGenero, dlesEps, 
	dlesEstadoCivil, dlesLibretaMilitar, dlesEstrato, dlesDireccion, dlesMunicipioDireccion, dlesTelefono1, dlesTelefono2, 
	dlesTelefono3, dlesCorreoMiSena, dlesCorreoInstitucional, dlesCorreoAlternativo, dlesSitioWeb FROM datopersonales WHERE dlesDocumento=" . $arg);
        return $sql->fetchall();
    }
}


?>
