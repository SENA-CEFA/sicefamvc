<?php

class Menu extends Model {

    public function __construct() {
        parent::__construct();
    }

    function fechaactual() {
        $sql = $this->_db->query("SELECT CURDATE() as fecha");
        $res = $sql->fetchall();
        return $res[0]['fecha'];
    }

    function horaactual() {
        $sql = $this->_db->query("select CURTIME() as hora");
        $res = $sql->fetchall();
        return $res[0]['hora'];
    }

    function menurol($app = false, $rol = false) {
        $sqlmod = $this->_db->query("SELECT mlosId, mlosNombre, mlosIcono, IFNULL(mlosRuta,'') AS mlosRuta FROM aplicativos LEFT JOIN modulos ON avosId=mlosIdAplicativo WHERE avosEstado='A' AND mlosEstado='A' and avosRuta='" . $app . "' ORDER BY mlosId");
        $resmod = $sqlmod->fetchall();
        $menu = array();
        for ($i = 0; $i < count($resmod); $i++) {
            $sqlfor = $this->_db->query("SELECT fiosNombre, fiosRuta FROM modulos LEFT JOIN formularios ON modulos.`mlosId`=formularios.`fiosIdModulo` WHERE fiosEstado='A' AND modulos.`mlosId`='" . $resmod[$i]['mlosId'] . "' ORDER BY fiosId");
            $resfor = $sqlfor->fetchall();
            if (count($resfor) > 0) {
                $submenu = array();
                for ($j = 0; $j < count($resfor); $j++) {
                    $sub = array(
                        'titulo' => $resfor[$j]['fiosNombre'],
                        'enlace' => BASE_URL . $resfor[$j]['fiosRuta'],
                        'sub' => $submenu,
                    );
                    array_push($submenu, $sub);
                }
            } else {
                $submenu = '';
            }
            if ($resmod[$i]['mlosRuta'] == '') {
                $rutamod = '';
            } else {
                $rutamod = BASE_URL . $resmod[$i]['mlosRuta'];
            }

            $mod = array(
                'titulo' => $resmod[$i]['mlosNombre'],
                'enlace' => $rutamod,
                'sub' => $submenu,
            );
            array_push($menu, $mod);
        }
        return $menu;
    }

}

?>
