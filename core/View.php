<?php

class View {

    private $_cont;
    private $_app;

    public function __construct($a,$c) {
        $this->_app = $a;
        $this->_cont = $c;
    }

    public function renderizar($vista, $item = false) {
        if ($item != false) {
            $layout = $item . "Layout";
        } else {
            $layout = DEFAULT_LAYOUT . "Layout";
        }
                
        //$men1 = array();
        $men2 = $this->menuuser();

        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'public/' . $layout . '/css/',
            'ruta_img' => BASE_URL . 'public/' . $layout . '/img/',
            'ruta_js' => BASE_URL . 'public/' . $layout . '/js/',
            'ruta_bootstrap' => BASE_URL . 'public/bootstrap/',
            'ruta_jquery' => BASE_URL . 'public/jquery/',
            'menu_user' => $men2,
            'app'=>$this->_app,
        );

        $rutaView = ROOT . $this->_app. DS. $this->_cont . DS . 'views' . DS . $vista . '.phtml';

        if (is_readable($rutaView)) {
            include_once ROOT . 'public' . DS . $layout . DS . 'header.phtml';
            include_once $rutaView;
            include_once ROOT . 'public' . DS . $layout . DS . 'footer.phtml';
        } else {
            throw new Exception('Error de vista');
        }
    }

    
    public function menuuser() {
        if ($_SESSION['autentificado'] == 'Si') {
            $subsesion = array(
                array(
                    'titulo' => '<span class="glyphicon glyphicon-off"></span> Cerrar Sesión',
                    'enlace' => BASE_URL . 'portal/sesion/cerrar',
                ),
                array(
                    'titulo' => '<span class="glyphicon glyphicon-edit"></span> Cambiar Clave',
                    'enlace' => BASE_URL . 'portal/sesion/cambiar',
                ),
            );
            $menu = array(
                array(
                    'titulo' => '<span class="glyphicon glyphicon-user"></span> '.$_SESSION['usuario'],
                    'enlace' => BASE_URL . 'portal/sesion/index',
                    'sub' => $subsesion,
                ),
            );
        } else {
            $menu = array(
                array(
                    'titulo' => '<span class="glyphicon glyphicon-user"></span> Iniciar Sesion',
                    'enlace' => BASE_URL . 'portal/sesion/index',
                    'sub' => '',
                ),
            );
        }
        return $menu;
    }

    
    
}

?>
