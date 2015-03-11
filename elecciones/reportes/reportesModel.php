<?php

class reportesModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function votantes() {
        $sql = $this->_db->query("SELECT  tnesFicha, pmasNombre, COUNT(tnesFicha) AS cantidad FROM votantes INNER JOIN vinculaciones ON vtesIdVinculacion=vnesId
INNER JOIN aprendices ON vnesId=acesIdVinculacion
INNER JOIN titulaciones ON acesIdFicha=tnesFicha
INNER JOIN programas ON tnesIdPrograma=pmasId GROUP BY tnesficha");
        return $sql->fetchall();
    }
    
    public function votos(){
        $sql = $this->_db->query("SELECT IFNULL(CONCAT(dlesNombre,' ',dlesPrimerApellido,' ',dlesSegundoApellido),'VOTO EN BLANCO') AS Nombre, COUNT(vtosIdCandidato) AS Cantidad 
FROM votos 
LEFT JOIN candidatos ON  vtosIdCandidato=catoId
LEFT JOIN vinculaciones ON catoIdVinculacion=vnesId
LEFT JOIN datopersonales ON vnesIdDatoPers=dlesDocumento
GROUP BY dlesDocumento ORDER BY Cantidad DESC");
        return $sql->fetchall();
       
    }
    
    public function votostotal(){
         $sql = $this->_db->query("SELECT COUNT(vtosId) AS cantidad FROM votos");
        return $sql->fetchall();
    }

}

?>
