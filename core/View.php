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
                'titulo' => 'Ver Empresas',
                'enlace' => BASE_URL . 'empresa/index',
                'sub' => '',
            ), array(
                'id' => 'gestion',
                'titulo' => 'Gestion',
                'enlace' => BASE_URL . 'empresa/gestion',
                'sub' => '',
            ),
        );

        $subagenda = array(
            array(
                'id' => 'ver',
                'titulo' => 'Ver Agenda',
                'enlace' => BASE_URL . 'agenda/index',
                'sub' => '',
            ),
            array(
                'id' => 'gestion',
                'titulo' => 'Gestion',
                'enlace' => BASE_URL . 'agenda/gestion',
                'sub' => '',
            ),
            array(
                'id' => 'ultimo',
                'titulo' => 'Ultimo Minuto',
                'enlace' => BASE_URL . 'agenda/minuto',
                'sub' => '',
            ),
        );

        if ($_SESSION['autentificado'] == 'Si') {

            $subadministrador = array(
                array(
                    'id' => 'parametros',
                    'titulo' => 'Parametros Generales',
                    'enlace' => BASE_URL . 'paramentros/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'padrinos',
                    'titulo' => 'Padrinos',
                    'enlace' => BASE_URL . 'padrino/index',
                    'sub' => '',
                ),
            );
            $menu = array(
                array(
                    'id' => 'inicio',
                    'titulo' => 'Inicio',
                    'enlace' => BASE_URL . 'inicio/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'consolidado',
                    'titulo' => 'Consolidado',
                    'enlace' => BASE_URL . 'inicio/consolidado',
                    'sub' => '',
                ),
                array(
                    'id' => 'empresas',
                    'titulo' => 'Empresas',
                    'enlace' => BASE_URL . 'empresas/index',
                    'sub' => $subempresas,
                ),
                array(
                    'id' => 'agenda',
                    'titulo' => 'Agenda',
                    'enlace' => BASE_URL . 'inicio/agenda',
                    'sub' => $subagenda,
                ),
                array(
                    'id' => 'negociacion',
                    'titulo' => 'Negociacion',
                    'enlace' => BASE_URL . 'negociacion/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'administrador',
                    'titulo' => 'Administrador',
                    'enlace' => BASE_URL . 'administrador/index',
                    'sub' => $subadministrador,
                ),
            );
        } else {


            $menu = array(
                array(
                    'id' => 'inicio',
                    'titulo' => 'Inicio',
                    'enlace' => BASE_URL . 'inicio/index',
                    'sub' => '',
                ),
                array(
                    'id' => 'consolidado',
                    'titulo' => 'Consolidado',
                    'enlace' => BASE_URL . 'inicio/consolidado',
                    'sub' => '',
                ),
                array(
                    'id' => 'empresas',
                    'titulo' => 'Empresas',
                    'enlace' => BASE_URL . 'empresas/index',
                    'sub' => $subempresas,
                ),
                array(
                    'id' => 'agenda',
                    'titulo' => 'Agenda',
                    'enlace' => BASE_URL . 'inicio/agenda',
                    'sub' => $subagenda,
                ),
                array(
                    'id' => 'negociacion',
                    'titulo' => 'Negociacion',
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
                    'id' => 'perfil',
                    'titulo' => 'Perfil',
                    'enlace' => BASE_URL . 'sesion/perfil',
                ),
                array(
                    'id' => 'cerrar',
                    'titulo' => 'Cerrar Sesión',
                    'enlace' => BASE_URL . 'sesion/cerrar',
                ),
            );
            $menu = array(
                array(
                    'id' => 'sesion',
                    'titulo' => $_SESSION['usuario'],
                    'enlace' => BASE_URL . 'sesion/index',
                    'sub' => $subsesion,
                ),
            );
        } else {
            $menu = array(
                array(
                    'id' => 'sesion',
                    'titulo' => 'Iniciar Sesion',
                    'enlace' => BASE_URL . 'sesion/index',
                    'sub' => '',
                ),
            );
        }
        return $menu;
    }

}

?>
