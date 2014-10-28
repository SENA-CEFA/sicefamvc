<?php

class empresaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        if ($arg) {
            $count = $this->_db->exec("DELETE FROM empresa where Nit=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function edit($arg = false) {
        if ($_POST && $arg) {
            $count = $this->_db->exec("UPDATE empresa SET Nombre='" . $_POST['txtNombre'] . "', NombreRepLeg='" . $_POST['txtNombreRepLeg'] . "', Departamento='" . $_POST['txtDepartamento'] ."' WHERE Nit=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function get($arg = false) {
        $sql = $this->_db->query("SELECT Nit,Nombre,NombreRepLeg,Departamento,SectorEconomico FROM empresa WHERE Nit=" . $arg);
        return $sql->fetchall();
    }

    function set() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO empresa (Nit,Nombre,NombreRepLeg,Departamento,SectorEconomico) VALUES ('" . $_POST['txtNit'] . "', '" . $_POST['txtNombre'] . "', '" . $_POST['txtNombreRepLeg'] . "', '" . $_POST['cmbDepartamento'] . "', '" . $_POST['cmbSectorEconomico'] . "')");
            return $count;
        } else {
            return 0;
        }
    }

    function lista() {
        $data = $this->_db->query("SELECT Nit,Nombre,NombreRepLeg,Departamento,SectorEconomico FROM empresa");
        return $data->fetchall();
    }


    public function buscardocumento() {
        $sql = $this->_db->query("SELECT Nit FROM empresa where Nit LIKE '%".$_POST['txtNit']."%'");
        return $sql->fetchall();
    }

}


?>
