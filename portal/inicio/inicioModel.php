<?php

class inicioModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function delete($arg = false) {
        
    }

    function edit($arg = false) {
        
    }

    function get($arg = false) {
        
    }

    function set($arg = false) {
        
    }

    function creamenu() {
        $subturnos = array(
            array(
                'titulo' => 'Rutinarios',
                'enlace' => BASE_URL . 'portal/turnos/rutinarios',
                'sub' => '',
            ),
            array(
                'titulo' => 'Especiales',
                'enlace' => BASE_URL . 'portal/turnos/especiales',
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
            )
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
                'sub' => '',
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
