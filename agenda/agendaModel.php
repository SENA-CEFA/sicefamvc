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
        $sql = $this->_db->query("SELECT Id FROM cita WHERE Estado='Finalizada'");
        $num = $sql->fetchall();
        return count($num);
    }

    function nodisponible() {
        $otra = $this->_db->query("SELECT Id FROM cita where comprador='" . $_POST['com'][0] . "' and vendedor='" . $_POST['ven'][0] . "'");
        if (count($otra->fetchall())) {
            return 0;
        }

        $data = $this->_db->query("SELECT Mesas FROM parametros where Id=1");
        $mesas = $data->fetchall();
        $nummesas = $mesas[0]['Mesas'];

        $citas = $this->_db->query("SELECT cita.Mesa, horas.id FROM cita INNER JOIN horas ON cita.hora=horas.hora");
        $numcitas = $citas->fetchall();
        for ($i = 0; $i < count($numcitas); $i++) {
            $mesa = $numcitas[$i]['Mesa'];
            $hora = $numcitas[$i]['id'];
            $no[$mesa][$hora] = '1';
        }
        $compra = $this->_db->query("SELECT cita.Mesa, horas.id FROM cita INNER JOIN horas ON cita.hora=horas.hora WHERE comprador='" . $_POST['com'][0] . "'");
        $numcompra = $compra->fetchall();
        for ($i = 0; $i < count($numcompra); $i++) {
            $mesa = $numcompra[$i]['Mesa'];
            $hora = $numcompra[$i]['id'];
            for ($j = 1; $j <= $nummesas; $j++) {
                if (isset($no[$j][$hora])) {
                    
                } else {
                    $no[$j][$hora] = '5';
                }
            }
            $no[$mesa][$hora] = '2';
        }
        $vende = $this->_db->query("SELECT cita.Mesa, horas.id FROM cita INNER JOIN horas ON cita.hora=horas.hora WHERE vendedor='" . $_POST['ven'][0] . "'");
        $numvende = $vende->fetchall();
        for ($i = 0; $i < count($numvende); $i++) {
            $mesa = $numvende[$i]['Mesa'];
            $hora = $numvende[$i]['id'];
            for ($j = 1; $j <= $nummesas; $j++) {
                if (isset($no[$j][$hora])) {
                    
                } else {
                    $no[$j][$hora] = '4';
                }
            }
            $no[$mesa][$hora] = '3';
        }

        return $no;
    }

    function guardar() {
        $posi = $_POST['ci'];
        $mesa = $_POST['mesa' . $posi];
        $hora = $_POST['hora' . $posi];
        $count = $this->_db->exec("INSERT INTO cita (Mesa, Comprador, Vendedor, Hora, Estado ) VALUES ('" . $mesa . "','" . $_POST['txtCompra'] . "','" . $_POST['txtVende'] . "','" . $hora . "','Pendiente')");
        return $count;
    }

    function rapido() {
        $g = 0;
        $c = $_POST['com'];
        $v = $_POST['ven'];
        $contv = count($v);
        $m = $_POST['cmbMesa'];
        //aqui saca los que ya tuvieron cita entre ellos
        for ($i = 0; $i < $contv; $i++){
            $otra = $this->_db->query("SELECT Id FROM cita where comprador='" . $c[0] . "' and vendedor='" . $v[$i] . "' and Estado!='Cancelada'");
            if (count($otra->fetchall())) {
                unset($v[$i]);
            }
        }
        $v = array_values($v);
        $contv = count($v);
        $allhoras = $this->_db->query("SELECT Hora FROM Horas ORDER BY Id");
        $horas = $allhoras->fetchall();
        
        //se recorren los vendedores
        for ($i = 0; $i < $contv; $i++) {
            //se recorren las horas
            for ($j = 0; $j < count($horas); $j++) {
                //aqui mira si hay cupo en la mesa a la hora hora
                $cupo = $this->_db->query("SELECT Id FROM cita where Mesa='" . $m . "' and Hora='" . $horas[$j]['Hora'] . "' and Estado!='Cancelada'");
                $sicupo = count($cupo->fetchall());
                if ($sicupo == 0) {
                    //si es cero hay cupo.... ahora se revisa si el vendedor tiene otra cita a esa hora
                    $otrahora = $this->_db->query("SELECT Id FROM cita where vendedor='" . $v[$i] . "' and Hora='" . $horas[$j]['Hora'] . "' and Estado!='Cancelada'");
                    $siotra = count($otrahora->fetchall());
                    if ($siotra == 0) {
                        //si es cero no tiene cita a esa hora y se guarda
                        $count = $this->_db->exec("INSERT INTO cita (Mesa, Comprador, Vendedor, Hora, Estado ) VALUES ('" . $m . "','" . $c[0] . "','" . $v[$i] . "','" . $horas[$j]['Hora'] . "','Pendiente')");
                        unset($v[$i]);
                        $g = $g + 1;
                        break;
                    }
                }
            }
        }
        return $g;
    }
    function reporte(){
        $data = $this->_db->query("SELECT Mesas FROM parametros where Id=1");
        $mesas = $data->fetchall();
        $nummesas = $mesas[0]['Mesas'];

        $citas = $this->_db->query("SELECT cita.Id, cita.Mesa, DATE_FORMAT(cita.Hora,'%H:%i') AS Hora, cita.Estado, compra.Nombre AS NomC, compra.Nit AS NitC, vende.Nombre AS NomV, vende.Nit AS NitV "
                . "FROM cita INNER JOIN empresa AS compra ON cita.Comprador=compra.Nit "
                . "INNER JOIN empresa AS vende ON cita.Vendedor=vende.Nit");
        $numcitas = $citas->fetchall();
        for ($i = 0; $i < count($numcitas); $i++) {
            $mesa = $numcitas[$i]['Mesa'];
            $hora = $numcitas[$i]['Hora'];
            $no[$mesa][$hora] = array($numcitas[$i]['Mesa'], $numcitas[$i]['Hora'], $numcitas[$i]['NomC'],$numcitas[$i]['NomV'],$numcitas[$i]['Estado']);
        }
        return $no;
    }

}

?>
