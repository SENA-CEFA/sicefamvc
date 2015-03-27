<?php
class sesionModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function get() {
        //$data = $this->_db->query("select * from directorio");
        //return $data->fetchall();   
        $sql = $this->_db->prepare("SELECT uiosIdVinculacion, CONCAT(dlesNombre,' ',dlesPrimerApellido) AS Nombre, uiosIdRol FROM usuarios 
INNER JOIN vinculaciones ON uiosIdVinculacion=vnesId
INNER JOIN datopersonales ON vnesIdDatoPers=dlesDocumento 
WHERE vnesEstado='A' AND uiosEstado='A' AND uiosNombreUsuario= ? AND uiosPassword= ?");
        $sql->execute(array($_POST['txtUsuario'], $_POST['txtPass']));
        $rs = $sql->fetchall();
        if (isset($rs) && count($rs)) {
            $_SESSION['autentificado'] = 'Si';
            $_SESSION['perfil'] = 'admin';
            $_SESSION['documento'] = $rs[0]['uiosIdVinculacion'];
            $_SESSION['usuario'] =  ucwords(strtolower($rs[0]['Nombre']));
        } else {
            $_SESSION['autentificado'] = 'No';
            $_SESSION['perfil'] = '';
            $_SESSION['documento'] = '';
            $_SESSION['usuario'] = '';
        }
    }

}

?>
