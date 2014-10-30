<?php

class agendaModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        if ($arg) {
            $count = $this->_db->exec("UPDATE cita SET Estado='Cancelada' where Id=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function edit($arg = false) {
        if ($_POST && $arg) {
            $count = $this->_db->exec("UPDATE cita SET  
	Mesa = '" . $_POST['cmbMesa'] . "' , 
	Comprador = '" . $_POST['cmbComprador'] . "' , 
	Vendedor = '" . $_POST['cmbVendedor'] . "' , 
	Hora = '" . $_POST['cmbHora'] . "' , 
	Estado = '" . $_POST['cmbEstado'] . "' WHERE Id=" . $arg);
            return $count;
        } else {
            return 0;
        }
    }

    function get($arg = false) {
        $mesa = '';
        $hora = '';
        $estado = '';
        $comprador = '';
        $vendedoor = '';
        $padrinocompra = '';
        $padrinovende = '';
        $id = '';

        if ($_POST) {
            if ($_POST['cmbMesa'] != '') {
                $mesa = " and cita.Mesa='" . $_POST['cmbMesa'] . "'";
            }
            if ($_POST['cmbHora'] != '') {
                $hora = " and cita.Hora='" . $_POST['cmbHora'] . "'";
            }
            if ($_POST['cmbEstado'] != '') {
                $estado = " and cita.Estado='" . $_POST['cmbEstado'] . "'";
            }
            if ($_POST['cmbComprador'] != '') {
                $comprador = " and compra.Nit='" . $_POST['cmbComprador'] . "'";
            }
            if ($_POST['cmbVendedor'] != '') {
                $vendedor = "and vende.Nit='" . $_POST['cmbVendedor'] . "'";
            }
            if ($_POST['cmbPadrinoCompra']) {
                if ($_POST['cmbPadrinoCompra'] != '') {
                    $padrinocompra = " and compra.Padrino='" . $_POST['cmbPadrinoCompra'] . "'";
                }
            }
            if ($_POST['cmbPadrinoCompra']) {
                if ($_POST['cmbPadrinoVende'] != '') {
                    $padrinovende = " and compra.Padrino='" . $_POST['cmbPadrinoVende'] . "'";
                }
            }
            if ($arg != '') {
                $id = " and cita.Id='" . $arg . "'";
            }
        }
        $sql = $this->_db->query("SELECT cita.Id, cita.Mesa, DATE_FORMAT(cita.Hora,'%H:%i') AS Hora, cita.Estado, compra.Nombre AS NomC, compra.Nit AS NitC, vende.Nombre AS NomV, vende.Nit AS NitV "
                . "FROM cita INNER JOIN empresa AS compra ON cita.Comprador=compra.Nit "
                . "INNER JOIN empresa AS vende ON cita.Vendedor=vende.Nit WHERE cita.Id>0 " . $mesa . $hora . $estado . $comprador . $vendedoor . $padrinocompra . $padrinovende . $id);
        return $sql->fetchall();
    }

    function set($arg = false) {
        
    }

    function cprogramada() {
        $sql = $this->_db->query("SELECT Id FROM cita");
        $num = $sql->fetchall();
        return count($num);
    }

    function cfinalizada() {
        $sql = $this->_db->query("SELECT Id FROM cita WHERE Estado='F'");
        $num = $sql->fetchall();
        return count($num);
    }

}

?>
