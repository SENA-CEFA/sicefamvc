<?php

class padrinoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        if ($arg) {
            $count = $this->_db->exec("DELETE FROM padrino where Documento=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function edit($arg = false) {
        if ($_POST && $arg) {
            $count = $this->_db->exec("UPDATE padrino SET Nombre='" . $_POST['txtNombre'] . "', Telefono='" . $_POST['txtTelefono'] . "', Correo='" . $_POST['txtCorreo'] ."' WHERE Documento=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function get($arg = false) {
        $sql = $this->_db->query("SELECT Documento,Nombre,Telefono,Correo FROM padrino WHERE Documento=" . $arg);
        return $sql->fetchall();
    }

    function set() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO padrino (Documento,Nombre,Telefono,Correo) VALUES ('" . $_POST['txtDocumento'] . "', '" . $_POST['txtNombre'] . "', '" . $_POST['txtTelefono'] . "', '" . $_POST['txtCorreo'] . "')");
            return $count;
        } else {
            return 0;
        }
    }

    function lista() {
        $data = $this->_db->query("SELECT Documento,Nombre,Telefono,Correo FROM padrino");
        return $data->fetchall();
    }


    public function buscardocumento() {
        $sql = $this->_db->query("SELECT Documento from padrino where Documento like '%".$_POST['txtDocumento']."%'");
        return $sql->fetchall();
    }

}
