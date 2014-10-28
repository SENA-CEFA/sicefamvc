<?php

class View {

    private $_cont;

    public function __construct($c) {
        $this->_cont = $c;
    }

    public function renderizar($vista, $item = false) {
        if ($item != false) {
            $layout = $item . "Layout";
        } else {
            $layout = DEFAULT_LAYOUT . "Layout";
        }
        $men1 = $this->menugral();
        $men2 = $this->menuuser();

        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'public/' . $layout . '/css/',
            'ruta_img' => BASE_URL . 'public/' . $layout . '/img/',
            'ruta_js' => BASE_URL . 'public/' . $layout . '/js/',
            'ruta_bootstrap' => BASE_URL . 'public/bootstrap/',
            'ruta_jquery' => BASE_URL . 'public/jquery/',
            'menu_gral' => $men1,
            'menu_user' => $men2,
        );

        $rutaView = ROOT . $this->_cont . DS . 'views' . DS . $vista . '.phtml';

        if (is_readable($rutaView)) {
            include_once ROOT . 'public' . DS . $layout . DS . 'header.phtml';
            include_once $rutaView;
            include_once ROOT . 'public' . DS . $layout . DS . 'footer.phtml';
        } else {
            throw new Exception('Error de vista');
        }
    }

    public function menugral() {
        $subempresas = array(
            array(
                'id' => 'ver',
                'titulo' => '<span class="glyphicon glyphicon-eye-open"></span> Empresas',
                'enlace' => BASE_URL . 'empresa/index',
                'sub' => '',
            ), 
        );
        if($_SESSION['autentificado'] == 'Si')
        {
            $subempresas[]=array(
                'id' => 'gestion',
                'titulo' => '<span class="glyphicon glyphicon-list-alt"></span> Registro',
                'enlace' => BASE_URL . 'empresa/gestion',
                'sub' => '',
            );
        }

        $subagenda = array(
            array(
                'id' => 'ver',
                'titulo' => '<span class="glyphicon glyphicon-eye-open"></span> Agenda',
                'enlace' => BASE_URL . 'agenda/index',
                'sub' => '',
            ),
            array(
                'id' => 'ultimo',
                'titulo' => '<span class="glyphicon glyphicon-search"></span> Consulta',
                'enlace' => BASE_URL . 'agenda/buscar',
                'sub' => '',
            ),

        );
        if($_SESSION['autentificado'] == 'Si')
        {
            $subagenda[]=            array(
                'id' => 'gestion',
                'titulo' => '<span class="glyphicon glyphicon-list-alt"></span> Gestión',
                'enlace' => BASE_URL . 'agenda/gestion',
                'sub' => '',
            );
        }
   
        if($_SESSION['autentificado'] == 'Si') {

            $subadministrador = array(
                array(
                    'id' => 'parametros',
                    'titulo' => '<span class="glyphicon glyphicon-cog"></span> Parametros Generales',
                    'enlace' => BASE_URL . 'parametros/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'padrinos',
                    'titulo' => '<span class="glyphicon glyphicon-thumbs-up"></span> Registro Padrinos',
                    'enlace' => BASE_URL . 'padrino/index',
                    'sub' => '',
                ),
            );
            $menu = array(
                array(
                    'id' => 'inicio',
                    'titulo' => '<span class="glyphicon glyphicon-home"></span> Inicio',
                    'enlace' => BASE_URL . 'inicio/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'consolidado',
                    'titulo' => '<span class="glyphicon glyphicon-stats"></span> Consolidado',
                    'enlace' => BASE_URL . 'inicio/consolidado',
                    'sub' => '',
                ),
                array(
                    'id' => 'empresas',
                    'titulo' => '<span class="glyphicon glyphicon-briefcase"></span> Empresas',
                    'enlace' => BASE_URL . 'empresas/index',
                    'sub' => $subempresas,
                ),
                array(
                    'id' => 'agenda',
                    'titulo' => '<span class="glyphicon glyphicon-calendar"></span> Agenda',
                    'enlace' => BASE_URL . 'inicio/agenda',
                    'sub' => $subagenda,
                ),
                array(
                    'id' => 'negociacion',
                    'titulo' => '<span class="glyphicon glyphicon-usd"></span> Negociacion',
                    'enlace' => BASE_URL . 'negociacion/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'administrador',
                    'titulo' => '<span class="glyphicon glyphicon-cog"></span> Administrador',
                    'enlace' => BASE_URL . 'administrador/index',
                    'sub' => $subadministrador,
                ),
            );
        } else {


            $menu = array(
                array(
                    'id' => 'inicio',
                    'titulo' => '<span class="glyphicon glyphicon-home"></span> Inicio',
                    'enlace' => BASE_URL . 'inicio/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'consolidado',
                    'titulo' => '<span class="glyphicon glyphicon-stats"></span> Consolidado',
                    'enlace' => BASE_URL . 'inicio/consolidado',
                    'sub' => '',
                ),
                array(
                    'id' => 'empresas',
                    'titulo' => '<span class="glyphicon glyphicon-briefcase"></span> Empresas',
                    'enlace' => BASE_URL . 'empresas/index',
                    'sub' => $subempresas,
                ),
                array(
                    'id' => 'agenda',
                    'titulo' => '<span class="glyphicon glyphicon-calendar"></span> Agenda',
                    'enlace' => BASE_URL . 'inicio/agenda',
                    'sub' => $subagenda,
                ),
                array(
                    'id' => 'negociacion',
                    'titulo' => '<span class="glyphicon glyphicon-usd"></span> Negociacion',
                    'enlace' => BASE_URL . 'negociacion/index',
                    'sub' => '',
                ),
            );
        }
        return $menu;
    }

    public function menuuser() {
        if ($_SESSION['autentificado'] == 'Si') {
            $subsesion = array(
                array(
                    'id' => 'cerrar',
                    'titulo' => '<span class="glyphicon glyphicon-off"></span> Cerrar Sesión',
                    'enlace' => BASE_URL . 'sesion/cerrar',
                ),
            );
            $menu = array(
                array(
                    'id' => 'sesion',
                    'titulo' => '<span class="glyphicon glyphicon-user"></span> '.$_SESSION['usuario'],
                    'enlace' => BASE_URL . 'sesion/index',
                    'sub' => $subsesion,
                ),
            );
        } else {
            $menu = array(
                array(
                    'id' => 'sesion',
                    'titulo' => '<span class="glyphicon glyphicon-user"></span> Iniciar Sesion',
                    'enlace' => BASE_URL . 'sesion/index',
                    'sub' => '',
                ),
            );
        }
        return $menu;
    }

}

?>
