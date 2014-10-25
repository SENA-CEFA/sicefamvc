<?php

class padrinoModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        if ($arg) {
            $count = $this->_db->exec("DELETE FROM eventos where IdEvento=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function edit($arg = false) {
        if ($_POST && $arg) {
            $count = $this->_db->exec("UPDATE eventos SET Nombre='" . $_POST['txtNombre'] . "', TipoEvento='" . $_POST['cmbTipo'] . "', FInicio='" . $_POST['txtFechaI'] . "', FFin='" . $_POST['txtFechaF'] . "', Lugar='" . $_POST['txtLugar'] . "', IdEncargado='" . $_POST['cmbAdmin'] . "', CantMaxiAsis='" . $_POST['txtMax'] . "',CantMiniAsis='" . $_POST['txtMin'] . "', Descripcion='" . $_POST['txaDescripcion'] . "'   WHERE IdEvento=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function get($arg = false) {
        echo "SELECT IdEvento,Nombre,TipoEvento,DATE_FORMAT(FInicio,'%Y-%m-%d %H:%m:%s') AS FInicio,DATE_FORMAT(FFin,'%Y-%m-%d %H:%m:%s') AS FFin,Lugar,CONCAT(Nombres,' ',Apellidos) AS NombreE,IdEncargado,CantMaxiAsis,CantMiniAsis,Descripcion "
                . "FROM eventos INNER JOIN encargados ON eventos.IdEncargado=encargados.Documento WHERE IdEvento=" . $arg;
        $sql = $this->_db->query("SELECT IdEvento,Nombre,TipoEvento,DATE_FORMAT(FInicio,'%Y-%m-%d %H:%m:%s') AS FInicio,DATE_FORMAT(FFin,'%Y-%m-%d %H:%m:%s') AS FFin,Lugar,CONCAT(Nombres,' ',Apellidos) AS NombreE,IdEncargado,CantMaxiAsis,CantMiniAsis,Descripcion "
                . "FROM eventos INNER JOIN encargados ON eventos.IdEncargado=encargados.Documento WHERE IdEvento=" . $arg);
        return $sql->fetchall();
    }

    function set() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO eventos (Nombre, TipoEvento, FInicio, FFin, Lugar, IdEncargado, CantMaxiAsis, CantMiniAsis, Descripcion) VALUES ('" . $_POST['txtNombre'] . "', '" . $_POST['cmbTipo'] . "', '" . $_POST['txtFechaI'] . "', '" . $_POST['txtFechaF'] . "', '" . $_POST['txtLugar'] . "', '" . $_POST['cmbAdmin'] . "', '" . $_POST['txtMax'] . "', '" . $_POST['txtMin'] . "', '" . $_POST['txaDescripcion'] . "')");
            return $count;
        } else {
            return 0;
        }
    }

    function lista() {
        $data = $this->_db->query("SELECT IdEvento,Nombre,TipoEvento,DATE_FORMAT(FInicio,'%Y-%m-%d %H:%m:%s') AS FInicio,DATE_FORMAT(FFin,'%Y-%m-%d %H:%m:%s') AS FFin,Lugar FROM eventos");
        return $data->fetchall();
    }

    function getadmin() {
        $sql = $this->_db->query("SELECT Documento,CONCAT(Nombres,' ',Apellidos) AS NombreE FROM encargados");
        return $sql->fetchall();
    }

    public function buscarnombre() {
        $sql = $this->_db->query("SELECT IdEvento from eventos where Nombre like '%".$_POST['txtNombre']."%'");
        return $sql->fetchall();
    }

}
