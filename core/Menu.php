<?php

class Menu extends Model {

    public function __construct() {
        parent::__construct();
    }

           
    function menurol($arg = false) {
        $subturnos = array(
            array(
                'titulo' => 'Emprecefa',
                'enlace' => BASE_URL . 'portal/turnos/emprecefa',
                'sub' => '',
            ),
            array(
                'titulo' => 'Recolección',
                'enlace' => BASE_URL . 'portal/turnos/recoleccion',
                'sub' => '',
            )
        );
        $subapp = array(
            array(
                'titulo' => 'Sica',
                'enlace' => BASE_URL . 'sica/inicio/index',
                'sub' => '',
            ),
            array(
                'titulo' => 'GoodPig',
                'enlace' => BASE_URL . 'goodpig/inicio/index',
                'sub' => '',
            ),
            array(
                'titulo' => 'Punto de Venta',
                'enlace' => BASE_URL . 'puntodeventa/inicio/index',
                'sub' => '',
            ),
            array(
                'titulo' => 'Gestion Academica',
                'enlace' => BASE_URL . 'sigac/inicio/index',
                'sub' => '',
            ),
        );
        $subemprecefa = array(
            array(
                'titulo' => 'Presentación',
                'enlace' => BASE_URL . 'portal/emprecefa/presentacion',
                'sub' => '',
            ),
            array(
                'titulo' => 'Organigrama',
                'enlace' => BASE_URL . 'portal/emprecefa/organigrama',
                'sub' => '',
            ),
            array(
                'titulo' => 'Áreas y Unidades Productivas',
                'enlace' => BASE_URL . 'portal/emprecefa/areas',
                'sub' => '',
            ),
        );
        $subpqrsf = array(
            array(
                'titulo' => 'Consulta tu Solicitud',
                'enlace' => BASE_URL . 'portal/pqrsf/consulta',
                'sub' => '',
            ),
            array(
                'titulo' => 'Nueva Solicitud',
                'enlace' => BASE_URL . 'portal/pqrsf/index',
                'sub' => '',
            )
        );
        $menu = array(
            array(
                'titulo' => '<span class="glyphicon glyphicon-home"></span> Inicio',
                'enlace' => BASE_URL . 'portal/inicio/index',
                'sub' => '',
            ),
            array(
                'titulo' => '<span class="glyphicon glyphicon-briefcase"></span> Emprecefa',
                'enlace' => '',
                'sub' => $subemprecefa,
            ),
            array(
                'titulo' => '<span class="glyphicon glyphicon-list-alt"></span> Turnos',
                'enlace' => '',
                'sub' => $subturnos,
            ),
            array(
                'titulo' => '<span class="glyphicon glyphicon-modal-window"></span> Aplicaciones',
                'enlace' => '',
                'sub' => $subapp,
            ),
            array(
                'titulo' => '<span class="glyphicon glyphicon-inbox"></span> PQRSF',
                'enlace' => BASE_URL . 'portal/pqrsf/index',
                'sub' => $subpqrsf,
            ),
            array(
                'titulo' => '<span class="glyphicon glyphicon-wrench"></span> Desarrolladores',
                'enlace' => BASE_URL . 'portal/desarrolladores/index',
                'sub' => '',
            ),
        );
        return $menu;
    }

}

?>
