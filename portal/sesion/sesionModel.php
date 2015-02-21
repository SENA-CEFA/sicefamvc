<?php
class sesionModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function get($arg=false) {
        //$data = $this->_db->query("select * from directorio");
        //return $data->fetchall();   
        $sql = $this->_db->prepare('select Id_Usuario, Nombre from usuarios where Usuario= ? and Clave= ?');
        $sql->execute(array($_POST['txtEmail'], MD5($_POST['txtPass'])));
        $rs = $sql->fetchall();
        if (isset($rs) && count($rs)) {
            $_SESSION['autentificado'] = 'Si';
            $_SESSION['perfil'] = 'admin';
            $_SESSION['documento'] = $rs[0]['Id_Usuario'];
            $_SESSION['usuario'] = $rs[0]['Nombre'];
        } else {
            $_SESSION['autentificado'] = 'No';
            $_SESSION['perfil'] = '';
            $_SESSION['documento'] = '';
            $_SESSION['usuario'] = '';
        }
    }

}

?>
