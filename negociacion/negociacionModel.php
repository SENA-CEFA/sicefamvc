<?php

class negociacionModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        
    }

    function evaluacion() {
        if ($_POST) {
            $count = $this->_db->exec("INSERT INTO evaluacion (Id,item1, item2, item3, item4, item5, item6, item7, item8, item9,item10) VALUES ('" . $_SESSION['cita'] . "','" . $_POST['rb1'] . "', '" . $_POST['rb2'] . "', '" . $_POST['rb3'] . "', '" . $_POST['rb4'] . "', '" . $_POST['rb5'] . "', '" . $_POST['rb6'] . "', '" . $_POST['rb7'] . "', '" . $_POST['rb8'] . "', '" . $_POST['rb9'] . "', '" . $_POST['rb10'] . "')");
            $this->_db->exec("UPDATE cita set Estado='Finalizada', Fin=current_time() WHERE Id='" . $_SESSION['cita'] . "'");
            return $count;
        } else {
            return 0;
        }
    }

    function negocio() {
        if ($_POST) {
            $count = 0;
            for ($i = 0; $i < $_POST['numcat']; $i++) {
                $count = $this->_db->exec("INSERT INTO negocio(Categoria,Pesos,Ejecucion,Cita) VALUES('" . $_POST['idproducto' . $i] . "','" . $_POST['precio' . $i] . "','" . $_POST[$i] . "','" . $_SESSION['cita'] . "')");
            }
            return $count;
        } else {
            return 0;
        }
    }

    function productos() {
        $data = $this->_db->query("SELECT categorias.Id,categorias.Nombre FROM cita 
INNER JOIN empresa AS compra ON cita.Comprador=compra.Nit 
INNER JOIN intencioncompra ON compra.Nit=intencioncompra.Empresa
INNER JOIN categorias ON intencioncompra.Categoria=categorias.Id and cita.Estado!='Cancelada' and cita.id='".$_SESSION['cita']."'
");

        return $data->fetchall();
    }

    function cita() {
        $data = $this->_db->query("SELECT cita.Mesa, cita.Hora, cita.Inicio, compra.Nombre AS Nom1, compra.Nit AS Nit1, compra.Correo AS Cor1, compra.TelefonoCelular AS Tel1, vende.Nombre AS Nom2, vende.Nit AS Nit2, vende.Correo AS Cor2, vende.TelefonoCelular AS Tel2
 FROM cita INNER JOIN empresa AS compra ON cita.Comprador=compra.Nit INNER JOIN empresa AS vende ON cita.Vendedor=vende.Nit WHERE Estado!='Cancelada' and id=" . $_SESSION['cita']);
        return $data->fetchall();
    }

    function get($arg = false) {
        
    }

    function validar() {

        $sql = $this->_db->prepare("select Id from cita inner join empresa on cita.comprador=empresa.Nit where Nit=? and Hora=? and Estado!='Cancelada'");
        $sql->execute(array($_POST['txtNIT'], $_POST['cmbHora']));
        $rs = $sql->fetchall();
        if ($rs && count($rs)>0) {
            $_SESSION['cita'] = $rs[0]['Id'];

                $_SESSION['asistente'] = $_POST['txtCEDULA'];
                $this->_db->exec("UPDATE cita set Estado='Activa', Inicio=current_time() WHERE Id='" . $_SESSION['cita'] . "'");

            
        } else {
            $_SESSION['cita'] = '';
            $_SESSION['asistente'] = '';
        }
    }

    protected function set() {
        
    }

}
